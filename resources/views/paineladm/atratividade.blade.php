<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIAP - Respostas de Atratividade</title>

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

    <?php if ($_SESSION['login']['user_profile'] != 'Empreendedor'): ?>

    @include('paineladm/parts/sidebar')

    <?php else: ?>

    @include('paineluser/parts/sidebar')

    <?php endif; ?>
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">
                Respostas de Atratividade
                <span class="badge badge-info float-right">{{$startup['category']}} de Negócio </span>
              </h5>
            </div>


            <div class="card-body">

                @if($startup['category'] == 'criação')

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Análise de Mercado: </strong></legend>

                  @foreach($responses[2] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Oportunidade de Negócio: </strong></legend>

                  @foreach($responses[3] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                @endif

                @if($startup['category'] == 'tração')


                <fieldset class="field_set" style="padding: 10px">                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Proposta de Valor: </strong></legend>

                  @foreach($responses[2] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Estratégia de Mercado: </strong></legend>

                  @foreach($responses[3] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Estratégia Financeira: </strong></legend>

                  @foreach($responses[4] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Estratégia de Time: </strong></legend>

                  @foreach($responses[5] as $r_key => $resp)

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$resp['question']['name']}}: </b> <br> 
                          <span class="ml-2"> {{$resp['response']}}</span></h6>
                    </div>
                  </div>

                  <hr>

                  @endforeach

                </fieldset>

                @endif

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Slides e Vídeo: </strong></legend>

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">pitch vídeo: </b> <br><br>
                        @if($url['type'] == 'video')
                        <iframe width="560" height="315" src="{{$url['link']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                        <a href="{{$url['link']}}" target="_blank" >{{$url['link']}}</a>
                        @endif
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">Slide e Apresentação: </b> <br>
                          <span class="ml-2">
                              {{@$attachment['archive']}}
                              <a href="/files/{{$startup['id']}}/{{@$attachment['archive']}}" target="_blank">
                                <button class="btn btn-info" type="button" >
                                  BAIXAR
                                </button> 
                              </a>
                          </span></h6>
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
