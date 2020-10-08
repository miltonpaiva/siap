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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Projeto na Íntegra</h5>

            </div>


            <div class="card-body">

                <fieldset class="field_set" style="padding: 10px">
                  <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Responsável: </strong></legend>

                  <div class="row">
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">NOME: </b> <br> 
                          <span class="ml-2"> {{$startup['user']['name']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">STARTUP: </b> <br> 
                          <span class="ml-2"> {{$startup['name']}}</span></h6>
                    </div>
                    <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">E-MAIL: </b> <br> 
                          <span class="ml-2"> {{$startup['user']['email']}}</span></h6>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Identificação do projeto</strong> </legend>
  
                    <div class="row">
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">ESTADO: </b> <br> 
                          <span class="ml-2"> {{$startup['state']}}</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">MUNICÍPIO: </b> <br> 
                          <span class="ml-2"> {{$startup['city']}}</span></h6>
                      </div>
                      <div class="col-sm-12 col-md-4 mb-2">
                        <h6><b class="text-dark text-uppercase">CATEGORIA: </b> <br> 
                          <span class="ml-2"> {{$startup['category']}} de Negócio</span></h6>
                      </div>

                      @foreach($questions[1] as $question)

                      <div class="col-sm-12 col-md-6 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre o produto</strong> </legend>

                    <div class="row">

                      @foreach($questions[2] as $question)

                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre o mercado</strong> </legend>

                    <div class="row">

                      @foreach($questions[3] as $question)

                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre finanças</strong> </legend>

                    <div class="row">

                      @foreach($questions[4] as $question)

                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Informações sobre modelo de negócio</strong> </legend>

                    <div class="row">

                      @foreach($questions[5] as $question)

                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                </fieldset>

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Identificação do time do projeto</strong> </legend>

                    <div class="row">

                      @foreach($questions[6] as $question)

                      <div class="col-sm-12 col-md-12 mb-2">
                        <h6><b class="text-dark text-uppercase">{{$question['name']}}: </b> <br>

                          @if (@$responses[$question['id']])

                            <span class="ml-2">
                              {{@$question['options'][$responses[$question['id']]]['name']}}
                            </span>

                          @endif

                          </h6>
                      </div>

                      @endforeach

                    </div>

                    <!-- Listagen dos membros --> 

                    <div class="accordion mt-3 mb-3" id="accordionExample">

                        @foreach($participants as $part)

                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse_{{$part['id']}}" aria-expanded="true" aria-controls="collapse_{{$part['id']}}" style="width: 100%;">
                                Membro - {{$part['name']}}:
                              </button>
                            </h5>
                          </div>

                          <div id="collapse_{{$part['id']}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">

                                <fieldset class="field_set" style="padding: 10px">
                                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"><strong class="text-info">Membro: </strong></legend>

                                    <div class="row">
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Nome Completo: </b> <br> 
                                            <span class="ml-2"> 
                                            {{$part['name']}}
                                          </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                          <h6><b class="text-dark text-uppercase">Função no Projeto: </b> <br> 
                                            <span class="ml-2"> 
                                            {{$part['function']}}
                                          </span></h6>
                                      </div>
                                      @if($part['data_nasc'] != '')
                                      <div class="col-sm-12 col-md-4 mb-3">
                                          <h6><b class="text-dark text-uppercase">Data de Nascimento: </b> <br> 
                                            <span class="ml-2"> 
                                            {{$part['data_nasc']}}
                                          </span></h6>
                                      </div>
                                      @endif
                                      <div class="col-sm-12 col-md-4 mb-3">
                                        <h6><b class="text-dark text-uppercase">RG: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['rg']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Órgão Emissor: </b> <br> 
                                          <span class="ml-2"> 
                                            SSP - {{$startup['state']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">CPF: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['cpf']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-9 mb-3">
                                        <h6><b class="text-dark text-uppercase">Instituição de Ensino: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['institution']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Curso: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['course']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Formação: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['formation']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Logradouro: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['address']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-2 mb-3">
                                        <h6><b class="text-dark text-uppercase">Estado: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$startup['state']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-3 mb-3">
                                        <h6><b class="text-dark text-uppercase">Cidade: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['city']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">E-mail: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['email']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Telefone de contato: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['telephone']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Linked In: </b> <br> 
                                          <span class="ml-2"> 
                                          {{$part['linkedin']}}
                                        </span></h6>
                                      </div>
                                      <div class="col-sm-12 col-md-6 mb-3">
                                        <h6><b class="text-dark text-uppercase">Comprovação de Experiência: </b> <br> 
                                          <span class="ml-2"> 
                                            {{$arquivos[$part['id']]}}
                                          </span>
                                          <br>
                                          <a href="/files/{{$startup['id']}}/{{$arquivos[$part['id']]}}" target="_blank">
                                            <button class="btn btn-info" type="button" >
                                              BAIXAR
                                            </button> 
                                          </a>
                                      </h6>
                                      </div>
                                    </div>
                                </fieldset>

                            </div>
                          </div>
                        </div>

                        @endforeach

                      </div>

                </fieldset>

                <!-- Somente listar para projetos de categoria Tração (Anexos Vídeo e PDF) -->

                @if($startup['category']  == 'tração')

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Inclusão de anexos do projeto</strong> </legend>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <h6><b class="text-dark text-uppercase">Anexo de Vídeo: </b> <br> 
                              <span class="ml-2">
                                {{@$arquivos['video']}}
                              </span>
                              <a href="/files/{{$startup['id']}}/{{@$arquivos['video']}}">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  BAIXAR
                                </button>
                              </a>
                            </h6>

                            </h6>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <h6><b class="text-dark text-uppercase">Anexo de pdf: </b> <br> 
                              <span class="ml-2">
                                {{@$arquivos['pdf']}}
                              </span>
                              <a href="/files/{{$startup['id']}}/{{@$arquivos['pdf']}}">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  BAIXAR
                                </button>
                              </a>
                            </h6>
                        </div>
                    </div>

                </fieldset>


                @endif

                <fieldset class="field_set mt-3" style="padding: 10px">
                    <legend style="width:auto; margin-left: 10px; padding: 5px; font-size: 18px"> <strong class="text-info">Confirmação do termo de compromisso</strong> </legend>
  
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><span> Declaro para os devidos da lei, que as informações prestadas para a análise de atratividade na edição 2020do Programa Corredores Digitais são verdadeiras e autênticas. E permitirá que a SECITECE compartilhe os dadosreferentes aos seus projetos com parceiros e avaliadores.</span></h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-2">
                            <h6><b class="text-dark text-uppercase">Confirmo quê: </b> <br> 
                              <span class="ml-2 text-primary"><b> Eu li, aceito e concordo com os termos. </b></span></h6>
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
