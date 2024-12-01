<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clinica oftalmofologica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">

	<link rel="stylesheet" href="../css/barraLateral.css">
	<link rel="stylesheet" href="../css/perfil.css">
	<link rel="stylesheet" href="../css/nav.css">
  <script src="../libraries/javascript/perfil.js" defer></script>
  <link rel="stylesheet" href="../css/geral.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include('../libraries/aula02.php') ?>
		<?php include('../includes/components/navbar.php') ?>
		<?php include('../includes/components/saidebar.php') ?>
		

		<div class="content-wrapper color">
			<?php include('../includes/components/wrapper.php') ?> 

        <div class="profile-container">
    <div class="profile-pic-container">
      <label for="profile-pic-input" class="profile-pic-label">
        <img id="profile-pic" src="default-profile.png" alt="Foto de Perfil" />
      </label>
      <input type="file" id="profile-pic-input" accept="image/*" onchange="loadProfilePic(event)" style="display: none;">
    </div>

    <!-- Formulário de Edição -->
    <div class="profile-info">
      <label>Nome:
        <input type="text" id="nome" placeholder="Digite seu nome" />
      </label>

      <label>Número de Celular:
        <input type="tel" id="telefone" placeholder="Digite seu número de celular" />
      </label>

      <label>Email:
        <input type="email" id="email" placeholder="Digite seu email" />
      </label>

      <label>RG:
        <input type="text" id="rg" placeholder="Digite seu RG" />
      </label>

      <label>CPF:
        <input type="text" id="cpf" placeholder="Digite seu CPF" />
      </label>

      <button id="save">Salvar</button>
    </div>

    <!-- Exibição de Dados Salvos -->
    <div class="saved-info hidden">
      <p><strong>Nome:</strong> <span id="nome-display"></span></p>
      <p><strong>Número de Celular:</strong> <span id="telefone-display"></span></p>
      <p><strong>Email:</strong> <span id="email-display"></span></p>
      <p><strong>RG:</strong> <span id="rg-display"></span></p>
      <p><strong>CPF:</strong> <span id="cpf-display"></span></p>
      
      <button id="edit">Editar</button>
    </div>
  </div>

		</div>


 
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>

	<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
	<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../adminlte/dist/js/adminlte.min.js"></script>
	<script src="../adminlte/dist/js/demo.js"></script>
</body>

</html>