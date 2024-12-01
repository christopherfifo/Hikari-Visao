<?php
require "../backend/config.php"; // Conexão com o banco de dados
session_start();

// Verificar se a sessão está ativa
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

header('Content-Type: application/json'); // Adiciona o cabeçalho Content-Type para JSON

// Função para buscar as consultas do mês atual
function getConsultasDoMes($pdo) {
    $mesAtual = date('m'); // Pega o mês atual
    $anoAtual = date('Y'); // Pega o ano atual

    $sql = "SELECT DAY(data_consulta) AS dia, COUNT(*) AS quantidade
            FROM CONSULTAS
            WHERE MONTH(data_consulta) = :mes AND YEAR(data_consulta) = :ano
            GROUP BY DAY(data_consulta)
            ORDER BY dia ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':mes', $mesAtual, PDO::PARAM_INT);
    $stmt->bindParam(':ano', $anoAtual, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar os novos usuários do mês atual
function getNovosUsuariosDoMes($pdo) {
    $mesAtual = date('m'); // Pega o mês atual
    $anoAtual = date('Y'); // Pega o ano atual

    $sql = "SELECT DAY(created_at) AS dia, COUNT(*) AS quantidade
            FROM usuarios
            WHERE MONTH(created_at) = :mes AND YEAR(created_at) = :ano
            GROUP BY DAY(created_at)
            ORDER BY dia ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':mes', $mesAtual, PDO::PARAM_INT);
    $stmt->bindParam(':ano', $anoAtual, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Verificar o endpoint solicitado
$endpoint = isset($_POST['endpoint']) ? $_POST['endpoint'] : '';

// Verificar se o endpoint foi fornecido
if (empty($endpoint)) {
    echo json_encode(["error" => "Endpoint não fornecido"]);
    exit;
}

try {
    // Verificar qual endpoint foi solicitado
    if ($endpoint == 'consultas_mes') {
        // Retorna as consultas do mês
        $consultas = getConsultasDoMes($pdo);
        echo json_encode($consultas);
    } elseif ($endpoint == 'usuarios_mes') {
        // Retorna os novos usuários do mês
        $usuarios = getNovosUsuariosDoMes($pdo);
        echo json_encode($usuarios);
    } else {
        // Caso o endpoint não seja reconhecido, retorna um erro
        echo json_encode(["error" => "Endpoint inválido"]);
    }
} catch (Exception $e) {
    // Retorna erro caso ocorra um problema com a consulta ou conexão
    echo json_encode(["error" => "Erro ao processar a requisição: " . $e->getMessage()]);
}
?>
