<?php
define('CONTEXT', 'other');
session_start();
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_token'])) {
  session_destroy();
  header('Location: login.php');
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
	<link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">

	<link rel="stylesheet" href="../css/barraLateral.css">
	<link rel="stylesheet" href="../css/nav.css">
  <script src="../libraries/javascript/maps.js" defer></script>
  <link rel="stylesheet" href="../css/geral.css">
  <link rel="stylesheet" href="../css/maps.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include('../libraries/aula02.php') ?>
		<?php include('../includes/components/navbar.php') ?>
		<?php include('../includes/components/saidebar.php') ?>
		

		<div class="content-wrapper color">
            <main>
        <section class="clinic-info">
            <h1>Informações da Clínica</h1>
            <div class="clinic-details">
                <p><strong>Nome:</strong> Clínica Exemplo</p>
                <p><strong>Horários:</strong> Segunda a Sexta, 8h às 18h</p>
                <p><strong>Endereço:</strong> Rua Exemplo, 123 - Bairro, Cidade - Estado</p>
                <p><strong>Telefone:</strong> (00) 1234-5678</p>
                <p><strong>Técnicos:</strong> Dr. João Silva, Dra. Maria Oliveira</p>
            </div>

        <div class="col-md-6 carrosel clinic-info">
            <div class="card borda-ca">
              <!-- /.card-header -->
              <div class="card-body espaco-ca">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner borda-ca">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="../pictures/outras/oft1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../pictures/outras/oft2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="../pictures/outras/oft3.jpg" alt="Third slide">
                    </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


            <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.497436127872!2d-46.66311112564233!3d-23.550571561194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5831d0b80801%3A0xb3a53d45986e3611!2sAv.%20Ang%C3%A9lica%2C%202100%20-%20conj%2052%20-%20Consola%C3%A7%C3%A3o%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001228-200!5e0!3m2!1spt-BR!2sbr!4v1726365006527!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </section>
    </main>

		</div>



		<aside class="control-sidebar control-sidebar-dark">
		</aside>
	</div>

	<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
	<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../adminlte/dist/js/adminlte.min.js"></script>
	<script src="../adminlte/dist/js/demo.js"></script>

<script src="../adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>

</html>
