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

class UserManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Função para obter informações do usuário
    public function getUserInfo($email) {
        $sql = "SELECT nome, numero_celular, rg, cpf, data_nascimento, sexo, nome_foto FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para atualizar as informações do usuário
    public function updateUserInfo($email, $data) {
        $sql = "UPDATE usuarios SET nome = ?, numero_celular = ?, rg = ?, cpf = ?, data_nascimento = ?, sexo = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['nome'],
            $data['numero_celular'],
            $data['rg'],
            $data['cpf'],
            $data['data_nascimento'],
            $data['sexo'],
            $email
        ]);
    }

    // Função para atualizar a foto do perfil
    public function updateProfilePhoto($email, $photo) {
        $diretorioFotos = '../db/photos/';
        if (!is_dir($diretorioFotos)) {
            mkdir($diretorioFotos, 0777, true);
        }

        $sqlFoto = "SELECT nome_foto FROM usuarios WHERE email = ?";
        $stmtFoto = $this->pdo->prepare($sqlFoto);
        $stmtFoto->execute([$email]);
        $fotoExistente = $stmtFoto->fetchColumn();

        if ($fotoExistente) {
            $caminhoFotoExistente = $diretorioFotos . $fotoExistente;
            if (file_exists($caminhoFotoExistente)) {
                unlink($caminhoFotoExistente);
            }
        }

        $extensao = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid('foto_', true) . '.' . $extensao;
        $caminhoFinal = $diretorioFotos . $nomeArquivo;

        if (move_uploaded_file($photo['tmp_name'], $caminhoFinal)) {
            $sqlUpdateFoto = "UPDATE usuarios SET nome_foto = ? WHERE email = ?";
            $stmtUpdateFoto = $this->pdo->prepare($sqlUpdateFoto);
            $stmtUpdateFoto->execute([$nomeArquivo, $email]);
        } else {
            throw new Exception("Erro ao salvar a imagem.");
        }
    }
}

$userManager = new UserManager($pdo);

try {
    // Obtendo informações do usuário
    $usuario = $userManager->getUserInfo($email_usuario);

    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit;
    }

    $sexo_usuario = $usuario['sexo'] ?? '';
    $_SESSION['user_nome'] = $usuario['nome'];
    $_SESSION['user_foto'] = $usuario['nome_foto'];

    // Processando o formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'nome' => $_POST['nome'],
            'numero_celular' => $_POST['numero_celular'],
            'rg' => $_POST['rg'],
            'cpf' => $_POST['cpf'],
            'data_nascimento' => $_POST['data_nascimento'],
            'sexo' => $_POST['sexo']
        ];

        // Atualizar as informações do usuário
        $userManager->updateUserInfo($email_usuario, $data);

        // Verificar e atualizar a foto de perfil
        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
            $userManager->updateProfilePhoto($email_usuario, $_FILES['foto_perfil']);
        }

        // Recarregar as informações do usuário
        $usuario = $userManager->getUserInfo($email_usuario);
        $_SESSION['user_nome'] = $usuario['nome'];
        $_SESSION['user_foto'] = $usuario['nome_foto'];
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
