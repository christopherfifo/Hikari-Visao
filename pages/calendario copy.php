<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendário</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/fullcalendar/main.css">
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../css/nav.css">
  <script src="../libraries/javascript/perfil.js" defer></script>
  <link rel="stylesheet" href="../css/barraLateral.css">
  <link rel="stylesheet" href="../css/geral.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include('../libraries/aula02.php') ?>
  <?php include('../includes/components/navbar.php') ?>
  <?php include('../includes/components/saidebar.php') ?>
  
  <div class="content-wrapper color">
    <?php include('../includes/components/wrapper.php') ?>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Eventos Arrastáveis</h4>
                </div>
                <div class="card-body">
                  <div id="external-events">
                    <div class="external-event bg-success">Almoço</div>
                    <div class="external-event bg-warning">Ir para casa</div>
                    <div class="external-event bg-info">Fazer lição de casa</div>
                    <div class="external-event bg-primary">Trabalhar no design</div>
                    <div class="external-event bg-danger">Dormir bem</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        Remover após soltar
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Criar Evento</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Título do Evento">
                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Adicionar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  

  
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<script src="../adminlte/plugins/moment/moment.min.js"></script>
<script src="../adminlte/plugins/fullcalendar/main.js"></script>
<script src="../adminlte/dist/js/demo.js"></script>
<script src="../libraries/javascript/calendario.js"></script>
</body>
</html>
