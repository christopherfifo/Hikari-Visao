<?php
require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];

// Processa a solicitação de alteração de senha ou exclusão de conta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'alterar_senha') {
            $current_password = $_POST['current-password'];
            $new_password = $_POST['new-password'];
            $confirm_new_password = $_POST['confirm-password']; // Corrigido para corresponder ao nome do campo do formulário

            try {
                // Verifica a senha atual
                $stmt = $pdo->prepare("SELECT id, senha FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $user_email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($current_password, $user['senha'])) {
                    // Verifica se a nova senha e a confirmação são iguais
                    if ($new_password === $confirm_new_password) {
                        // Criptografa a nova senha
                        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                        // Atualiza a senha no banco de dados
                        $stmtUpdateSenha = $pdo->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id_usuario");
                        $stmtUpdateSenha->bindParam(':senha', $hashed_new_password);
                        $stmtUpdateSenha->bindParam(':id_usuario', $user['id']);
                        $stmtUpdateSenha->execute();

                        echo "<script>alert('Senha alterada com sucesso!');</script>";
                    } else {
                        echo "<script>alert('A nova senha e a confirmação não correspondem.');</script>";
                    }
                } else {
                    echo "<script>alert('Senha atual incorreta.');</script>";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar a senha: " . $e->getMessage() . "');</script>";
            }
        } elseif ($_POST['action'] === 'excluir_conta') {
            $password = $_POST['confirm-delete'];

            try {
                // Verifica a senha atual
                $stmt = $pdo->prepare("SELECT id, senha FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $user_email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['senha'])) {
                    // Inicia a transação
                    $pdo->beginTransaction();

                    $user_id = $user['id'];

                    // Exclui registros relacionados em ordem reversa às dependências
                    $stmtDeletePagamentos = $pdo->prepare("DELETE FROM PAGAMENTOS WHERE id_cliente = :id_usuario");
                    $stmtDeletePagamentos->bindParam(':id_usuario', $user_id);
                    $stmtDeletePagamentos->execute();

                    $stmtDeleteDetalhesConsultas = $pdo->prepare(
                        "DELETE FROM DETALHES_CONSULTAS WHERE id_consulta IN (SELECT id FROM CONSULTAS WHERE id_usuario = :id_usuario)"
                    );
                    $stmtDeleteDetalhesConsultas->bindParam(':id_usuario', $user_id);
                    $stmtDeleteDetalhesConsultas->execute();

                    $stmtDeleteConsultas = $pdo->prepare("DELETE FROM CONSULTAS WHERE id_usuario = :id_usuario");
                    $stmtDeleteConsultas->bindParam(':id_usuario', $user_id);
                    $stmtDeleteConsultas->execute();

                    // Por fim, exclui o usuário
                    $stmtDeleteUsuario = $pdo->prepare("DELETE FROM usuarios WHERE id = :id_usuario");
                    $stmtDeleteUsuario->bindParam(':id_usuario', $user_id);
                    $stmtDeleteUsuario->execute();

                    // Confirma a transação
                    $pdo->commit();

                    session_destroy(); // Destrói a sessão
                    echo "<script>alert('Conta excluída com sucesso!'); window.location.href = '../entrar.php';</script>";
                } else {
                    echo "<script>alert('Senha incorreta.');</script>";
                }
            } catch (PDOException $e) {
                $pdo->rollBack(); // Reverte a transação em caso de erro
                echo "<script>alert('Erro ao excluir conta: " . $e->getMessage() . "');</script>";
            }
        }
    }
}
?>
