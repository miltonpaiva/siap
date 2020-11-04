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

  <title>SIAP - Novo Usuário</title>

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

    @include('paineladm/parts/sidebar')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        @include('paineladm/parts/nav')

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @if(@$message['message'] != '')
          <div class="alert alert-{{@$message['type']}}" role="alert" style="">
              {{@$message['message']}}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger" role="alert" style="">
              {{$errors->first()}}
          </div>
          @endif

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Novo Usuário</h1>

          <!-- DataTales Example -->
        <form id="formulario" action="{{ route('user.add')}}" method="POST">
            @method('POST')
            @csrf <!-- {{ csrf_field() }} -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <input type="submit" class="btn btn-success" style="float: right;" value="Salvar" >
            </div>
            <div class="card-body">
              <div class="table-responsive">

                    <div class="form-group">
                        <label class="pergunta" for="nome-compl">Nome Completo</label>
                        <input type="text" class="form-control" id="nome-compl" name="nome" aria-describedby="nomeclpHelp" required="true" >
                        <small id="nomeclpHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                    </div>
                    <div class="form-group">
                        <label class="pergunta" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="nomeclpHelp" required="true" >
                        <small id="nomeclpHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                    </div>
                    <div class="form-row">
                        <div class="col-md-7 mb-3">
                            <label class="pergunta" for="perfil">Perfil de Usuário</label>
                            <select class="form-control" id="perfil" name="perfil" aria-describedby="funcaopHelp" required="true" >
                                <option value="" >Escolher uma das respostas abaixo</option>
                                <option value='Gestor'>Gestor</option>
                                <option value='Técnico'>Técnico</option>
                                <option value='Avaliador'>Avaliador</option>
                            </select>
                            <small id="funcaopHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                        </div>
                        <div class="col-md-5 mb-3">
                          <label class="pergunta" for="senha">Senha</label>
                          <input type="text" class="form-control" id="senha" name="senha" aria-describedby="nomeclpHelp" required="true" >
                          <small id="nomeclpHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                        </div>
                    </div>


              </div>
            </div>
          </div>
        </form>

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
