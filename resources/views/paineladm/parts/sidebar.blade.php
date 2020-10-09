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
      <?php if (strrpos(@$_SERVER['REQUEST_URI'], 'painel')){ $painel = 'active'; } ?>
      <li class="nav-item <?= @$painel; ?> ">
        <a class="nav-link" href="{{ route('painel') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <?php
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

      <!-- Nav Item - Tables -->
      <?php
        if (strrpos(@$_SERVER['REQUEST_URI'], 'avaliacoes'))
          { $avaliacoes = 'active'; }
        ?>
      <li class="nav-item <?= @$avaliacoes; ?>">
        <a class="nav-link" href="{{ route('rating.list') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Avaliações</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <?php
        if (strrpos(@$_SERVER['REQUEST_URI'], 'usuarios'))
          { $usuarios = 'active'; }
        ?>
      <li class="nav-item <?= @$usuarios; ?>">
        <a class="nav-link" href="{{ route('rating.list') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Usuarios</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>