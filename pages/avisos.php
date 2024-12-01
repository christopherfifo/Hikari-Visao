<?php
include('../libraries/php/avisosl.php');
?>
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
  <link rel="stylesheet" href="../css/avisos.css">
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
        <main>
        <section class="notice-board">
            <h1>Quadro de Avisos</h1>

            <div class="notice">
                <h2>Aviso 1</h2>
                <p>Descrição do aviso 1. Aqui você pode fornecer mais detalhes sobre o aviso para os usuários.</p>

                <form id="response-form-1" class="response-form">
                    <label for="response-1">Sua Resposta:</label>
                    <textarea id="response-1" name="response-1" rows="4" placeholder="Digite sua resposta aqui..."></textarea>
                    <button type="submit">Enviar Resposta</button>
                </form>
            </div>

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
