<?php
define('CONTEXT', 'other');
require '../backend/config.php';
session_start();
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
// Inicializa as variáveis para o usuário a ser editado
$usuarioEdit = null;

// Verifica se um ID de usuário foi enviado via POST para edição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $_SESSION['id'] = $id;
    // Verifica se todos os campos estão preenchidos
    $fields = ['email', 'nome', 'numero_celular', 'cpf', 'rg', 'data_nascimento', 'sexo'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            echo '<div class="alert alert-warning">Por favor, preencha todos os campos.</div>';
            exit();
        }
    }

    if (!empty($id)) {
        try {
            // Atualiza o usuário
            $stmt = $pdo->prepare('UPDATE usuarios SET email = :email, nome = :nome, numero_celular = :numero_celular, cpf = :cpf, rg = :rg, data_nascimento = :data_nascimento, sexo = :sexo WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':numero_celular', $_POST['numero_celular'], PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(':rg', $_POST['rg'], PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $_POST['data_nascimento'], PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
            $stmt->execute();

            // Após a atualização, redireciona para a página de usuários
            header('Location: ./usuarios.php');
            exit();
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erro ao atualizar usuário: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Verifica se um ID foi passado na URL para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty($id)) {
        try {
            $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $usuarioEdit = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erro ao buscar usuário: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

// Se não houver usuário a ser editado, redireciona para a página de usuários
if (!$usuarioEdit) {
    header('Location: ../principal.php');
    exit();
}
?>