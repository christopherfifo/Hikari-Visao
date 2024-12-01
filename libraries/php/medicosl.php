<?php
include('../backend/config.php'); 

session_start();
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
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $especialidade = $_POST['especialidade'];

    if (empty($nome)) {
        echo json_encode(['status' => 'error', 'message' => 'O campo nome é obrigatório.']);
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    try {
        $pdo->beginTransaction();


        $stmt = $pdo->prepare("
            INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo, tipo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'profissional')
        ");
        $stmt->execute([$email, $nome, $numero_celular, $senha_hash, $cpf, $rg, $data_nascimento, $sexo]);

        $user_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare("
            INSERT INTO profissionais (id_usuario, nome, especialidade)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$user_id, $nome, $especialidade]);


        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Erro ao adicionar médico: ' . $e->getMessage()]);
    }
}
?>