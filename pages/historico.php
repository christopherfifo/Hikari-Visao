<?php
include('../libraries/php/historicol.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="../libraries/javascript/perfil.js" defer></script>
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/consultas.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <main>
                <section class="history">
                    <h1>Histórico de Consultas</h1>
                    <p class="info-text">As seguintes consultas foram realizadas anteriormente:</p>

                    <?php if (count($consultas_passadas) > 0): ?>
                        <div class="d-flex flex-wrap" style="gap: 1rem; width: 100%;  margin-inline: auto;">
                        <?php foreach ($consultas_passadas as $consulta): ?>
                            <div class="card mb-3 flex-fill" style="min-width: 200px; max-width: 350px; margin-bottom: 20px; flex:1;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($consulta['nome_profissional']) ?></h5>
                                <p class="d-block"><strong>Especialidade:</strong> <?= htmlspecialchars($consulta['especialidade_profissional']) ?></p>
                                <p><strong>Exame:</strong> <?= htmlspecialchars($consulta['nome_exame']) ?></p>
                                <p><strong>Valor do Exame:</strong> R$ <?= number_format($consulta['valor_exame'], 2, ',', '.') ?></p>
                                <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($consulta['data_consulta'])) ?></p>
                                <p><strong>Hora:</strong> <?= date('H:i', strtotime($consulta['hora_consulta'])) ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                        <p>Você ainda não realizou consultas.</p>
                    <?php endif; ?>
                </section>
            </main>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
