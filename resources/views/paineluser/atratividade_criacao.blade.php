<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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

    @include('paineluser/parts/sidebar')

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

        @if($errors->any())
        <div class="alert alert-danger" role="alert" style="">
            {{$errors->first()}}
        </div>
        @endif

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Análise de Atratividade <span class="badge badge-info float-right">Criação de Negócio </span></h5> 

            </div>

        <!-- begin form atratividade -->
        <div class="card-body">

              <!-- atratividade nav form -->

              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-section1-tab" data-toggle="tab" href="#nav-section1" role="tab" aria-controls="nav-section1" aria-selected="true">Análise de Mercado</a>
                  <a class="nav-item nav-link" id="nav-section2-tab" data-toggle="tab" href="#nav-section2" role="tab" aria-controls="nav-section2" aria-selected="false">Oportunidade de Negócio</a>
                  <a class="nav-item nav-link" id="nav-section3-tab" data-toggle="tab" href="#nav-section3" role="tab" aria-controls="nav-section3" aria-selected="false">Slides e Vídeo</a>
                  <a class="nav-item nav-link" id="nav-section4-tab" data-toggle="tab" href="#nav-section4" role="tab" aria-controls="nav-section4" aria-selected="false">Inclusão dos Certificados</a>
                  <a class="nav-item nav-link" id="nav-section5-tab" data-toggle="tab" href="#nav-section5" role="tab" aria-controls="nav-section5" aria-selected="false">Termo de Compromisso</a>
                </div>
              </nav>

            <form id="formAtatividadeCriacao" action="{{ route('response.register.attractive')}}" method="POST" enctype="multipart/form-data" class="mx-auto">
                @method('POST')
                @csrf <!-- {{ csrf_field() }} -->

              <div class="tab-content" id="nav-tabContent">

                    <!-- SESSÃO 01 -->
                    <div class="tab-pane fade show active" id="nav-section1" role="tabpanel" aria-labelledby="nav-section1-tab">

                      <fieldset id="section1" class="mt-3" style="padding: 10px">
                      <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->

                        <!-- Análise de Mercado resposta 1 -->

                        <p class="text-dark"><b>2.1. Análise do setor</b></p>
                        <p class="text-dark"><em>Para esta análise do setor, estamos interessados em saber sobre as oportunidades e os
                        desafios do setor em que a startup vai entrar. Nosso objetivo com esta questão é entender a
                        dinâmica do setor da startup.</em></p>

                        <div class="form-group">
                          <textarea class="form-control text_resp " name="resposta[11]" id="resposta1" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres1"></span></label>
                        </div>

                        <!-- Análise de Mercado resposta 2 -->

                        <p class="text-dark"><b>2.2. Análise de mercado</b></p>
                        <p class="text-dark"><em>Para essa análise de mercado, estamos interessados saber sobre as oportunidades e os
                          desafios do mercado no qual a startup vai operar. Essa análise de mercado se concentra
                          nos clientes.</em></p>

                        <div class="form-group">
                          <textarea class="form-control text_resp " name="resposta[12]" id="resposta2" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres2"></span></label>
                        </div>

                        <!-- Análise de Mercado resposta 3 -->

                        <p class="text-dark"><b>2.3. Análise de concorrentes</b></p>
                        <p class="text-dark"><em>Para esta análise competitiva, estamos interessados em saber sobre os concorrentes do
                          mercado no qual a startup vai operar.</em></p>

                        <div class="form-group">
                          <textarea class="form-control text_resp " name="resposta[13]" id="resposta3" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres3"></span></label>
                        </div>
                      </fieldset>

                    </div>

                    <!-- SESSAO 02 -->
                    <div class="tab-pane fade" id="nav-section2" role="tabpanel" aria-labelledby="nav-section2-tab">
                      <fieldset id="section2" class="mt-3" style="padding: 10px">
                        <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->

                          <!-- Oportunidade de Negócio resposta 1 -->

                          <p class="text-dark"><b>3.1. Inovação de valor</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber o que será feito diferentemente dos
                            concorrentes para produzir um produto com mais benefícios para o cliente.</em></p>

                          <div class="form-group">
                            <textarea class="form-control text_resp " name="resposta[14]" id="resposta4" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres4"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 2 -->

                          <p class="text-dark"><b>3.2. Descrição do problema</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber qual problema será resolvido e o que
                            evidencia que o problema proposto é significativo.</em>
                            </p>

                          <div class="form-group">
                            <textarea class="form-control text_resp " name="resposta[15]" id="resposta5" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres5"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 3 -->

                          <p class="text-dark"><b>3.3. Descrição da solução</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber que solução será desenvolvida e quais
                            são os principais benefícios que a solução oferece.</em></p>

                          <div class="form-group">
                            <textarea class="form-control text_resp " name="resposta[16]" id="resposta6" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres6"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 4 -->

                          <p class="text-dark"><b>3.4. Descrição da vantagem competitiva</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber como o time tornará a startup e a
                            vantagem do produto superiores e sustentáveis.</em>
                            </p>

                          <div class="form-group">
                            <textarea class="form-control text_resp " name="resposta[17]" id="resposta7" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000"></textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres7"></span></label>
                          </div>
                        </fieldset>
                    </div>

                    <!-- SESSAO 03 -->
                    <div class="tab-pane fade" id="nav-section3" role="tabpanel" aria-labelledby="nav-section3-tab">
                      <fieldset id="section3" class="mt-3" style="padding: 10px">

                        <div class="form-group">
                          <label class="text-dark" for="linkVideo"><b>Link do vídeo</b></label>
                          <input type="text" class="form-control" id="resposta" name="resposta[10]" onchange="fileLink()" aria-describedby="linkVideolHelp" placeholder="Ex.: https://www.youtube.com/watch?v=MQs_MGaXqhk">
                          <div id="alertaLink"></div>
                        </div>

                        <div class="form-group">
                          <label class="text-dark" for="slide"><b>Upload de slides de apresentação do projeto</b></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input imput_slide" onchange="fileSlide()" id="slide" name="files[slide]" accept="application/pdf">
                              <div id="slidemsn" class="custom-file-label text-truncate" for="slide">Somente arquivo: PDF </div>
                              <div id="alertaSlideSize"></div>
                          </div>
                        </div>

                      </fieldset>
                    </div>

                      <!-- SESSAO 04 -->
                      <div class="tab-pane fade" id="nav-section4" role="tabpanel" aria-labelledby="nav-section4-tab">
                        <fieldset id="section4" class="mt-3" style="padding: 10px">

                        <div class="form-group">
                            <label class="text-dark" for="certificados"><b>Upload de documentos de certificados</b></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input imput_certificados" onchange="certificadoSlide()" id="certificados" name="files[certificados][]" accept="image/gif, image/jpeg, image/png, application/pdf" multiple="true">
                                <label id="certificadosmsn" class="custom-file-label text-truncate" for="certificados">Somente arquivos: JPEG, PNG, GIF ou PDF. </label>
                                <div id="alertaCertificadoSize"></div>
                            </div>
                        </div>

                        </fieldset>
                      </div>

                      <!-- SESSAO 05 -->
                      <div class="tab-pane fade" id="nav-section5" role="tabpanel" aria-labelledby="nav-section5-tab">
                        <fieldset id="section4" class="mt-3" style="padding: 10px">

                          <h3 class="card-title mt-3">Confirmação do termo de compromisso</h3>

                          <div class="form-group">
                              <label class="pergunta" for="termoTextarea">Leia o termo</label>
                              <textarea class="form-control mt-3" id="termoTextarea" rows="6" disabled="">Declaro para os devidos da lei, que as informações prestadas para a análise de atratividade na edição 2020do Programa Corredores Digitais são verdadeiras e autênticas. E permitirá que a SECITECE compartilhe os dadosreferentes aos seus projetos com parceiros e avaliadores.</textarea>
                              <div class="custom-control custom-checkbox mt-3">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1" value="Eu li, aceito e concordo com os termos." onclick="checkBoxTermo()" >
                                  <label class="custom-control-label" for="customCheck1">Eu li, aceito e concordo com os termos.</label>
                              </div>
                          </div>

                        </fieldset>
                        <button type="submit" id="btnSub" class="btn btn-lg btn-info btn-block input-check"> Salvar as Informações </button>
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

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

   <!-- atratividade custom scripts -->
   <script src="{{ asset('js/form-atratividade.js') }}"></script>

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
