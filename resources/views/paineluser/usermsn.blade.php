<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIAP - Listagem</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/msn.css') }}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-rocket"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIAP 1.0.0</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading">
        Interface
      </div>-->

      <!-- Nav Item - Pages Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>-->

      <!-- Nav Item - Utilities Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider 
      <hr class="sidebar-divider">-->

      <!-- Heading 
      <div class="sidebar-heading">
        Addons
      </div>-->

      <!-- Nav Item - Pages Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables 
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Listagem</span></a>
      </li>-->
    
       <!--
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-clipboard-check"></i>
          <span>Critérios de Habilitação</span></a>
      </li>-->

      <!-- Divider 
      <hr class="sidebar-divider d-none d-md-block">
       -->
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts 
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>-->
                <!-- Counter - Alerts 
                <span class="badge badge-danger badge-counter">3+</span>
              </a>-->
              <!-- Dropdown - Alerts -->
             <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li> -->

            <!-- Nav Item - Messages
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>-->
                <!-- Counter - Messages 
                <span class="badge badge-danger badge-counter">7</span>
              </a>-->
              <!-- Dropdown - Messages -->
             <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>-->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Francisco Clemilson</span>
                <!--<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <table class="body-wrap">
                <tr>
                    <td class="container">

                        <!-- Message start -->
                        <table>
                            <tr>
                                <td align="center">
                                    <img src="data:image/png;base64,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" alt="" class="img-fluid" width="300">
                                </td>
                            </tr>
                            <tr>
                                <td class="content">

                                    <h2>Olá,</h2>

                                    <p>Francisco Clemilson,</p>
                                    <p>Parabéns! Seu projeto foi habilitado para participar da 2ª fase de avaliação, ANÁLISE DE ATRATIVIDADE, onde você deverá preecher e atender a todos as questões dispostas
                                    no formúlario. Boa sorte! Clique no botão que segue logo baixo!
                                    </p>

                                    <table>
                                        <tr>
                                            <td align="center">
                                                <p>
                                                    <a href="#" class="button">Formulário de Atratividade</a>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIAP 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>

</body>

</html>
