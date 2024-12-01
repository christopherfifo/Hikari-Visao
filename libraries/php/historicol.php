<?php
define('CONTEXT', 'other');
require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email'])) {
    echo "Você precisa estar logado.";
    exit; 
}

$email_usuario = $_SESSION['user_email'];

// Buscar o id do usuário
$user_id = null;
try {
    $stmtUsuario = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmtUsuario->bindParam(':email', $email_usuario);
    $stmtUsuario->execute();
    $user = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_id = $user['id'];
    } else {
        echo '<div class="alert alert-danger">Usuário não encontrado.</div>';
        exit;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuário: ' . $e->getMessage() . '</div>';
    exit;
}

// Buscar consultas passadas
$consultas_passadas = [];
try {
    $stmtConsultas = $pdo->prepare("
        SELECT c.nome_profissional, c.especialidade_profissional, c.data_consulta, c.hora_consulta, 
               d.nome_exame, d.valor_exame
        FROM CONSULTAS c
        INNER JOIN DETALHES_CONSULTAS d ON c.id = d.id_consulta
        WHERE c.id_usuario = :user_id AND c.data_consulta < CURDATE()
        ORDER BY c.data_consulta DESC, c.hora_consulta DESC
    ");
    $stmtConsultas->bindParam(':user_id', $user_id);
    $stmtConsultas->execute();
    $consultas_passadas = $stmtConsultas->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar consultas passadas: ' . $e->getMessage() . '</div>';
}
?>