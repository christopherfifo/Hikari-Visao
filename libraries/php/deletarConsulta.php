<?php
define('CONTEXT', 'other');
require "../../backend/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consulta_id = $_POST['consulta_id'];
    $detalhe_id = $_POST['detalhe_id'];

    try {
        // Primeiro, excluímos os detalhes da consulta
        $stmtDetalhes = $pdo->prepare("DELETE FROM DETALHES_CONSULTAS WHERE id = :detalhe_id");
        $stmtDetalhes->bindParam(':detalhe_id', $detalhe_id);
        $stmtDetalhes->execute();

        // Em seguida, excluímos a consulta
        $stmtConsulta = $pdo->prepare("DELETE FROM CONSULTAS WHERE id = :consulta_id");
        $stmtConsulta->bindParam(':consulta_id', $consulta_id);
        $stmtConsulta->execute();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}
?>
