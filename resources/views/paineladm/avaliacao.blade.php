<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        if (strpos($url, 'herokuapp.com')):
    ?>
            <!-- PERMITIR CONTEUDO MISTO TEMPORAREAMENTE -->
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>


  <title>SIAP - Listagem</title>

  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

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
      <li class="nav-item">
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

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Listagem</span></a>
      </li>

     <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Critérios de Habilitação</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Análise de Prontidão da Jornada de {{$startup['category']}} de Negócio</h5>

            </div>

            <div class="card-body">

              <form>
                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px">Resumo do projeto: </legend>
                  <div class="row">
                    <div class="col-sm-12 col-md-4">
                      <h6 c><b>Categoria: </b> <span> {{$startup['category']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <h6 c><b>Startup: </b> <span> {{$startup['name']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <h6 c><b>Estado da startup: </b> <span> {{$startup['stage']}}</span></h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 col-md-4 mt-3">
                      <h6 c><b>Responsável: </b> <span> {{$user['name']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mt-3">
                      <h6 c><b>Cidade: </b> <span> {{$startup['city']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mt-3">
                      <h6 c><b>Nº de Membros: </b> <span> {{$qtd_particpants}}</span></h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 col-md-4 mt-3 mb-3 mx-auto">
                      <button class="btn btn-info ">Confira Projeto na Íntegra</button>
                    </div>
                  </div>

                </fieldset>
              </form>
                <br>
                <p>Os projetos aceitos para o processo de seleção da Fase 1 serão avaliados nos seguintes critérios:</p>
                <form id="formulario" action="{{ route('startup.rating')}}" method="POST">
                    @method('POST')
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="startup" value="{{$startup['id']}}">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Citério</th>
                        <th scope="col">Evidência</th>
                        <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Experiência do time na tecnologia do produto do projeto.</td>
                            <td>A comprovação de experiência se dará por meio de currículo vitae demonstrado por atestado de capacidade técnica, certificado ou declaração.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][1][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0">0,0 – Sem membros</option>
                                    <option value="1.5">1,5 – Um membro</option>
                                    <option value="3.0">3,0 – Duas membros</option>
                                    <option value="4.5"> 4,5 – Três membros</option>

                                    @if($startup['category'] == 'tração')

                                        <option value="6.0">6,0 – Quatro membros</option>
                                        <option value="7.5">7,5 – Cinco membros</option>

                                     @endif

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Experiência do time no setor econômico de atuação do projeto.</td>
                            <td>A comprovação de experiência se dará por meio de currículo vitae demonstrado por atestado
                                de capacidade técnica, certificado ou declaração.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][2][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0">0,0 – Sem membros</option>
                                    <option value="1.5">1,5 – Um membro</option>
                                    <option value="3.0">3,0 – Duas membros</option>
                                    <option value="4.5"> 4,5 – Três membros</option>

                                    @if($startup['category'] == 'tração')

                                        <option value="6.0">6,0 – Quatro membros</option>
                                        <option value="7.5">7,5 – Cinco membros</option>

                                    @endif

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Apresentar no time competências multidisciplinares e complementares.</td>
                            <td>A comprovação de experiência se dará por meio de currículo vitae demonstrado por atestado
                                de capacidade técnica, certificado ou declaração.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][3][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0">0,0 – Sem membros</option>
                                    <option value="3.0">3,0 – Dois membros</option>
                                    <option value="4.5"> 4,5 – Três membros</option>

                                    @if($startup['category'] == 'tração')

                                        <option value="6.0">6,0 – Quatro membros</option>
                                        <option value="7.5">7,5 – Cinco membros</option>

                                    @endif

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Participação de mulheres na composição do time.</td>
                            <td>A comprovação se dará por meio dos dados pessoais fornecidos no formulário de inscrição.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][4][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0">0,0 – Sem mulheres</option>
                                    <option value="1.5">1,5 – Uma mulher</option>
                                    <option value="3.0">3,0 – Duas mulheres</option>
                                    <option value="4.5"> 4,5 – Três mulheres</option>

                                    @if($startup['category'] == 'tração')

                                        <option value="6.0">6,0 – Quatro mulheres </option>

                                    @endif

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Alinhamento com os produtos prioritários do programa.</td>
                            <td>A comprovação se dará por meio dos dados fornecidos no formulário de inscrição.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][5][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0"> 0,0 – Inexistente</option>
                                    <option value="1.0"> 1,0 – Muito baixo</option>
                                    <option value="2.0"> 2,0 – Baixo</option>
                                    <option value="3.0"> 3,0 – Médio</option>
                                    <option value="4.0"> 4,0 – Alto</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Alinhamento com as tendências tecnológicas prioritárias do programa.</td>
                            <td>A comprovação se dará por meio dos dados fornecidos no formulário de inscrição.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][6][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0"> 0,0 – Inexistente</option>
                                    <option value="1.0"> 1,0 – Muito baixo</option>
                                    <option value="2.0"> 2,0 – Baixo</option>
                                    <option value="3.0"> 3,0 – Médio</option>
                                    <option value="4.0"> 4,0 – Alto</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Alinhamento com os setores econômicos prioritários do programa.</td>
                            <td>A comprovação se dará por meio dos dados fornecidos no formulário de inscrição.</td>
                            <td>
                                <select class="custom-select" name="avalicacao[criterio][7][nota]" required>
                                    <option value="">Nota</option>
                                    <option value="0.0"> 0,0 – Inexistente</option>
                                    <option value="1.0"> 1,0 – Muito baixo</option>
                                    <option value="2.0"> 2,0 – Baixo</option>
                                    <option value="3.0"> 3,0 – Médio</option>
                                    <option value="4.0"> 4,0 – Alto</option>
                                </select>
                            </td>
                        </tr>

                        @if($startup['category'] == 'tração')

                            <tr>
                                <th scope="row">8</th>
                                <td>Nível de desenvolvimento do produto.</td>
                                <td>A comprovação se dará por meio de vídeo demonstrativo fornecido no formulário de inscrição.</td>
                                <td>
                                    <select class="custom-select" name="avalicacao[criterio][8][nota]" required>
                                        <option value="">Nota</option>
                                        <option value="0.0"> 0,0 – Inexistente</option>
                                        <option value="1.0"> 1,0 – Muito baixo</option>
                                        <option value="2.0"> 2,0 – Baixo</option>
                                        <option value="3.0"> 3,0 – Médio</option>
                                        <option value="4.0"> 4,0 – Alto</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>Nível de vendas realizadas.</td>
                                <td>A comprovação de vendas se dará por meio de documento fornecido no formulário de inscrição</td>
                                <td>
                                    <select class="custom-select" name="avalicacao[criterio][9][nota]" required>
                                        <option value="">Nota</option>
                                        <option value="0.0"> 0,0 - Inexistente</option>
                                        <option value="1.5"> 1,5 - Protótipo funcional</option>
                                        <option value="3.0"> 3,0 - MVP Alpha</option>
                                        <option value="4.5"> 4,5 - MVP Beta</option>
                                    </select>
                                </td>
                            </tr>

                        @endif

                    </tbody>
                </table>
                <input type="submit" value="Concluir Avaliação">
              </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
