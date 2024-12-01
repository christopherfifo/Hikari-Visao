<?php
include('../libraries/php/usuariosl.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/barraLateral.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/geral.css">
    <link rel="stylesheet" href="../css/usuarios.css">
    <script src="../libraries/javascript/usuariosl.js" defer></script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
            <main class="container ">
                <h2 class="text-center mb-4">Lista de Usuários</h2>
                <div class="row" style="margin: auto; flex-direction: column; align-items: center;">
                    <?php foreach ($usuarios as $usuario): ?>
                        <div class="col-md-6 col-12" id="usuario-<?= $usuario['id'] ?>" style="flex: 1 1 auto;">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div style="flex: 3">
                                        <h5 class="card-title "><?= htmlspecialchars($usuario['nome']) ?></h5>
                                    </div>
                                    <div style="flex: 1; display: flex; gap:1rem;">
                                        <button class="btn btn-danger" onclick="deletarUsuario(<?= $usuario['id'] ?>)"><i class="fa-solid fa-trash"></i></button>
                                        <a href="./editar.php?id=<?= $usuario['id'] ?>" class="btn btn-primary ml-2"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
 
</body>
</html>
