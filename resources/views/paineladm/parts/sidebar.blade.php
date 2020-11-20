    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('painel') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-rocket"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIAP 1.0.0</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php
      if ($_SESSION['login']['user_profile'] != 'Avaliador'):
        if (strrpos(@$_SERVER['REQUEST_URI'], 'painel')){ $painel = 'active'; } 
      ?>
      <li class="nav-item <?= @$painel; ?> ">
        <a class="nav-link" href="{{ route('painel') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    <?php endif; ?>

      <!-- Nav Item - Tables -->
      <?php
      if ($_SESSION['login']['user_profile'] != 'Avaliador'):
        $is_startup =
        (
          strrpos(@$_SERVER['REQUEST_URI'], 'startup') ||
          strrpos(@$_SERVER['REQUEST_URI'], 'projeto')
        );
        if ($is_startup)
          { $projetos = 'active'; }
        ?>
      <li class="nav-item <?= @$projetos; ?>">
        <a class="nav-link" href="{{ route('startup.list') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Projetos</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
    <?php endif; ?>

      <!-- Nav Item - Tables -->
      <?php
        $is_avaliacao = (
          strrpos(@$_SERVER['REQUEST_URI'], 'avaliacoes') ||
          strrpos(@$_SERVER['REQUEST_URI'], 'atratividade') ||
          strrpos(@$_SERVER['REQUEST_URI'], 'prontidao')
        );
        if ($is_avaliacao)
          { $avaliacoes = 'active'; }
        ?>
      <li class="nav-item <?= @$avaliacoes; ?>">
        <a href="#avaliacoesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fas fa-fw fa-table"></i>
          <span>Avaliações</span></a>
          <ul class="collapse list-unstyled" id="avaliacoesSubmenu">
              <li class="nav-link" >
                  <a href="{{ route('rating.list.attractive') }}" style="color: white;">Atratividade</a>
              </li>
          </ul>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <?php
      if ($_SESSION['login']['user_profile'] != 'Avaliador'):
        if (strrpos(@$_SERVER['REQUEST_URI'], 'usuarios'))
          { $usuarios = 'active'; }
        ?>
      <li class="nav-item <?= @$usuarios; ?>">
        <a class="nav-link" href="{{ route('user.list') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Usuarios</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php endif; ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>