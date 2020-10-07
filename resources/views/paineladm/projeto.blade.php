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

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-clipboard-check"></i>
          <span>Critérios de Habilitação</span></a>
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

          <!-- Page Heading 
          <h1 class="h3 mb-2 text-gray-800">Projeto na Íntegra</h1>
           -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Projeto na Íntegra</h5>

               <!-- Topbar Search  
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                <div class="input-group">
                <input type="text" class="form-control bg-white border-1 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-info" type="button">
                    <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
                </div>
            </form>-->

            </div>
            
            
            <div class="card-body">

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Usuário: </strong></legend>

                  <div class="row">
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">NOME: </b> <span class="ml-2"> Francisco C. Sousa Nascimento</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">STARTUP: </b> <span class="ml-2"> Tecnews</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">E-MAIL: </b> <span class="ml-2"> fulano@gmail.com</span></h6>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Identificação do projeto</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">ESTADO: </b> <span class="ml-2"> Ceará</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">MUNICÍPIO: </b> <span class="ml-2"> Fortaleza</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">CATEGORIA: </b> <span class="ml-2"> Criação de Negócio</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">SETOR DE ATUAÇÃO: </b> <span class="ml-2"> Computação em nuvem e computação de borda</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">TENDÊNCIA TECNOLÓGICA: </b> <span class="ml-2"> Produtos de consumo (couro & calçados; confecções; madeira & móveis)</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">TENDÊNCIA TECNOLÓGICA: </b> <span class="ml-2"> Produtos de consumo (couro & calçados; confecções; madeira & móveis)</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">ARTICULADOR: </b> <span class="ml-2"> Francisca Jeanne Sidrim de Figueredo Mendonça</span></h6>
                      </div>
                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre o produto</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">Tipo de solução: </b> <span class="ml-2"> Dispositivos conectados</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Estágio de desenvolvimento do produto:</b> <span class="ml-2"> Tenho um MVP com usuários beta</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Há quanto tempo o produto vem sendo desenvolvido? </b> <span class="ml-2"> Entre 3 e 6 meses.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Qual a diferenciação do seu produto? </b> <span class="ml-2"> Nosso produto possui todos os recursos fundamentais mapeados e validados com os clientes, além de outros que os diferencia, e é considerado referência no mercado.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Qual a barreira de cópia que existe no produto desenvolvido? </b> <span class="ml-2"> Produtos de consumo (couro & calçados; confecções; madeira & móveis)</span></h6>
                      </div>
                    </div>
                    
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre o mercado</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">O que você conhece sobre seus concorrentes? </b> <span class="ml-2"> Fiz uma ampla pesquisa e não encontrei nenhum concorrente nesse mercado.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Qual o tamanho do seu mercado (TAM)? </b> <span class="ml-2"> De R$500 milhões até R$1 bilhão por ano.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">O quanto você conhece dos seus potenciais clientes? </b> <span class="ml-2"> Fiz uma pesquisa com vários dos meus potenciais clientes, levantando os comportamentos, principais pontos críticos e dores.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Como é seu mercado de atuação? </b> <span class="ml-2"> É um mercado em desenvolvimento, que vem se consolidando, sem nenhum player de referência ainda.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Como está sua aquisição e crescimento de clientes? </b> <span class="ml-2"> Temos clientes, processos estruturados de vendas e estamos crescendo mais de 10% ao mês, nos últimos 3 meses</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Como a sua startup está sendo notada ou percebida? </b> <span class="ml-2"> Já temos relevância e indicações de vários clientes, estamos bem ativos nas redes sociais, participamos de grandes eventos e já ganhamos destaque em grandes mídias.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Como está o domínio do seu funil de vendas? </b> <span class="ml-2"> Tenho um funil, tenho todas as etapas dominadas, mas ainda não performo da forma esperada.</span></h6>
                      </div>
                    </div>
                    
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre finanças</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">Qual o modelo inicial de receita? </b> <span class="ml-2"> B2B2C (transação entre empresas visando consumidor final)</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">Qual o estágio de receita da empresa? </b> <span class="ml-2"> Gera receita, mas ainda não cobre os custos e despesas.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Você tem recursos financeiros para sustentar a operação por quanto tempo mais? </b> <span class="ml-2"> Não tenho mais recursos financeiros.</span></h6>
                      </div>
                    </div>
                    
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre modelo de negócio</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Como está sua proposta de valor? </b> <span class="ml-2"> Imagino ter uma proposta de valor, mas ainda não definida completamente e nem validei com clientes.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Com relação ao seu modelo de receita, em qual estágio você está? </b> <span class="ml-2"> Já tenho o modelo de negócio, mas ainda não validei ou validei com poucos clientes potenciais.</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Você está preparado para escalar? </b> <span class="ml-2"> Sim, acredito que já estamos maduros em modelo de negócios e produtos para isso, mas ainda não começamos a escalar.</span></h6>
                      </div>
                    </div>
                    
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Identificação do time do projeto</strong> </legend>
  
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Dados dos membros: Qual a experiência do time no mercado da startup? </b> <span class="ml-2"> Ninguém atuou neste mercado, mas alguém já teve relacionamento próximo (como cliente, fornecedor, consultor, etc).</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Como está a composição/dedicação do time? </b> <span class="ml-2"> Apenas um integrantes full-time + outros integrantes part-time.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <h6><b class="text-dark text-uppercase">Faixa etária dos integrantes do time: </b> <span class="ml-2"> Entre 35 e 40 anos.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Nível de conhecimento formal do setor da startup: </b> <span class="ml-2"> Pelo menos um dos integrantes com pós-graduação e pelo menos um founder com formação como especialista no setor da startup.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Vocês possuem desenvolvedor (CTO - Chief Technology Officer)? </b> <span class="ml-2"> Possuo uma pessoa part-time, mas que não possui participação acionária na startup.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Como está a divisão societária da startup? </b> <span class="ml-2"> Sou o único sócio-fundador, mas tenho investidores que não atuam diretamente na startup e possuem mais de 31% de participação.</span></h6>
                        </div>
                    </div>
                   
                    <!-- Listagen dos membros --> 

                    <div class="accordion mt-3 mb-3" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Membro 01
                              </button>
                            </h5>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                             
                                <fieldset class="field_set" style="padding: 10px">
                                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Membro: </strong></legend>
                  
                                    <div class="row">
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Nome Completo: </b> <span class="ml-2"> Francisco Clemilsk Sousa Nascimento</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Função no Projeto: </b> <span class="ml-2"> Produto</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                          <h6><b class="text-dark text-uppercase">Data de Nascimento: </b> <span class="ml-2"> 16/01/1984</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                        <h6><b class="text-dark text-uppercase">RG: </b> <span class="ml-2"> 2000008213211 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Órgão Emissor: </b> <span class="ml-2"> SSP/CE </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">CPF: </b> <span class="ml-2"> 000.000.000-00 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-9 mb-3">
                                        <h6><b class="text-dark text-uppercase">Instituição de Ensino: </b> <span class="ml-2"> FATENE - Faculdade de tecnologia do Nordeste </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Curso: </b> <span class="ml-2"> Engenharia de Software </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Formação: </b> <span class="ml-2"> Superior Completo </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Logradouro: </b> <span class="ml-2"> Rua Londrina, 401 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-2 mb-3">
                                        <h6><b class="text-dark text-uppercase">Estado: </b> <span class="ml-2"> Ceará </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Cidade: </b> <span class="ml-2"> Caucaia </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">E-mail: </b> <span class="ml-2"> clemilsk@gmail.com </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Telefone de contato: </b> <span class="ml-2"> (85) 98709.0910 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Linked In: </b> <span class="ml-2"> https:\\linkedin.com.br/clemilsk </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Comprovação de Experiência: </b> <span class="ml-2"> <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            BAIXAR
                                          </button> </span></h6>
                                      </div>
                                    </div>
                                </fieldset>

                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Membro 02
                              </button>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                              
                                <fieldset class="field_set" style="padding: 10px">
                                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Membro: </strong></legend>
                  
                                    <div class="row">
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Nome Completo: </b> <span class="ml-2"> Milton Paiva Galvão</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Função no Projeto: </b> <span class="ml-2"> Produto</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                          <h6><b class="text-dark text-uppercase">Data de Nascimento: </b> <span class="ml-2"> 16/01/1984</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                        <h6><b class="text-dark text-uppercase">RG: </b> <span class="ml-2"> 2000008213211 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Órgão Emissor: </b> <span class="ml-2"> SSP/CE </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">CPF: </b> <span class="ml-2"> 000.000.000-00 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-9 mb-3">
                                        <h6><b class="text-dark text-uppercase">Instituição de Ensino: </b> <span class="ml-2"> FATENE - Faculdade de tecnologia do Nordeste </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Curso: </b> <span class="ml-2"> Engenharia de Software </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Formação: </b> <span class="ml-2"> Superior Completo </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Logradouro: </b> <span class="ml-2"> Rua Londrina, 401 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-2 mb-3">
                                        <h6><b class="text-dark text-uppercase">Estado: </b> <span class="ml-2"> Ceará </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Cidade: </b> <span class="ml-2"> Caucaia </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">E-mail: </b> <span class="ml-2"> clemilsk@gmail.com </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Telefone de contato: </b> <span class="ml-2"> (85) 98709.0910 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Linked In: </b> <span class="ml-2"> https:\\linkedin.com.br/clemilsk </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Comprovação de Experiência: </b> <span class="ml-2"> <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            BAIXAR
                                          </button> </span></h6>
                                      </div>
                                    </div>
                                </fieldset>

                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                              <button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Membro 03
                              </button>
                            </h5>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                             
                                <fieldset class="field_set" style="padding: 10px">
                                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Membro: </strong></legend>
                  
                                    <div class="row">
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Nome Completo: </b> <span class="ml-2"> Jeisa Fernandes Maria</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Função no Projeto: </b> <span class="ml-2"> Produto</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                          <h6><b class="text-dark text-uppercase">Data de Nascimento: </b> <span class="ml-2"> 16/01/1984</span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-4 mb-3">
                                        <h6><b class="text-dark text-uppercase">RG: </b> <span class="ml-2"> 2000008213211 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Órgão Emissor: </b> <span class="ml-2"> SSP/CE </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">CPF: </b> <span class="ml-2"> 000.000.000-00 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-9 mb-3">
                                        <h6><b class="text-dark text-uppercase">Instituição de Ensino: </b> <span class="ml-2"> FATENE - Faculdade de tecnologia do Nordeste </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Curso: </b> <span class="ml-2"> Engenharia de Software </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Formação: </b> <span class="ml-2"> Superior Completo </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Logradouro: </b> <span class="ml-2"> Rua Londrina, 401 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-2 mb-3">
                                        <h6><b class="text-dark text-uppercase">Estado: </b> <span class="ml-2"> Ceará </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Cidade: </b> <span class="ml-2"> Caucaia </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">E-mail: </b> <span class="ml-2"> clemilsk@gmail.com </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Telefone de contato: </b> <span class="ml-2"> (85) 98709.0910 </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Linked In: </b> <span class="ml-2"> https:\\linkedin.com.br/clemilsk </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Comprovação de Experiência: </b> <span class="ml-2"> <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            BAIXAR
                                          </button> </span></h6>
                                      </div>
                                    </div>
                                </fieldset>

                            </div>
                          </div>
                        </div>
                      </div>
                    
                </fieldset>
               
                <!-- Somente listar para projetos de categoria Tração (Anexos Vídeo e PDF) -->

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Inclusão de anexos do projeto</strong> </legend>
  
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <h6><b class="text-dark text-uppercase">Anexo de Vídeo: </b> <span class="ml-2"> <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                BAIXAR
                              </button> </span></h6>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <h6><b class="text-dark text-uppercase">Anexo de pdf: </b> <span class="ml-2"> <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                BAIXAR
                              </button> </span></h6>
                        </div>
                    </div>
                    
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Confirmação do termo de compromisso</strong> </legend>
  
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><span> Declaro para os devidos da lei, que as informações prestadas para a análise de atratividade na edição 2020do Programa Corredores Digitais são verdadeiras e autênticas. E permitirá que a SECITECE compartilhe os dadosreferentes aos seus projetos com parceiros e avaliadores.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Confirmo quê: </b> <span class="ml-2 text-primary"><b> Eu li, aceito e concordo com os termos. </b></span></h6>
                        </div>
                    </div>
                    
                </fieldset>
                
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
