<?php
require '../backend/config.php';

session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$email_usuario = $_SESSION['user_email'];

// Obtendo informações do usuário
$sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo, nome_foto FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email_usuario]);

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $sexo_usuario = $usuario['sexo'] ?? ''; // Garantir que $sexo_usuario tenha um valor padrão
    $_SESSION['user_nome'] = $usuario['nome']; // Atualizar o nome do usuário na sessão
    $_SESSION['user_foto'] = $usuario['nome_foto']; // Atualizar o nome da foto na sessão
} else {
    echo "Usuário não encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $numero_celular = $_POST['numero_celular'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];

    // Verificar se o arquivo foi enviado
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto_perfil'];

        // Verificar tamanho do arquivo (limite de 500MB = 500 * 1024 * 1024 bytes)
        if ($foto['size'] > 500 * 1024 * 1024) {
            echo "A imagem excede o limite de 500MB.";
            exit;
        }

        // Diretório para salvar a imagem
        $diretorioFotos = '../db/photos/';
        if (!is_dir($diretorioFotos)) {
            mkdir($diretorioFotos, 0777, true); // Criar a pasta se não existir
        }

        // Verificar se já existe uma imagem salva no banco
        $sqlFoto = "SELECT nome_foto FROM usuarios WHERE email = ?";
        $stmtFoto = $pdo->prepare($sqlFoto);
        $stmtFoto->execute([$email_usuario]);
        $fotoExistente = $stmtFoto->fetchColumn();

        if ($fotoExistente) {
            // Substituir a imagem antiga
            $caminhoFotoExistente = $diretorioFotos . $fotoExistente;
            if (file_exists($caminhoFotoExistente)) {
                unlink($caminhoFotoExistente); // Apagar o arquivo antigo
            }
        }

        // Gerar um novo nome único para a imagem
        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid('foto_', true) . '.' . $extensao; // Prefixo 'foto_' para tornar o nome mais identificável

        // Salvar a imagem no diretório
        $caminhoFinal = $diretorioFotos . $nomeArquivo;
        if (move_uploaded_file($foto['tmp_name'], $caminhoFinal)) {
            // Atualizar o nome da imagem no banco
            $sqlUpdateFoto = "UPDATE usuarios SET nome_foto = ? WHERE email = ?";
            $stmtUpdateFoto = $pdo->prepare($sqlUpdateFoto);
            $stmtUpdateFoto->execute([$nomeArquivo, $email_usuario]);
        } else {
            echo "Erro ao salvar a imagem.";
            exit;
        }
    }

    // Atualizar outras informações do usuário
    $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nome, $numero_celular, $rg, $cpf, $data_nascimento, $sexo, $email_usuario])) {
        // Dados atualizados com sucesso, recarregar as informações
        $sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo, nome_foto FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email_usuario]);

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $sexo_usuario = $usuario['sexo'] ?? ''; // Atualizar a variável $sexo_usuario
            $_SESSION['user_nome'] = $usuario['nome']; // Atualizar o nome do usuário na sessão
            $_SESSION['user_foto'] = $usuario['nome_foto']; // Atualizar o nome da foto na sessão
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao atualizar os dados.";
        exit;
    }
}
?>
