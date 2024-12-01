<?php
define('CONTEXT', 'other');
require "../../backend/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consulta_id = $_POST['consulta_id'];
    $data_consulta = $_POST['data_consulta'];
    $hora_consulta = $_POST['hora_consulta'];

    try {
        $stmt = $pdo->prepare("UPDATE CONSULTAS SET data_consulta = :data_consulta, hora_consulta = :hora_consulta WHERE id = :consulta_id");
        $stmt->bindParam(':data_consulta', $data_consulta);
        $stmt->bindParam(':hora_consulta', $hora_consulta);
        $stmt->bindParam(':consulta_id', $consulta_id);
        $stmt->execute();

        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}
?>
