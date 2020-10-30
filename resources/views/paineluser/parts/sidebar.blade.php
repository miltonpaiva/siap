    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.painel.view') }}">
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
        <a class="nav-link" href="{{ route('user.painel.view') }}">
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
        <a class="nav-link" href="{{ route('startup.view', $_SESSION['login']['startup_id']) }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Projeto</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <?php
        $is_atratividade =
        (
          strrpos(@$_SERVER['REQUEST_URI'], 'atratividade')
        );
        if ($is_atratividade)
          { $atratividade = 'active'; }
        ?>
      @if(@$startup['stage'] == 'approved')
      <li class="nav-item <?= @$atratividade; ?>">
        <a class="nav-link" href="{{ route('user.attractive.view') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Formulario de Atratividade</span></a>
      </li>
      @endif
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>