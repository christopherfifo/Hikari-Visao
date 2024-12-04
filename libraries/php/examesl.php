<?php
require '../backend/config.php';
session_start();
define('CONTEXT', 'other');
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

class ExameHandler {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarExame($nomeExame, $valorExame) {

        if (empty($nomeExame) || empty($valorExame)) {
            throw new Exception('Nome e preço do exame são obrigatórios.');
        }

        if (!is_numeric($valorExame) || $valorExame < 0) {
            throw new Exception('O preço do exame deve ser um valor numérico positivo.');
        }

        try {
            $stmt = $this->pdo->prepare("INSERT INTO EXAMES (nome, valor) VALUES (:nome, :valor)");
            $stmt->execute([
                ':nome' => $nomeExame,
                ':valor' => $valorExame
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception('Erro ao inserir o exame: ' . $e->getMessage());
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $exameHandler = new ExameHandler($pdo);
        $nomeExame = isset($_POST['nome_exame']) ? trim($_POST['nome_exame']) : '';
        $valorExame = isset($_POST['valor_exame']) ? trim($_POST['valor_exame']) : '';

        if ($exameHandler->adicionarExame($nomeExame, $valorExame)) {
            header('Location: exames.php');
            exit;
        }
    } catch (Exception $e) {
        echo '<script>alert("Erro: ' . htmlspecialchars($e->getMessage()) . '");</script>';
        echo '<script>window.location.href = "exames.php";</script>';
    }
}
?>
