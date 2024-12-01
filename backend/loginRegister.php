<?php

// register.php

require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $numero_celular = $_POST['telefone'];
    $senha = $_POST['password'];
    $senha_confirm = $_POST['password_confirm'];

    if ($senha !== $senha_confirm) {
        echo json_encode(['error' => 'As senhas não coincidem.']);
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        // Inserir usuário no banco
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, nome, numero_celular, senha, tipo) VALUES (:email, :nome, :numero_celular, :senha, :tipo)");
        $stmt->execute([
            'email' => $email,
            'nome' => $nome,
            'numero_celular' => $numero_celular,
            'senha' => $senha_hash,
            'tipo' => 'cliente' // Definindo como cliente por padrão
        ]);

        // Gera um token para o usuário
        $token = bin2hex(random_bytes(16));
        $_SESSION['user_email'] = $email;
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

        // Retorna o token e o sucesso do registro
        echo json_encode(['success' => 'Usuário registrado e logado com sucesso!', 'token' => $token]);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro ao registrar usuário: ' . $e->getMessage()]);
    }
}
?>
