<?php
define('CONTEXT', 'other');
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];
$user_id = null;

try {
    $stmtUsuario = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmtUsuario->bindParam(':email', $user_email);
    $stmtUsuario->execute();
    $user = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['id'];
    } else {
        echo '<div class="alert alert-danger">Usuário não encontrado.</div>';
        exit;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuário ' . $e->getMessage() . '</div>';
    exit;
}

$profissionais = [];
$exames = [];

try {
    $queryProfissionais = $pdo->query("SELECT id, nome, especialidade FROM PROFISSIONAIS");
    $profissionais = $queryProfissionais->fetchAll(PDO::FETCH_ASSOC);

    $queryExames = $pdo->query("SELECT id, nome, valor FROM EXAMES");
    $exames = $queryExames->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar dados ' . $e->getMessage() . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_profissional = $_POST['id_profissional'];
    $nome_profissional = $_POST['nome_profissional'];
    $especialidade_profissional = $_POST['especialidade_profissional'];
    $data_consulta = $_POST['data_consulta'];
    $hora_consulta = $_POST['hora_consulta'];
    $id_exame = $_POST['id_exame'];
    $valor_exame = $_POST['valor_exame'];
    $nome_exame = $_POST['nome_exame'];

    if (!empty($id_profissional) && !empty($user_id) && !empty($especialidade_profissional) && !empty($data_consulta) && !empty($hora_consulta)) {
        try {
            $stmtConsulta = $pdo->prepare("INSERT INTO CONSULTAS (id_usuario, id_profissional, nome_profissional, especialidade_profissional, data_consulta, hora_consulta) VALUES (:id_usuario, :id_profissional, :nome_profissional, :especialidade_profissional, :data_consulta, :hora_consulta)");
            $stmtConsulta->bindParam(':id_usuario', $user_id);
            $stmtConsulta->bindParam(':id_profissional', $id_profissional);
            $stmtConsulta->bindParam(':nome_profissional', $nome_profissional);
            $stmtConsulta->bindParam(':especialidade_profissional', $especialidade_profissional);
            $stmtConsulta->bindParam(':data_consulta', $data_consulta);
            $stmtConsulta->bindParam(':hora_consulta', $hora_consulta);
            $stmtConsulta->execute();

            $id_consulta = $pdo->lastInsertId();

            if ($id_consulta && !empty($id_exame) && !empty($valor_exame) && !empty($nome_exame)) {
                $stmtDetalhes = $pdo->prepare("INSERT INTO DETALHES_CONSULTAS (id_consulta, id_exame, nome_exame, valor_exame) VALUES (:id_consulta, :id_exame, :nome_exame, :valor_exame)");
                $stmtDetalhes->bindParam(':id_consulta', $id_consulta);
                $stmtDetalhes->bindParam(':id_exame', $id_exame);
                $stmtDetalhes->bindParam(':nome_exame', $nome_exame);
                $stmtDetalhes->bindParam(':valor_exame', $valor_exame);
                $stmtDetalhes->execute();
            }

            echo json_encode(['status' => 'success', 'message' => 'Consulta marcada com sucesso!']);
            header('Location: ../principal.php');
            exit;
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Todos os campos são obrigatórios.']);
    }
    exit;
}
?>