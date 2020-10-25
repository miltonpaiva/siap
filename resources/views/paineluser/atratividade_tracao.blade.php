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
  <link href="{{ asset('css/atratividade.css') }}" rel="stylesheet">

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
      <li class="nav-item active">
        <a class="nav-link" href="#">
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
      </li>

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

          <!-- Page Heading 
          <h1 class="h3 mb-2 text-gray-800">Projeto na Íntegra</h1>
           -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Análise de Atratividade <span class="badge badge-info float-right">Tração de Negócio </span></h5> 

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
            
        <!-- begin form atratividade -->
        <div class="card-body">
            
              <!-- atratividade nav form -->

              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-section6-tab" data-toggle="tab" href="#nav-section6" role="tab" aria-controls="nav-section6" aria-selected="true">Proposta de Valor</a>
                  <a class="nav-item nav-link" id="nav-section7-tab" data-toggle="tab" href="#nav-section7" role="tab" aria-controls="nav-section7" aria-selected="false">Estratégia de Mercado</a>
                  <a class="nav-item nav-link" id="nav-section8-tab" data-toggle="tab" href="#nav-section8" role="tab" aria-controls="nav-section8" aria-selected="false">Estratégia Financeira</a>
                  <a class="nav-item nav-link" id="nav-section9-tab" data-toggle="tab" href="#nav-section9" role="tab" aria-controls="nav-section9" aria-selected="false">Estratégia de Time</a>
                  <a class="nav-item nav-link" id="nav-section10-tab" data-toggle="tab" href="#nav-section10" role="tab" aria-controls="nav-section10" aria-selected="false">Slide e Vídeo</a>
                  <a class="nav-item nav-link" id="nav-section11-tab" data-toggle="tab" href="#nav-section11" role="tab" aria-controls="nav-section11" aria-selected="false">Inclusão dos Certificados</a>
                  <a class="nav-item nav-link" id="nav-section12-tab" data-toggle="tab" href="#nav-section12" role="tab" aria-controls="nav-section12" aria-selected="false">Termo de Compromisso</a>
                </div>
              </nav>
              
            <form id="formAtatividadeCriacao" action="" method="POST" enctype="multipart/form-data" class="mx-auto">
              <div class="tab-content" id="nav-tabContent">
                
                    <!-- SESSÃO 01 PROPOSTA DE VALOR -->
                    <div class="tab-pane fade show active" id="nav-section6" role="tabpanel" aria-labelledby="nav-section6-tab">
                  
                      <fieldset id="section6" class="mt-3" style="padding: 10px">
                      <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->
                        
                        <!-- Proposta de Valor 1 -->

                        <p class="text-dark"><b>2.1. Problema</b></p>
                        <p class="text-dark"><em>Qual é o problema?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaproblema1" id="respostaproblema1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema1"></span></label>
                        </div>

                        <p class="text-dark"><em>Quais evidências sustentam que o problema existe?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaproblema2" id="respostaproblema2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema2"></span></label>
                        </div>

                        <p class="text-dark"><em>O problema é urgente, mal atendido, impraticável e/ou inevitável?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaproblema3" id="respostaproblema3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema3"></span></label>
                        </div>

                        <p class="text-dark"><em>O problema é visível e/ou crítico?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaproblema4" id="respostaproblema4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema4"></span></label>
                        </div>
                        
                           <hr class="mt-5 mb-4"> <!-- separador -->
                        
                        <!-- Cliente-alvo -->
                        <p class="text-dark"><b>2.2. Cliente-alvo</b></p>

                        <!-- Quem é o cliente-alvo? -->
                        <p class="text-dark"><em>Quem é o cliente-alvo?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaClienteAlvo1" id="respostaClienteAlvo1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo1"></span></label>
                        </div>

                        <!-- Quais são as necessidades e desejos deles? -->
                        <p class="text-dark"><em>Quais são as necessidades e desejos deles?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaClienteAlvo2" id="respostaClienteAlvo2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo2"></span></label>
                        </div>
                       
                        <!-- Quem é o cliente-alvo? -->
                        <p class="text-dark"><em>Qual é o tamanho do mercado?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaClienteAlvo3" id="respostaClienteAlvo3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo3"></span></label>
                        </div>

                            <hr class="mt-5 mb-4"> <!-- separador -->

                        <!-- 2.3. Proposta de valor  -->
                        <p class="text-dark"><b>2.3. Proposta de valor</b></p>

                        <!-- Quais ganhos os clientes experimentarão? -->
                        <p class="text-dark"><em>Quais ganhos os clientes experimentarão?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaPropostaValor1" id="respostaPropostaValor1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPropostaValor1"></span></label>
                        </div>
                        
                        <!-- Que dores os clientes experimentarão? -->
                        <p class="text-dark"><em>Que dores os clientes experimentarão?</em></p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaPropostaValor2" id="respostaPropostaValor2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPropostaValor2"></span></label>
                        </div>

                           <hr class="mt-5 mb-4"> <!-- separador -->
                      
                       <!-- 2.4. Concorrentes  -->
                       <p class="text-dark"><b>2.4. Concorrentes</b></p>

                       <!-- Quem são os concorrentes e seus clientes? -->
                       <p class="text-dark"><em>Quem são os concorrentes e seus clientes?</em></p>
                       
                       <div class="form-group">
                         <textarea class="form-control" name="respostaConcorrentes1" id="respostaConcorrentes1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes1"></span></label>
                       </div>

                       <!-- Quais são os seus recursos mínimos viáveis? -->
                       <p class="text-dark"><em>Quais são os seus recursos mínimos viáveis?</em></p>
                       
                       <div class="form-group">
                         <textarea class="form-control" name="respostaConcorrentes2" id="respostaConcorrentes2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes2"></span></label>
                       </div>

                       <!-- Por que esses recursos são valiosos e raros? -->
                       <p class="text-dark"><em>Por que esses recursos são valiosos e raros?</em></p>
                       
                       <div class="form-group">
                         <textarea class="form-control" name="respostaConcorrentes3" id="respostaConcorrentes3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes3"></span></label>
                       </div>

                        <!-- Qual é o seu protótipo? -->
                        <p class="text-dark"><em>Qual é o seu protótipo?</em></p>
                       
                        <div class="form-group">
                          <textarea class="form-control" name="respostaConcorrentes4" id="respostaConcorrentes4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes4"></span></label>
                        </div>
                     
                      </fieldset>

                    </div>

                    <!-- SESSAO 02 ESTRATEGIA DE MERCADO-->
                    <div class="tab-pane fade" id="nav-section7" role="tabpanel" aria-labelledby="nav-section7-tab">
                      <fieldset id="section7" class="mt-3" style="padding: 10px">
                        <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->
                          
                          <!-- 3.1 Preço -->
                          <p class="text-dark"><b>3.1. Preço</b></p>
                          
                          <!-- Quais são as estratégias e preços dos concorrentes? -->
                          <p class="text-dark"><em>Quais são as estratégias e preços dos concorrentes?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaEstrategiaMercado1" id="respostaEstrategiaMercado1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresEstrategiaMercado1"></span></label>
                          </div>

                          <!-- Qual é a nossa estratégia e preços? -->
                          <p class="text-dark"><em>Qual é a nossa estratégia e preços?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaEstrategiaMercado2" id="respostaEstrategiaMercado2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresEstrategiaMercado2"></span></label>
                          </div>
                          
                             <hr class="mt-5 mb-4"> <!-- separador -->

                          <!-- 3.2. Distribuição -->
                          <p class="text-dark"><b>3.2. Distribuição</b></p>
                          
                          <!-- Quais são seus canais de distribuição? -->
                          <p class="text-dark"><em>Quais são seus canais de distribuição?</em>
                            </p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaDistribuicao1" id="respostaDistribuicao1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresDistribuicao1"></span></label>
                          </div>

                          <!-- Quem são seus intermediários? -->
                          <p class="text-dark"><em>Quem são seus intermediários?</em>
                          </p>
                        
                        <div class="form-group">
                          <textarea class="form-control" name="respostaDistribuicao2" id="respostaDistribuicao2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresDistribuicao2"></span></label>
                        </div>

                          <hr class="mt-5 mb-4"> <!-- separador -->
  
                          <!-- 3.3. Promoção -->
                          <p class="text-dark"><b>3.3. Promoção</b></p>
                          
                          <!-- Qual é o plano e o orçamento de publicidade? -->
                          <p class="text-dark"><em>Qual é o plano e o orçamento de publicidade?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaPromocao1" id="respostaPromocao1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao1"></span></label>
                          </div>

                          <!-- Qual é o plano de relações públicas? -->
                          <p class="text-dark"><em>Qual é o plano de relações públicas?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaPromocao2" id="respostaPromocao2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao2"></span></label>
                          </div>

                          <!-- Qual é o plano de vendas pessoais? -->
                          <p class="text-dark"><em>Qual é o plano de vendas pessoais?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaPromocao3" id="respostaPromocao3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao3"></span></label>
                          </div>

                          <!-- Qual é o plano e o orçamento de marketing direto? -->
                          <p class="text-dark"><em>Qual é o plano e o orçamento de marketing direto?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaPromocao4" id="respostaPromocao4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao4"></span></label>
                          </div>

                          <!-- Qual é o plano e orçamento de promoção de vendas? -->
                          <p class="text-dark"><em>Qual é o plano e orçamento de promoção de vendas?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaPromocao5" id="respostaPromocao5" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao5"></span></label>
                          </div>

                        </fieldset>
                    </div>

                    <!-- SESSAO 03 ESTRATEGIA FINANCEIRA -->
                    <div class="tab-pane fade" id="nav-section8" role="tabpanel" aria-labelledby="nav-section8-tab">
                      <fieldset id="section8" class="mt-3" style="padding: 10px">
                        <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->
                          
                          <!-- 4.1. Modelo de receita -->
                          <p class="text-dark"><b>4.1. Modelo de receita</b></p>
                          
                          <!-- Quais tipos de fluxos de receita são usados pelos concorrentes? -->
                          <p class="text-dark"><em>Quais tipos de fluxos de receita são usados pelos concorrentes?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaReceita1" id="respostaReceita1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresReceita1"></span></label>
                          </div>

                          <!-- Que tipos de fluxos de receita usará? -->
                          <p class="text-dark"><em>Que tipos de fluxos de receita usará?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaReceita2" id="respostaReceita2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea2"><span class="contagem" id="caracteresReceita2"></span></label>
                          </div>

                          <!-- Quais são suas receitas estimadas no primeiro e no segundo ano? -->
                          <p class="text-dark"><em>Quais são suas receitas estimadas no primeiro e no segundo ano?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaReceita3" id="respostaReceita3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea2"><span class="contagem" id="caracteresReceita3"></span></label>
                          </div>

                          <hr class="mt-5 mb-4"> <!-- separador -->
                          
                          <!-- 4.2. Modelo de custo -->
                          <p class="text-dark"><b>4.2. Modelo de custo</b></p>
                          
                          <!-- Quais são seus custos estimados detalhados no primeiro e no segundo ano? -->
                          <p class="text-dark"><em>Quais são seus custos estimados detalhados no primeiro e no segundo ano?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaCusto1" id="respostaCusto1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresCusto1"></span></label>
                          </div>
  
                          <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 4.3. Modelo de vendas -->
                          <p class="text-dark"><b>4.3. Modelo de vendas</b></p>

                          <!-- Qual é o seu processo de venda? -->
                          <p class="text-dark"><em>Qual é o seu processo de venda?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaVendas1" id="respostaVendas1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresVendas1"></span></label>
                          </div>
                          
                          <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 4.4. Modelo de financiamento -->
                          <p class="text-dark"><b>4.4. Modelo de financiamento</b></p>
                          
                          <!-- Quais são suas necessidades de financiamento? -->
                          <p class="text-dark"><em>Quais são suas necessidades de financiamento?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaFinanciamento1" id="respostaFinanciamento1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresFinanciamento1"></span></label>
                          </div>

                          <!-- Quem são suas fontes candidatas de financiamento? -->
                          <p class="text-dark"><em>Quem são suas fontes candidatas de financiamento?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaFinanciamento2" id="respostaFinanciamento2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresFinanciamento2"></span></label>
                          </div>

                        </fieldset>
                    </div>

                    <!-- SESSAO 04 ESTRATEGIA DE TIME -->
                    <div class="tab-pane fade" id="nav-section9" role="tabpanel" aria-labelledby="nav-section9-tab">
                      <fieldset id="section9" class="mt-3" style="padding: 10px">
                        <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->
                          
                          <!-- 3.1. Fundadores -->
                          <p class="text-dark"><b>3.1. Fundadores</b></p>

                          <!-- Quem são os fundadores? -->
                          <p class="text-dark"><em>Quem são os fundadores?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaFundadores1" id="respostaFundadores1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresFundadores1"></span></label>
                          </div>
                          
                            <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 3.2. Mentores -->
                          <p class="text-dark"><b>3.2. Mentores</b></p>

                          <!-- Quem são os mentores? -->
                          <p class="text-dark"><em>Quem são os mentores?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaMentores1" id="respostaMentores1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresMentores1"></span></label>
                          </div>
                          
                            <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 3.3. Parceiros -->
                          <p class="text-dark"><b>3.3. Parceiros</b></p>

                          <!-- Quem são os principais parceiros? -->
                          <p class="text-dark"><em>Quem são os principais parceiros?</em></p>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="respostaParceiros1" id="respostaParceiros1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresParceiros1"></span></label>
                          </div>

                        </fieldset>
                    </div>

                    <!-- SESSAO 05 SLIDE E VÍDEO -->
                    <div class="tab-pane fade" id="nav-section10" role="tabpanel" aria-labelledby="nav-section10-tab">
                      <fieldset id="section10" class="mt-3" style="padding: 10px">
                        
                        <div class="form-group">
                          <label class="text-dark" for="linkVideo2"><b>Link do vídeo</b></label>
                          <input type="text" class="form-control" id="linkVideo2" onchange="fileLinkB()" aria-describedby="linkVideo2lHelp" placeholder="Ex.: https://www.youtube.com/watch?v=MQs_MGaXqhk">
                          <div id="S2"></div>
                        </div>

                        <div class="form-group">
                          <label class="text-dark" for="slide"><b>Upload de slides de apresentação do projeto</b></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input imput_slideb" onchange="fileSlideB()" id="slide" accept="application/pdf">
                              <div id="slidemsn2" class="custom-file-label text-truncate" for="slide">Somente arquivo: PDF </div>
                              <div id="alertaSlideSize2"></div>
                          </div>
                        </div>

                      </fieldset> 
                    </div>

                      <!-- SESSAO 06 CERTIFICADOS -->
                      <div class="tab-pane fade" id="nav-section11" role="tabpanel" aria-labelledby="nav-section11-tab">
                        <fieldset id="section11" class="mt-3" style="padding: 10px">
                          
                        <div class="form-group">
                            <label class="text-dark" for="certificados"><b>Upload de documentos de certificados</b></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input imput_certificadosb" onchange="certificadoSlideB()" id="certificados" accept="image/gif, image/jpeg, image/png, application/pdf">
                                <label id="certificadosmsn2" class="custom-file-label text-truncate" for="certificados">Somente arquivos: JPEG, PNG, GIF ou PDF. </label>
                                <div id="alertaCertificadoSize2"></div>
                            </div>
                        </div>
  
                        </fieldset> 
                      </div>

                      <!-- SESSAO 07 TERMO DE COMPROMISSO -->
                      <div class="tab-pane fade" id="nav-section12" role="tabpanel" aria-labelledby="nav-section12-tab">
                        <fieldset id="section12" class="mt-3" style="padding: 10px">
                          
                          <h3 class="card-title mt-3">Confirmação do termo de compromisso</h3>

                          <div class="form-group">
                              <label class="pergunta" for="termoTextarea">Leia o termo</label>
                              <textarea class="form-control mt-3" id="termoTextarea" rows="6" disabled="">Declaro para os devidos da lei, que as informações prestadas para a análise de atratividade na edição 2020do Programa Corredores Digitais são verdadeiras e autênticas. E permitirá que a SECITECE compartilhe os dadosreferentes aos seus projetos com parceiros e avaliadores.</textarea>
                              <div class="custom-control custom-checkbox mt-3">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1" value="Eu li, aceito e concordo com os termos." onclick="checkBoxTermoB()" >
                                  <label class="custom-control-label" for="customCheck1">Eu li, aceito e concordo com os termos.</label>
                              </div>
                          </div>
                          
                        </fieldset> 
                        <button type="submit" id="btnSub2" class="btn btn-lg btn-info btn-block input-check"> Salvar as Informações </button>
                        <div id="alertaLinkS"></div>
                      </div>
                      
              </div>
            <form>
        </div>
        <!-- the end from atrativade -->

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

   <!-- atratividade tracao custom scripts -->
   <script src="{{ asset('js/form-atratividade-tracao.js') }}"></script>

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
