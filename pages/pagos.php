<?php
include('../libraries/php/pagosl.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/consultas.css">
    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    html, body {
    height: 100%;
}

.wrapper {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

.content-wrapper {
    flex: 1;
    padding-bottom: 20px; 
}
</style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" >
        <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
                <?php include('../libraries/php/principall.php') ?>        
            <?php else: ?>
                <?php include('../libraries/php/secundariol.php') ?>         
            <?php endif; ?>
            <?php include('../includes/components/navbar.php'); ?>
            <?php include('../includes/components/saidebar.php'); ?>

        <div class="content-wrapper color" >
            <div class="container">
                <h2>Consultas Pagas</h2>
                <?php if (count($consultas_pagas) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome do Médico</th>
                                <th>Especialidade</th>
                                <th>Data e Hora</th>
                                <th>Exames</th>
                                <th>Valor da Consulta</th>
                                <th>Data de Pagamento</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas_pagas as $consulta): ?>
                                <tr>
                                    <td><?= htmlspecialchars($consulta['nome_profissional']) ?></td>
                                    <td><?= htmlspecialchars($consulta['especialidade_profissional']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($consulta['data_consulta'] . ' ' . $consulta['hora_consulta'])) ?></td>
                                    <td><?= htmlspecialchars($consulta['nome_exame']) ?></td>
                                    <td>R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></td>
                                    <td><?= date('d/m/Y', strtotime($consulta['data_pagamento'])) ?></td>
                                    <td style="color: green; font-weight: bold;">Pago</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Não há consultas pagas registradas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>