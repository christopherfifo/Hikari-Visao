<?php
require '../backend/config.php';

session_start();

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$email_usuario = $_SESSION['user_email'];

$sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo, nome_foto FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email_usuario]);

if ($stmt->rowCount() > 0) {
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $sexo_usuario = $usuario['sexo'] ?? ''; 
    $_SESSION['user_nome'] = $usuario['nome']; 
    $_SESSION['user_foto'] = $usuario['nome_foto']; 
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


    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto_perfil'];

        if ($foto['size'] > 500 * 1024 * 1024) {
            echo "A imagem excede o limite de 500MB.";
            exit;
        }

        $diretorioFotos = '../db/photos/';
        if (!is_dir($diretorioFotos)) {
            mkdir($diretorioFotos, 0777, true);
        }

        $sqlFoto = "SELECT nome_foto FROM usuarios WHERE email = ?";
        $stmtFoto = $pdo->prepare($sqlFoto);
        $stmtFoto->execute([$email_usuario]);
        $fotoExistente = $stmtFoto->fetchColumn();

        if ($fotoExistente) {
            $caminhoFotoExistente = $diretorioFotos . $fotoExistente;
            if (file_exists($caminhoFotoExistente)) {
                unlink($caminhoFotoExistente); 
            }
        }

        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid('foto_', true) . '.' . $extensao; 

        $caminhoFinal = $diretorioFotos . $nomeArquivo;
        if (move_uploaded_file($foto['tmp_name'], $caminhoFinal)) {

            $sqlUpdateFoto = "UPDATE usuarios SET nome_foto = ? WHERE email = ?";
            $stmtUpdateFoto = $pdo->prepare($sqlUpdateFoto);
            $stmtUpdateFoto->execute([$nomeArquivo, $email_usuario]);
        } else {
            echo "Erro ao salvar a imagem.";
            exit;
        }
    }

    $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nome, $numero_celular, $rg, $cpf, $data_nascimento, $sexo, $email_usuario])) {

        $sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo, nome_foto FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email_usuario]);

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $sexo_usuario = $usuario['sexo'] ?? ''; 
            $_SESSION['user_nome'] = $usuario['nome']; 
            $_SESSION['user_foto'] = $usuario['nome_foto']; 
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
