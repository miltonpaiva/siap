<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <?php
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        if (strpos($url, 'herokuapp.com')):
    ?>
            <!-- PERMITIR CONTEUDO MISTO TEMPORAREAMENTE -->
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>

  <title>SIAP - Listagem de Projetos</title>

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

          <?php if (@$_SESSION['message']): ?>
          <div class="alert alert-<?= $_SESSION['message']['type']; ?>" role="alert" style="">
              <?= $_SESSION['message']['message']; ?>
          </div>
          <?php endif; ?>

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
          <h1 class="h3 mb-2 text-gray-800">Listagem</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
            </div>
            <div class="card-body">

              <form class="form-inline">
                <div class="form-group mb-2">
                  <select class="form-control filter" id="regiao" onclick="clearOters(this)" >
                    <option disabled="true" value="" selected >Região do Projeto</option>

                      @foreach ($all_regions as $region_v => $region)
                          <option value="{{ $region_v }}" >{{ $region }}</option>
                      @endforeach

                  </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">

                  <select class="form-control filter" id="cidade" onclick="clearOters(this)" >
                    <option disabled="true" value="" selected >Cidade do Projeto</option>

                      @foreach ($cities as $city_v => $city)
                          <option value="{{ $city_v }}" >{{ $city }}</option>
                      @endforeach

                  </select>
                </div>
                <div class="form-group mb-2">

                  <select class="form-control filter" id="articulador" onclick="clearOters(this)" >
                    <option disabled="true" value="" selected >Articulador do Projeto</option>

                      @foreach ($articuladores as $art_v => $art)
                          <option value="{{ $art_v }}" >{{ $art }}</option>
                      @endforeach

                  </select>
                </div>

              </form>

              <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">

                  <select class="form-control filter" id="tecnologia" onclick="clearOters(this)" >
                    <option disabled="true" value="" selected >Tecnologia do Projeto</option>

                      @foreach ($tecnologias as $tec_v => $tec)
                          <option value="{{ $tec_v }}" >{{ $tec }}</option>
                      @endforeach

                  </select>
                </div>

                <button type="submit" id="btn_filter" class="btn btn-success mb-2">Filtrar</button>

              </form>

              <script>
                function sendFilter() {
                    var selects = document.getElementsByClassName('filter');
                    var dominio_atual = window.location.href.split('?')[0];
                    for(key in selects){
                      if (selects[key].id) {
                        var valid_slct = selects[key];
                        if (valid_slct.value != '') {
                          var valor = valid_slct.value;
                          var filtro = valid_slct.id;
                          window.location.href = dominio_atual + '?' + filtro + '=' + valor;
                        }
                      }
                    }
                }
                document.getElementById('btn_filter').addEventListener("click", function(event) {
                    event.preventDefault();
                    sendFilter();
                });

                var query = location.search.slice(1);
                var partes = query.split('&');
                var _get = {};
                partes.forEach(function (parte) {
                    var chaveValor = parte.split('=');
                    var chave = chaveValor[0];
                    var valor = chaveValor[1];
                    _get[chave] = valor;
                });

                for(key_g in _get){
                  if (document.getElementById(key_g)) {
                    document.getElementById(key_g).value = _get[key_g];
                  }
                }

                function clearOters(current_select) {
                    var selects = document.getElementsByClassName('filter');
                    for(key in selects){
                      if (selects[key].id) {
                        var valid_slct = selects[key];
                        if (valid_slct.id != current_select.id) {
                          valid_slct.value = '';
                        }
                      }
                    }
                }

              </script>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
              Projetos
              <a href="/files/startups.txt" download="startups.txt" target="_blank">
                <span class="badge badge-info float-right btn">Baixar em txt</span>
              </a>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Ação</th>
                      <th>#</th>
                      <th>Startup</th>
                      <th>Responsável</th>
                      <th>Resp. E-mail</th>
                      <th>Categoria</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Ação</th>
                      <th>#</th>
                      <th>Startup</th>
                      <th>Responsável</th>
                      <th>Resp. E-mail</th>
                      <th>Categoria</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach($startups as $startup)

                      <tr>
                        <td>
                          <select onchange="redirectAction(this)" >
                            <option disabled="true" value="" selected="true" >---</option>
                            @if($startup['stage'] == 'complete')
                            <option value="{{ route('startup.rating.view.action', $startup['id']) }}" >
                                Avaliar
                            </option>
                            @endif
                            <option value="{{ route('startup.view', $startup['id']) }}" >
                                Visualizar
                            </option>
                            @if($startup['stage'] == 'complete_attractive')
                            <option value="{{ route('attractive.response.view', $startup['id']) }}" >
                                Vis. Atratividade
                            </option>
                            @endif
                          </select>
                        </td>
                        <td>{{$startup['id']}}</td>
                        <td>{{$startup['name']}}</td>
                        <td>{{@$startup['user']}}</td>
                        <td>{{@$startup['email']}}</td>
                        <td>{{$startup['category']}}</td>
                        <td>
                          @if($startup['stage'] == 'rated')
                            Aguardando Habilitação
                          @endif
                          @if($startup['stage'] == 'approved')
                            Em Atratividade
                          @endif
                          @if($startup['stage'] == 'complete_attractive')
                            Aguardando 2° avaliação
                          @endif
                          @if($startup['stage'] == 'complete')
                            Aguardando 1° avaliação
                          @endif
                          @if($startup['stage'] == 'in_progress')
                            Em Prontidão
                          @endif
                          @if($startup['stage'] == 'reproved')
                            Reprovado Prontidão
                          @endif
                        </td>
                      </tr>

                    @endforeach

                  </tbody>
                </table>
                <script>
                    function redirectAction(select) {
                      window.location.href = select.value;
                    }
                </script>
              </div>
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

  <img src="{{route('startup.csv')}}" alt="">

</body>

</html>
