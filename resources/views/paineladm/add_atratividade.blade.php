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


  <title>SIAP - Avaliação de Atratividade</title>

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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Critérios de Habilitação</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Análise de Atratividade da Jornada de {{$startup['category']}} de Negócio</h5>

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
                    <div class="col-sm-12 col-md-8 mt-3 mb-3 mx-auto">
                      <a href="{{ route('startup.view', $startup['id']) }}" target="_blank" >
                        <input type="button" class="btn btn-info" value="Confira Projeto na Íntegra" >
                      </a>
                      <a href="{{ route('attractive.response.view', $startup['id']) }}" target="_blank" >
                        <input type="button" class="btn btn-info" value="Confira Respostas de Atratividade" >
                      </a>
                    </div>
                  </div>

                </fieldset>
              </form>
                <br>
                <p>Os projetos aceitos para o processo de seleção da Fase 2 serão avaliados nos seguintes critérios:</p>
                <form id="formulario" action="{{ route('startup.rating.attractive')}}" method="POST">
                    @method('POST')
                    @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="startup" value="{{$startup['id']}}">

                <table class="table">
                    <thead>
                        <tr>
                        <!-- <th scope="col">Nº</th> -->
                        <th scope="col">Citério</th>
                        <th scope="col">Evidência</th>
                        <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    <tbody>

                      @include('paineladm/attractive/parts/table')

                    </tbody>
                </table>


                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px">Comente seu parecer: </legend>

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mt-3">
                      <textarea class="form-control" name="observacoes" id="observacoes" cols="30" rows="10"></textarea>
                    </div>
                  </div>

                </fieldset>
                <br>

                <input type="submit" class="btn btn-success mb-2" value="Concluir Avaliação">
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
