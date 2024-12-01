<?php
define('CONTEXT', 'other');
require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$usuarios = [];

try {

    $query = $pdo->query("SELECT id, nome FROM usuarios");
    

    while ($usuario = $query->fetch(PDO::FETCH_ASSOC)) {
        $usuarios[] = $usuario;
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao buscar usuários: ' . $e->getMessage() . '</div>';
}

// Verifica se foi feita uma requisição para deletar um usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (!empty($id)) {
        try {
            $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id'); // Corrigido o nome da tabela
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success', 'message' => 'Usuário deletado com sucesso']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado ou já deletado']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID de usuário inválido']);
    }
    exit; 
}
?>