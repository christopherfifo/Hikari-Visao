<?php
 include('../libraries/php/agendal.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">

            <main class="container mx-auto efeitos" style="max-width: 90%;">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Marcar Consulta</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_profissional">Médico</label>
                                <select class="form-control" id="id_profissional" name="id_profissional" onchange="atualizarProfissional()">
                                    <?php foreach ($profissionais as $profissional): ?>
                                        <option value="<?= $profissional['id'] ?>" data-nome="<?= $profissional['nome'] ?>" data-especialidade="<?= $profissional['especialidade'] ?>">
                                            <?= $profissional['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Campos ocultos para enviar o nome e especialidade do profissional -->
                            <input type="hidden" id="nome_profissional" name="nome_profissional">
                            <input type="hidden" id="especialidade_profissional" name="especialidade_profissional">

                            <div class="form-group">
                                <label for="id_exame">Exame</label>
                                <select class="form-control" id="id_exame" name="id_exame" onchange="atualizarValorExame()">
                                    <?php foreach ($exames as $exame): ?>
                                        <option value="<?= $exame['id'] ?>" data-valor="<?= $exame['valor'] ?>" data-nome="<?= $exame['nome'] ?>">
                                            <?= $exame['nome'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Campo oculto para enviar o nome do exame -->
                            <input type="hidden" id="nome_exame" name="nome_exame">

                            <div class="form-group">
                                <label for="valor_exame">Valor do Exame</label>
                                <input type="text" class="form-control" id="valor_exame" name="valor_exame" readonly>
                            </div>

                            <div class="form-group">
                                <label for="hora_consulta">Horário</label>
                                <select class="form-control" id="hora_consulta" name="hora_consulta">
                                    <?php for ($hora = 9; $hora <= 22; $hora++): ?>
                                        <?php for ($minuto = 0; $minuto < 60; $minuto += 40): ?>
                                            <option value="<?= sprintf('%02d:%02d', $hora, $minuto) ?>"><?= sprintf('%02d:%02d', $hora, $minuto) ?></option>
                                        <?php endfor; ?>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="data_consulta">Data</label>
                                <input type="date" class="form-control" id="data_consulta" name="data_consulta">
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #4bb6b7; margin-inline: auto;">Marcar Consulta</button>
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
