
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light navtema">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:white;"><i class="fas fa-bars"></i></a>
        </li>
        
        <?php foreach($itens_de_menu as $nome => $url): ?>
        <li class="nav-item d-none d-sm-inline-block" style="color:white;">
            <a href="<?= $url ?>" class="nav-link" style="color:white;"><?= $nome ?></a>
        </li>
        <?php endforeach ?>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search" style="color:white;"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append" >
                <button class="btn btn-navbar" type="submit" >
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search" >
                  <i class="fas fa-times" ></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->