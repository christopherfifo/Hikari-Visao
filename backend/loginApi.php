<?php

// login.php

require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {

        $_SESSION['user_email'] = $email;
        $token = bin2hex(random_bytes(16));
        $_SESSION['user_token'] = $token;

                // Obtendo informações do usuário após o registro
                $sql = "SELECT nome, nome_foto FROM usuarios WHERE email = ?";
                $pegainfo = $pdo->prepare($sql);
                $pegainfo->execute([$email]);
        
                if ($pegainfo->rowCount() > 0) {
                    $usuario = $pegainfo->fetch(PDO::FETCH_ASSOC);
        
                    $_SESSION['user_nome'] = $usuario['nome']; // Atualizar o nome do usuário na sessão
                    $_SESSION['user_foto'] = $usuario['nome_foto']; // Atualizar o nome da foto na sessão
                } else {
                    echo json_encode(['error' => 'Usuário não encontrado.']);
                    exit;
                }

        echo json_encode(['success' => 'Login bem-sucedido!', 'token' => $token]);
    } else {
        echo json_encode(['error' => 'Credenciais inválidas']);
    }
}
?>
