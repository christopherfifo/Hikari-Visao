<?php
require "../backend/config.php";
session_start();
define('CONTEXT', 'other');

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$id_cliente = $_SESSION['user_id']; 
$email_cliente = $_SESSION['user_email'];
$nome_cliente = $_SESSION['user_nome']; 
$mensagem = "";

// Busca todas as consultas sem pagamentos associados
$sql_pendentes = "SELECT 
                    c.id AS id_consulta,
                    c.id_usuario,
                    c.nome_profissional,
                    c.especialidade_profissional,
                    c.data_consulta,
                    c.hora_consulta,
                    dc.valor_exame
                  FROM 
                    CONSULTAS c
                  LEFT JOIN 
                    PAGAMENTOS p ON c.id = p.id_consulta
                  LEFT JOIN 
                    DETALHES_CONSULTAS dc ON c.id = dc.id_consulta
                  WHERE 
                    p.id IS NULL
                  AND 
                    c.id_usuario = :id_cliente";

$stmt_pendentes = $pdo->prepare($sql_pendentes);
$stmt_pendentes->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt_pendentes->execute();
$consultas_pendentes = $stmt_pendentes->fetchAll(PDO::FETCH_ASSOC);

// Processa o pagamento se o método for POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_consulta = $_POST['id_consulta'];
    $valor_pago = $_POST['valor_pago'];
    $data_pagamento = date('Y-m-d');

    $sql = "INSERT INTO PAGAMENTOS (id_consulta, id_cliente, valor_pago, data_pagamento) 
            VALUES (:id_consulta, :id_cliente, :valor_pago, :data_pagamento)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_consulta', $id_consulta);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':valor_pago', $valor_pago);
    $stmt->bindParam(':data_pagamento', $data_pagamento);

    if ($stmt->execute()) {
        $mensagem = "Pagamento adicionado com sucesso!";
        header('Location: pagamentos.php');
    } else {
        $mensagem = "Erro ao adicionar pagamento.";
    }
}
?>