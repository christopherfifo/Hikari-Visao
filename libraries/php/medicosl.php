<?php
include('../backend/config.php'); 

session_start();
define('CONTEXT', 'other');
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $numero_celular = $_POST['numero_celular'];
    $senha = $_POST['senha'];
    $cpf = !empty($_POST['cpf']) ? $_POST['cpf'] : null;
    $rg = !empty($_POST['rg']) ? $_POST['rg'] : null;
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $especialidade = $_POST['especialidade'];

    // Validações de campos obrigatórios
    if (empty($nome)) {
        echo json_encode(['status' => 'error', 'message' => 'O campo nome é obrigatório.']);
        exit;
    }

    if (empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'O campo email é obrigatório.']);
        exit;
    }

    if (empty($numero_celular)) {
        echo json_encode(['status' => 'error', 'message' => 'O campo número de celular é obrigatório.']);
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    try {
        // Iniciar transação
        $pdo->beginTransaction();

        // Consulta única para verificar duplicatas
        $query = "
            SELECT 
                email, 
                numero_celular, 
                cpf, 
                rg 
            FROM usuarios 
            WHERE email = :email 
               OR numero_celular = :numero_celular 
               OR cpf = :cpf 
               OR rg = :rg
        ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':numero_celular' => $numero_celular,
            ':cpf' => $cpf,
            ':rg' => $rg
        ]);

        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            if ($existingUser['email'] === $email) {
                echo json_encode(['status' => 'error', 'message' => 'O email já está cadastrado.']);
                $pdo->rollBack();
                exit;
            }

            if ($existingUser['numero_celular'] === $numero_celular) {
                echo json_encode(['status' => 'error', 'message' => 'O número de celular já está cadastrado.']);
                $pdo->rollBack();
                exit;
            }

            if ($cpf !== null && $existingUser['cpf'] === $cpf) {
                echo json_encode(['status' => 'error', 'message' => 'O CPF já está cadastrado.']);
                $pdo->rollBack();
                exit;
            }

            if ($rg !== null && $existingUser['rg'] === $rg) {
                echo json_encode(['status' => 'error', 'message' => 'O RG já está cadastrado.']);
                $pdo->rollBack();
                exit;
            }
        }

        // Inserir na tabela usuarios
        $stmt = $pdo->prepare("
            INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo, tipo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'profissional')
        ");
        $stmt->execute([$email, $nome, $numero_celular, $senha_hash, $cpf, $rg, $data_nascimento, $sexo]);

        $user_id = $pdo->lastInsertId();

        // Inserir na tabela profissionais
        $stmt = $pdo->prepare("
            INSERT INTO profissionais (id_usuario, nome, especialidade)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$user_id, $nome, $especialidade]);

        // Confirmar transação
        $pdo->commit();

    } catch (Exception $e) {
        // Reverter transação em caso de erro
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Erro ao adicionar médico: ' . $e->getMessage()]);
    }
}
?>
