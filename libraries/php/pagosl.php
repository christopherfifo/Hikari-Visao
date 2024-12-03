<?php
require "../backend/config.php";
session_start();
define('CONTEXT', 'other');

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

class Consulta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obterConsultasPagas($id_cliente) {
        $sql = "SELECT 
                    c.id AS id_consulta,
                    c.nome_profissional,
                    c.especialidade_profissional,
                    c.data_consulta,
                    c.hora_consulta,
                    dc.nome_exame,
                    dc.valor_exame,
                    p.data_pagamento,
                    p.valor_pago
                FROM 
                    CONSULTAS c
                JOIN 
                    PAGAMENTOS p ON c.id = p.id_consulta
                LEFT JOIN 
                    DETALHES_CONSULTAS dc ON c.id = dc.id_consulta
                WHERE 
                    c.id_usuario = :id_cliente";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$consulta = new Consulta($pdo);
$id_cliente = $_SESSION['user_id'];
$consultas_pagas = $consulta->obterConsultasPagas($id_cliente);
?>