<?php
include('../libraries/php/editarl.php');
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
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">
        <section class="appointments">
            <main class="container">
                <h2 class="text-center mb-4">Editar Usuário</h2>

                <?php if ($usuarioEdit): ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $usuarioEdit['id'] ?>">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuarioEdit['email']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuarioEdit['nome']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_celular">Número de Celular:</label>
                            <input type="text" class="form-control" id="numero_celular" name="numero_celular" value="<?= htmlspecialchars($usuarioEdit['numero_celular']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($usuarioEdit['cpf']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" value="<?= htmlspecialchars($usuarioEdit['rg']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= htmlspecialchars($usuarioEdit['data_nascimento']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                <option value="M" <?= $usuarioEdit['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                                <option value="F" <?= $usuarioEdit['sexo'] == 'F' ? 'selected' : '' ?>>Feminino</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                    <a href="http://localhost/aula_php/pages/usuarios.php" style="margin-top:10px;"><button type="submit" class="btn btn-primary" style="background-color: red;margin-top:10px;">Cancelar</button></a>
                <?php else: ?>
                    <div class="alert alert-warning">Nenhum usuário encontrado para editar.</div>
                <?php endif; ?>
            </main>
         </section>
        </div>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
