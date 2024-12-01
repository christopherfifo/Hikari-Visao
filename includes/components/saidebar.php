<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 barra">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
          <img src="<?php echo (empty($_SESSION['user_foto'])) ? './pictures/outras/perfil.webp' : './db/photos/' . $_SESSION['user_foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;" />
        <?php else: ?>
          <img src="<?php echo (empty($_SESSION['user_foto'])) ? '../pictures/outras/perfil.webp' : '../db/photos/' . $_SESSION['user_foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;" />
        <?php endif; ?>
      </div>
      <div class="info">
      <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
        <a href="./pages/perfil.php" class="d-block" id="perfil-name"><?php echo (empty($_SESSION['user_nome'])) ? 'Perfil' : htmlspecialchars($_SESSION['user_nome']); ?></a>
              <?php else: ?>
                <a href="./perfil.php" class="d-block" id="perfil-name"><?php echo (empty($_SESSION['user_nome'])) ? 'Perfil' : htmlspecialchars($_SESSION['user_nome']); ?></a>
              <?php endif; ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-address-card nav-icon"></i>
            <p>
              Contato
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-brands fa-instagram nav-icon"></i>
                <p>Instagram</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-brands fa-whatsapp nav-icon"></i>
                <p>Whatsapp</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-envelope nav-icon"></i>
                <p>Email</p>
              </a>
            </li>
            <li class="nav-item">
              <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
                <a href="./pages/maps.php" class="nav-link">
              <?php else: ?>
                <a href="./maps.php" class="nav-link">
              <?php endif; ?>
                <i class="fa-solid fa-map-location-dot nav-icon"></i>
                <p>Clinica</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/avisos.php" class="nav-link">
          <?php else: ?>
            <a href="./avisos.php" class="nav-link">
          <?php endif; ?>
            <i class="fa-solid fa-circle-exclamation nav-icon"></i>
            <p>Quadro de avisos</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/consultas.php" class="nav-link">
          <?php else: ?>
            <a href="./consultas.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon fa-solid fa-calendar-check"></i>
            <p>Consultas</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/usuarios.php" class="nav-link">
          <?php else: ?>
            <a href="./usuarios.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon fa-solid fa-users-gear"></i>
            <p>Usuários</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/agenda.php" class="nav-link">
          <?php else: ?>
            <a href="./agenda.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon fa-solid fa-calendar-plus"></i>
            <p>Agendar consultas</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/historico.php" class="nav-link">
          <?php else: ?>
            <a href="./historico.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon fas fa-edit"></i>
            <p>Histórico</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/relatorio.php" class="nav-link">
          <?php else: ?>
            <a href="./relatorio.php" class="nav-link">
          <?php endif; ?>
            <i class="fa-solid fa-chart-line nav-icon"></i>
            <p>Relatórios de consultas</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/calendario.php" class="nav-link">
          <?php else: ?>
            <a href="./calendario.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>Calendário</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/login.php" class="nav-link">
          <?php else: ?>
            <a href="./login.php" class="nav-link">
          <?php endif; ?>
            <i class="nav-icon far fa-plus-square"></i>
            <p>Login/Register</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/configuracoes.php" class="nav-link">
          <?php else: ?>
            <a href="./configuracoes.php" class="nav-link">
          <?php endif; ?>
            <i class="fa-solid fa-gear nav-icon"></i>
            <p>Configurações</p>
          </a>
        </li>
        <li class="nav-item">
          <?php if (defined('CONTEXT') && CONTEXT === 'main'): ?>
            <a href="./pages/saida.php" class="nav-link">
          <?php else: ?>
            <a href="./saida.php" class="nav-link">
          <?php endif; ?>
            <i class="fa-solid fa-door-open nav-icon"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
