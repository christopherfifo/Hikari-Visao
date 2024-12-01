<?php 
include('../libraries/php/perfill.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clinica Oftalmológica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../css/barraLateral.css" />
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/geral.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="../libraries/javascript/perfill.js" defer></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../libraries/aula02.php') ?>
        <?php include('../includes/components/navbar.php') ?>
        <?php include('../includes/components/saidebar.php') ?>

        <div class="content-wrapper color">

        <section class="container mx-auto efeitos" style="max-width: 600px; background-color: white; margin-inline: auto; margin-block: 20px; padding: 20px; border-radius: 10px;">
    <div class="container mt-4">
        <div class="profile-info text-center">
            <!-- Imagem Redonda -->
            <div class="mb-4">
                <img src="<?php echo ($usuario['nome_foto'] == NULL) ? '../pictures/outras/perfil.webp' : '../db/photos/' . $usuario['nome_foto']; ?>" alt="Foto de Perfil" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;" />
            </div>

            <form action="" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                <!-- Campo Nome -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required readonly />
                </div>

                <!-- Campo Número de Celular -->
                <div class="form-group">
                    <label for="numero_celular">Número de Celular:</label>
                    <input type="tel" class="form-control" id="numero_celular" name="numero_celular" placeholder="Digite seu número de celular" value="<?php echo htmlspecialchars($usuario['numero_celular']); ?>" required readonly />
                </div>

                <!-- Campo RG -->
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG" value="<?php echo htmlspecialchars($usuario['rg']); ?>" required readonly />
                </div>

                <!-- Campo CPF -->
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($usuario['cpf']); ?>" required readonly />
                </div>

                <!-- Campo Data de Nascimento -->
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($usuario['data_nascimento']); ?>" required readonly />
                </div>

                <!-- Campo Sexo -->
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control" required disabled>
                        <option value="m" <?php echo ($sexo_usuario == 'M') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="f" <?php echo ($sexo_usuario == 'F') ? 'selected' : ''; ?>>Feminino</option>
                        <option value="n" <?php echo ($sexo_usuario == 'N') ? 'selected' : ''; ?>></option>
                    </select>
                </div>

                <!-- Campo para Upload de Foto -->
                <div class="form-group">
                    <label for="foto_perfil">Foto de Perfil:</label>
                    <input type="file" class="form-control" id="foto_perfil" name="foto_perfil" accept="image/*" />
                </div>

                <!-- Botões -->
                <div class="text-center">
    <button type="button" id="edit-btn" class="btn btn-primary" onclick="enableEditing()">Editar</button>
    <button id="save-btn" type="submit" class="btn btn-success" style="display: none;">Salvar</button>
</div>
            </form>
        </div>
    </div>
</section>

        </div>

        <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../adminlte/dist/js/adminlte.min.js"></script>

    </div>
</body>
</html>
