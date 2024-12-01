<?php
define('CONTEXT', 'main');
require "./backend/config.php";
session_start();

if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
    session_destroy();
    header('Location: pages/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>clinica oftalmofologica</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="./css/barraLateral.css">
	<link rel="stylesheet" href="./css/sidebar.css">
	<link rel="stylesheet" href="./css/nav.css">
	<link rel="stylesheet" href="./css/geral.css">
	<script src="../libraries/javascript/perfil.js" defer></script>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include('./libraries/aula02.php') ?>
		<?php include('./includes/components/navbar.php') ?>
		<?php include('./includes/components/saidebar.php') ?>
		

		<div class="content-wrapper color">
			<?php include('./includes/components/wrapper.php') ?> 
			<?php include('./includes/components/maincontent.php') ?> 
			<?php include('./includes/components/consultasProximas.php') ?> 
			<?php include('./includes/components/novidades.php') ?> 
		</div>
 
		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>

	<script src="adminlte/plugins/jquery/jquery.min.js"></script>
	<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
