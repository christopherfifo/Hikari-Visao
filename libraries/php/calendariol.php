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

// Buscar o id do usuário
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

// Buscar todas as consultas (futuras e passadas)
$consultas = [];
try {
    $stmtConsultas = $pdo->prepare("
        SELECT c.id AS consulta_id, c.nome_profissional, c.especialidade_profissional, c.data_consulta, c.hora_consulta, 
               d.nome_exame, d.valor_exame, d.id AS detalhe_id
        FROM CONSULTAS c
        INNER JOIN DETALHES_CONSULTAS d ON c.id = d.id_consulta
        WHERE c.id_usuario = :user_id
        ORDER BY c.data_consulta, c.hora_consulta
    ");
    $stmtConsultas->bindParam(':user_id', $user_id);
    $stmtConsultas->execute();
    $consultas = $stmtConsultas->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar consultas ' . $e->getMessage() . '</div>';
}
?>