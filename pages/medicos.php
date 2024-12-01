<?php include('../libraries/php/medicosl.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Médico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/agenda.css">
    <script src="../libraries/javascript/agendal.js" defer></script>
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
            <main class="container mx-auto efeitos" style="max-width: 90%; height: 80%; overflow-y: auto;">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Adicionar Médico</h3>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="numero_celular">Número de Celular</label>
        <input type="text" class="form-control" id="numero_celular" name="numero_celular" required>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
    </div>
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf">
    </div>
    <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" name="rg">
    </div>
    <div class="form-group">
        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
    </div>
    <div class="form-group">
        <label for="sexo">Sexo</label>
        <select class="form-control" id="sexo" name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="N">Não especificado</option>
        </select>
    </div>
    <div class="form-group">
        <label for="especialidade">Especialidade</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" required>
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
