<?php include('../libraries/php/examesl.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Exame</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <?php include('../libraries/php/principall.php') ?>        
        <?php else: ?>
            <?php include('../libraries/php/secundariol.php') ?>         
        <?php endif; ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <main class="container efeitos" style="max-width: 90%; height: 80%; overflow-y: auto;">
                <div class="card" style="margin-top:3rem;">
                    <div class="card-header text-center">
                        <h3>Adicionar Exame</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nome">Nome do exame</label>
                                <input type="text" class="form-control" id="nome_exame" name="nome_exame" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_celular">Preço</label>
                                <input type="number" class="form-control" id="valor_exame" name="valor_exame" required step="0.01" min="0">
                            </div>

                            <button type="submit" class="btn btn-primary" style="background-color: #4bb6b7; margin-inline: auto;">Adicionar Médico</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
