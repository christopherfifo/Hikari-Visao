<?php
define('CONTEXT', 'other');
require "./backend/config.php";
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
    $user_id = $user['id'] ?? null;

    if (is_null($user_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado']);
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao buscar usuário: ' . $e->getMessage()]);
    exit;
}

try {
    $stmtConsultas = $pdo->prepare("
        SELECT c.nome_profissional, c.especialidade_profissional, c.data_consulta, c.hora_consulta, d.nome_exame
        FROM CONSULTAS c
        INNER JOIN DETALHES_CONSULTAS d ON c.id = d.id_consulta
        WHERE c.id_usuario = :user_id AND c.data_consulta BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 20 DAY)
        ORDER BY c.data_consulta
    ");
    $stmtConsultas->bindParam(':user_id', $user_id);
    $stmtConsultas->execute();
    $consultas = $stmtConsultas->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['status' => 'success', 'consultas' => $consultas]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao buscar consultas: ' . $e->getMessage()]);
}
?>
