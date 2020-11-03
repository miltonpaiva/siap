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
                  <a class="nav-item nav-link active" id="nav-section1-tab" data-toggle="tab" href="#nav-section0" role="tab" aria-controls="nav-section6" aria-selected="true">Revisão das Informações</a>
                  <a class="nav-item nav-link" id="nav-section1-tab" data-toggle="tab" href="#nav-section1" role="tab" aria-controls="nav-section1" aria-selected="true">Análise de Mercado</a>
                  <a class="nav-item nav-link" id="nav-section2-tab" data-toggle="tab" href="#nav-section2" role="tab" aria-controls="nav-section2" aria-selected="false">Oportunidade de Negócio</a>
                  <a class="nav-item nav-link" id="nav-section3-tab" data-toggle="tab" href="#nav-section3" role="tab" aria-controls="nav-section3" aria-selected="false">Slides e Vídeo</a>
                  <!--<a class="nav-item nav-link" id="nav-section4-tab" data-toggle="tab" href="#nav-section4" role="tab" aria-controls="nav-section4" aria-selected="false">Inclusão dos Certificados</a>-->
                  <a class="nav-item nav-link" id="nav-section5-tab" data-toggle="tab" href="#nav-section5" role="tab" aria-controls="nav-section5" aria-selected="false">Termo de Compromisso</a>
                </div>
              </nav>

            <form id="formAtatividadeCriacao" action="{{ route('response.register.attractive')}}" method="POST" enctype="multipart/form-data" class="mx-auto">
                @method('POST')
                @csrf <!-- {{ csrf_field() }} -->

              <div class="tab-content" id="nav-tabContent">

                    <!-- SESSÃO 00 REVISÃO DE DADOS -->
                    <div class="tab-pane fade show active" id="nav-section0" role="tabpanel" aria-labelledby="nav-section1-tab">

                      <fieldset id="section6" class="mt-3" style="padding: 10px">

                        <p class="text-dark" style="margin: 0px"><b>Nome da Startup</b></p>
                        <input type="text" class="form-control" name="startup[name]" value="{{$startup['name']}}">
                        <br>
                        <p class="text-dark" style="margin: 0px"><b>Município</b></p>
                        <input type="text" class="form-control" name="startup[city]" value="{{$startup['city']}}">
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Setor: </b></p>
                        <input type="hidden" name="startup[question][3][response]" value="{{@$responses[3]['id']}}">
                        <select class="form-control" name="startup[question][3][option]" >
                          @foreach($options[3] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[3]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Tendencia Tecnologia: </b></p>
                        <input type="hidden" name="startup[question][4][response]" value="{{@$responses[4]['id']}}">
                        <select class="form-control" name="startup[question][4][option]" >
                          @foreach($options[4] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[4]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>

                        <p class="text-dark" style="margin: 0px" ><b>Tipo de Solução: </b></p>
                        <input type="hidden" name="startup[question][5][response]" value="{{@$responses[5]['id']}}">
                        <select class="form-control" name="startup[question][5][option]" >
                          @foreach($options[5] as $question => $opt)
                          <option 
                            value="{{$opt['id']}}" 

                            @if(@$responses[5]['option'] == $opt['id'])
                            selected="true" 
                            @endif

                          ><!--END OF OPTION -->

                            {{$opt['name']}}</option>
                          @endforeach
                        </select>
                        <br>


                      </fieldset>

                      <hr class="mt-5 mb-4"> <!-- separador -->

                      <fieldset>
                        <p class="text-dark"><b>Integrantes do time</b></p>

                        @foreach($startup['time'] as $t_id => $time)

                        <button id="btn_fade_{{$t_id}}" class="btn btn_fade btn-outline-secondary btn-lg btn-block mt-5 mb-5"> Participante: {{@$time['name']}} </button>
                        <div id="time_fade_{{$t_id}}" style="display: none;">

                            <div class="form-group">
                                <label class="pergunta" for="nome-compl">Nome Completo</label>
                                <input type="text" class="form-control" id="nome-compl" name="time[{{$t_id}}][nome]" aria-describedby="nomeclpHelp" value="{{@$time['name']}}">

                            </div>
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label class="pergunta" for="funcaop">Função no Projeto (negócio, produto ou marketing)</label>
                                    <select class="form-control" id="funcaop" name="time[{{$t_id}}][funcao]" aria-describedby="funcaopHelp" >
                                        <option 
                                          value="negócio"

                                          @if(@$time['function'] == 'negócio')
                                          selected="true" 
                                          @endif

                                        >Negócio</option>
                                        <option 
                                          value="Produto"

                                          @if(@$time['function'] == 'Produto')
                                          selected="true" 
                                          @endif

                                        >Produto</option>
                                        <option 
                                          value="Marketing"

                                          @if(@$time['function'] == 'Marketing')
                                          selected="true" 
                                          @endif

                                        >Marketing</option>
                                    </select>

                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="pergunta" for="datanasc">Data de Nascimento</label>
                                    <input 
                                      type="text" 
                                      class="form-control" 
                                      id="datanasc" 
                                      name="time[{{$t_id}}][datanasc]" 
                                      aria-describedby="datanascHelp" 
                                      value="{{@$time['data_nasc']}}"

                                      @if(@$time['data_nasc'] == '')
                                        style="border-color: red;"
                                      @endif
                                    >

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-3">
                                  <label class="pergunta" for="rg">RG</label>
                                  <input type="text" class="form-control" id="rg" name="time[{{$t_id}}][rg]" maxlength="15" value="{{@$time['rg']}}">

                                </div>
                                <div class="col-md-2 mb-3">
                                  <label class="pergunta" for="orgemaissor">Órgão Emissor</label>
                                  <input type="text" class="form-control" id="orgemaissor" name="time[{{$t_id}}][orgemaissor]" value="SSP">

                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="pergunta" for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="time[{{$t_id}}][cpf]" aria-describedby="cpfHelp" maxlength="14" value="{{@$time['cpf']}}">
                                    <small id="cpfHelp" class="form-text text-muted obrigatorio" style="display: none;">CPF inválido!</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="instensino">Instituição de Ensino</label>
                                    <input type="text" class="form-control" id="instensino" name="time[{{$t_id}}][instensino]" aria-describedby="instensinoHelp" value="{{@$time['institution']}}">

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="curso">Curso</label>
                                    <input type="text" class="form-control" id="curso" name="time[{{$t_id}}][curso]" aria-describedby="cursoHelp" value="{{@$time['course']}}">

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="pergunta" for="categoria-projeto">Formação</label>
                                        <select class="form-control" id="formacao" name="time[{{$t_id}}][formacao]" value="{{@$time['formation']}}">
                                        <option 
                                          value="1"

                                          @if(@$time['formation'] == 1)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Regular Incompleto</option>
                                        <option 
                                          value="2"

                                          @if(@$time['formation'] == 2)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Regular Completo</option>
                                        <option 
                                          value="3"

                                          @if(@$time['formation'] == 3)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Profissionalizante Incompleto</option>
                                        <option 
                                          value="4"

                                          @if(@$time['formation'] == 4)
                                          selected="true" 
                                          @endif

                                        >Nível Médio Profissionalizante Completo</option>
                                        <option 
                                          value="5"

                                          @if(@$time['formation'] == 5)
                                          selected="true" 
                                          @endif

                                        >Superior Completo</option>
                                        <option 
                                          value="6"

                                          @if(@$time['formation'] == 6)
                                          selected="true" 
                                          @endif

                                        >Superior Incompleto</option>
                                        <option 
                                          value="7"

                                          @if(@$time['formation'] == 7)
                                          selected="true" 
                                          @endif

                                        >Nível Técnico Incompleto</option>
                                        <option 
                                          value="8"

                                          @if(@$time['formation'] == 8)
                                          selected="true" 
                                          @endif

                                        >Nível Técnico Completo</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                  <label class="pergunta" for="logradouro">Logradouro</label>
                                  <input type="text" class="form-control" id="logradouro" name="time[{{$t_id}}][logradouro]" value="{{@$time['address']}}">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="pergunta" for="estadom">Estado</label>
                                    <input type="text" class="form-control" id="estadom" name="time[{{$t_id}}][estado]" value="{{$startup['state']}}">

                                  </div>
                                <div class="col-md-3 mb-3">
                                  <label class="pergunta" for="cidadem">Cidade</label>
                                  <input 
                                    type="text" 
                                    class="form-control" 
                                    id="cidadem" 
                                    name="time[{{$t_id}}][cidade]" 

                                    @if(@$time['city'])
                                    value="{{@$time['city']}}"
                                    @else
                                    value="{{@$startup['city']}}"
                                    @endif
                                  >

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="pergunta" for="emailmenbro">E-mail</label>
                                    <input type="text" class="form-control" id="emailmenbro" name="time[{{$t_id}}][emailmenbro]" value="{{@$time['email']}}">

                                </div>
                                <div class="col-md-3 mb-3">
                                      <label class="pergunta" for="telcontato">Telefone de contato</label>
                                      <input type="text" class="form-control" id="telcontato" name="time[{{$t_id}}][telcontato]" maxlength="14" value="{{@$time['telephone']}}">

                                  </div>
                                <div class="col-md-3 mb-3">
                                    <label class="pergunta" for="linkedin">Linked In</label>
                                    <input type="text" class="form-control" id="linkedin" name="time[{{$t_id}}][linkedin]" value="{{@$time['linkedin']}}">

                                  </div>
                            </div>

                            <div class="form-group mb-5">
                                <label class="pergunta" for="comprovacao">Comprovação de Experiência e Conhecimento</label>
                                <div class="custom-file">
                                    <input type="text" class="form-control" value="{{@$attch[$time['id']]['archive']}}" disabled="true">
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="dados_membros"></div>

                        <button id="inclua_mais" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5">Inclua + 1</button>

                      </fieldset>

                    </div>

                    <!-- SESSÃO 01 -->
                    <div class="tab-pane fade" id="nav-section1" role="tabpanel" aria-labelledby="nav-section1-tab">

                      <fieldset id="section1" class="mt-3" style="padding: 10px">
                      <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->

                        <!-- Análise de Mercado resposta 1 -->

                        <p class="text-dark"><b>2.1. Análise do setor</b></p>
                        <p class="text-dark"><em>Para esta análise do setor, estamos interessados em saber sobre as oportunidades e os
                        desafios do setor em que a startup vai entrar. Nosso objetivo com esta questão é entender a
                        dinâmica do setor da startup.</em></p>

                        <div class="form-group">
                          @if(@$attrs[11]['id'])
                          <input type="hidden" name="response[11]" value="{{$attrs[11]['id']}}">
                          @endif
                          <textarea class="form-control text_resp " name="resposta[11]" criterea="11" id="resposta1" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[11]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres1"></span></label>
                        </div>

                        <!-- Análise de Mercado resposta 2 -->

                        <p class="text-dark"><b>2.2. Análise de mercado</b></p>
                        <p class="text-dark"><em>Para essa análise de mercado, estamos interessados saber sobre as oportunidades e os
                          desafios do mercado no qual a startup vai operar. Essa análise de mercado se concentra
                          nos clientes.</em></p>

                        <div class="form-group">
                          @if(@$attrs[12]['id'])
                          <input type="hidden" name="response[12]" value="{{$attrs[12]['id']}}">
                          @endif
                          <textarea class="form-control text_resp " name="resposta[12]" criterea="12" id="resposta2" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[12]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres2"></span></label>
                        </div>

                        <!-- Análise de Mercado resposta 3 -->

                        <p class="text-dark"><b>2.3. Análise de concorrentes</b></p>
                        <p class="text-dark"><em>Para esta análise competitiva, estamos interessados em saber sobre os concorrentes do
                          mercado no qual a startup vai operar.</em></p>

                        <div class="form-group">
                          @if(@$attrs[13]['id'])
                          <input type="hidden" name="response[13]" value="{{$attrs[13]['id']}}">
                          @endif
                          <textarea class="form-control text_resp " name="resposta[13]" criterea="13" id="resposta3" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[13]['response']}}</textarea>
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
                            @if(@$attrs[14]['id'])
                            <input type="hidden" name="response[14]" value="{{$attrs[14]['id']}}">
                            @endif
                            <textarea class="form-control text_resp " name="resposta[14]" criterea="14" id="resposta4" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[14]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres4"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 2 -->

                          <p class="text-dark"><b>3.2. Descrição do problema</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber qual problema será resolvido e o que
                            evidencia que o problema proposto é significativo.</em>
                            </p>

                          <div class="form-group">
                            @if(@$attrs[15]['id'])
                            <input type="hidden" name="response[15]" value="{{$attrs[15]['id']}}">
                            @endif
                            <textarea class="form-control text_resp " name="resposta[15]" criterea="15" id="resposta5" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[15]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres5"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 3 -->

                          <p class="text-dark"><b>3.3. Descrição da solução</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber que solução será desenvolvida e quais
                            são os principais benefícios que a solução oferece.</em></p>

                          <div class="form-group">
                            @if(@$attrs[16]['id'])
                            <input type="hidden" name="response[16]" value="{{$attrs[16]['id']}}">
                            @endif
                            <textarea class="form-control text_resp " name="resposta[16]" criterea="16" id="resposta6" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[16]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres6"></span></label>
                          </div>

                          <!-- Oportunidade de Negócio resposta 4 -->

                          <p class="text-dark"><b>3.4. Descrição da vantagem competitiva</b></p>
                          <p class="text-dark"><em>Para esta seção, estamos interessados em saber como o time tornará a startup e a
                            vantagem do produto superiores e sustentáveis.</em>
                            </p>

                          <div class="form-group">
                            @if(@$attrs[17]['id'])
                            <input type="hidden" name="response[17]" value="{{$attrs[17]['id']}}">
                            @endif
                            <textarea class="form-control text_resp " name="resposta[17]" criterea="17" id="resposta7" rows='11' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[17]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteres7"></span></label>
                          </div>
                        </fieldset>
                    </div>

                    <!-- SESSAO 03 -->
                    <div class="tab-pane fade" id="nav-section3" role="tabpanel" aria-labelledby="nav-section3-tab">
                      <fieldset id="section3" class="mt-3" style="padding: 10px">

                        <div class="form-group">
                          <label class="text-dark" for="linkVideo"><b>Link do pitch vídeo</b></label>
                          @if(@$attrs[10]['id'])
                          <input type="hidden" name="response[10]" value="{{$attrs[10]['id']}}">
                          @endif
                          <input type="text" class="form-control text_resp" id="linkVideo" name="resposta[10]" criterea="10" onchange="fileLink()" aria-describedby="linkVideolHelp" placeholder="Ex.: https://www.youtube.com/watch?v=MQs_MGaXqhk" value="{{@$attrs[10]['response']}}" >
                          <div id="alertaLink"></div>
                          <div class="alert alert-secondary mt-3" role="alert">
                              <p><strong>O pitch vídeo deverá ser estruturado em conformidade com as seções anteriores do formulário:</strong></p>
                              <p><strong> 1.</strong> A identificação do projeto: nome da startup; cidade-sede da startup; tendência tecnológica; setor de atuação da startup; tipo de solução.</p>
                              <p><strong> 2.</strong> A análise de mercado: análise do setor; análise de mercado; análise de concorrentes.</p>
                              <p><strong> 3.</strong> A oportunidade de negócio: inovação de valor; descrição do problema; descrição da solução; descrição da vantagem competitiva.</p>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="text-dark" for="slide"><b>Upload de slides de apresentação do projeto</b></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input imput_slide text_resp" onchange="fileSlide()" id="slide" name="files[slide]" accept="application/pdf">
                              <div id="slidemsn" class="custom-file-label text-truncate" for="slide">Somente arquivo: PDF </div>
                              <div id="alertaSlideSize"></div>
                          </div>
                        </div>

                      </fieldset>
                    </div>

                      <!-- SESSAO 04 
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
                      </div>-->

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
                        <button type="submit" id="btnSub" class="btn btn-lg btn-info btn-block input-check btnsub"> Salvar as Informações </button>
                        <div id="alertaSubmit"></div>
                        <div id="alertaSubmitLink"></div>
                        <div id="alertaSubmitSlide"></div>
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

  <script>
    var textareas = document.getElementsByClassName('text_resp');
    var route = '{{ route('response.register.attractive.dinamic')}}';
    var startup = <?= $_SESSION['login']['startup_id']; ?>;
    for(key in textareas){
        if (textareas[key].id) {
            var data = textareas[key];
            data.addEventListener("focusout", function(event) {
            var criterea = event.target.getAttribute("criterea");
            var response = event.target.value;

            var url = route + '?startup=' + startup + '&criterea=' + criterea + '&response=' + response;
            sendResponse(url);

            });
        }
    }

    function sendResponse(url) {

        console.log('url');
        console.log(url);

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);

        xhttp.onreadystatechange = function(){
            if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

                var request_response = xhttp.responseText;
                console.log(xhttp.responseText);
                if (request_response) {
                    var json_config = JSON.parse(request_response);
                    if (json_config.status == 400) {
                        console.log('Não foi possivel salvar :(');
                    }else{
                        console.log('Salvo com sucesso ! :)');
                    }
                }else{
                    console.log('Não foi possivel salvar :(');
                }

            }
        }

        xhttp.send();
    }
  </script>
<script>
$(document).ready(function(){
  $(".btn_fade").click(function(e){
    e.preventDefault();
    var fade = this.id.replace('btn', 'time');
    console.log(fade);
    $("#" + fade).fadeToggle("slow");
  });
});
</script>
<script>

  var count = 0;

  $('#inclua_mais').click(function(e){
      e.preventDefault();
      count++;

      var html = '';
      html += '<button id="btn_fade_new_' + count + '" class="btn btn_fade btn-outline-secondary btn-lg btn-block mt-5 mb-5"> Formulário Novo Participante ' + count + '</button>';

      html += '    <div id="time_fade_new_' + count + '" style="display: none;" >';

      html += '        <div class="form-group">';
      html += '            <label class="pergunta" for="nome-compl' + count + '">Nome Completo</label>';
      html += '            <input type="text" class="form-control" id="nome-compl' + count + '" name="time_new[' + count + '][nome]" aria-describedby="nomeclpHelp">';
      html += '            <small id="nomeclpHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '        </div>';
      html += '        <div class="form-row">';
      html += '            <div class="col-md-7 mb-3">';
      html += '                <label class="pergunta" for="funcaop' + count + '">Função no Projeto (negócio, produto ou marketing)</label>';
      html += '                <select class="form-control" id="funcaop' + count + '" name="time_new[' + count + '][funcao]" aria-describedby="funcaopHelp">';
      html += '                    <option value="" disabled selected value="" >Escolher uma das respostas abaixo</option>';
      html += '                    <option value="negócio">Negócio</option>';
      html += '                    <option value="Produto">Produto</option>';
      html += '                    <option value="Marketing">Marketing</option>';
      html += '                </select>';
      html += '                <small id="funcaopHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-5 mb-3">';
      html += '                <label class="pergunta" for="datanasc' + count + '">Data de Nascimento</label>';
      html += '                <input type="date" class="form-control" id="datanasc' + count + '" name="time_new[' + count + '][datanasc]" aria-describedby="datanascHelp">';
      html += '                <small id="datanascHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '        </div>';
      html += '        <div class="form-row">';
      html += '            <div class="col-md-5 mb-3">';
      html += '              <label class="pergunta" for="rg' + count + '">RG</label>';
      html += '              <input type="text" class="form-control" id="rg' + count + '" name="time_new[' + count + '][rg]" maxlength="15" >';
      html += '              <small id="rgHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-2 mb-3">';
      html += '              <label class="pergunta" for="orgemaissor' + count + '">Órgão Emissor</label>';
      html += '              <input type="text" class="form-control" id="orgemaissor' + count + '" name="time_new[' + count + '][orgemaissor]" >';
      html += '              <small id="orgemaissorHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-5 mb-3">';
      html += '                <label class="pergunta" for="cpf' + count + '">CPF</label>';
      html += '                <input type="text" class="form-control" id="cpf' + count + '" name="time_new[' + count + '][cpf]" aria-describedby="cpfHelp" maxlength="15">';
      html += '                <small id="cpfHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatorio!</small>';
      html += '            </div>';
      html += '        </div>';
      html += '        <div class="form-row">';
      html += '            <div class="col-md-4 mb-3">';
      html += '                <label class="pergunta" for="instensino' + count + '">Instituição de Ensino</label>';
      html += '                <input type="text" class="form-control" id="instensino' + count + '" name="time_new[' + count + '][instensino]" aria-describedby="instensinoHelp">';
      html += '                <small id="instensinoHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-4 mb-3">';
      html += '                <label class="pergunta" for="curso' + count + '">Curso</label>';
      html += '                <input type="text" class="form-control" id="curso' + count + '" name="time_new[' + count + '][curso]" aria-describedby="cursoHelp">';
      html += '                <small id="cursoHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-4 mb-3">';
      html += '                <label class="pergunta" for="categoria' + count + '-projeto">Formação</label>';
      html += '                    <select class="form-control" id="formacao' + count + '" name="time_new[' + count + '][formacao]" >';
      html += '                    <option value="" disabled selected>Escolher uma das respostas abaixo</option>';
      html += '                    <option value="1">Nível Médio Regular Incompleto</option>';
      html += '                    <option value="2">Nível Médio Regular Completo</option>';
      html += '                    <option value="3">Nível Médio Profissionalizante Incompleto</option>';
      html += '                    <option value="4">Nível Médio Profissionalizante Completo</option>';
      html += '                    <option value="5">Superior Completo</option>';
      html += '                    <option value="6">Superior Incompleto</option>';
      html += '                    <option value="7">Nível Técnico Incompleto</option>';
      html += '                    <option value="8">Nível Técnico Completo</option>';
      html += '                    </select>';
      html += '                    <small id="formacaoHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '        </div>';

      html += '        <div class="form-row">';
      html += '            <div class="col-md-6 mb-3">';
      html += '              <label class="pergunta" for="logradouro' + count + '">Logradouro</label>';
      html += '              <input type="text" class="form-control" id="logradouro' + count + '" name="time_new[' + count + '][logradouro]">';
      html += '              <small id="logradouroHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '            <div class="col-md-3 mb-3">';
      html += '                <label class="pergunta" for="estadom' + count + '">Estado</label>';
      html += '                <input type="text" class="form-control" id="estadom' + count + '" name="time_new[' + count + '][estado]" >';
      html += '                <small id="estadomHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '              </div>';
      html += '            <div class="col-md-3 mb-3">';
      html += '              <label class="pergunta" for="cidadem' + count + '">Cidade</label>';
      html += '              <input type="text" class="form-control" id="cidadem' + count + '" name="time_new[' + count + '][cidade]" >';
      html += '              <small id="cidademHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
      html += '            </div>';
      html += '        </div>';

      html += '        <div class="form-row">';
      html += '            <div class="col-md-6 mb-3">';
      html += '                <label class="pergunta" for="emailmenbro' + count + '">E-mail</label>';
      html += '                <input type="text" class="form-control" id="emailmenbro' + count + '" name="time_new[' + count + '][emailmenbro]" >';
      html += '                 <small id="emailmenbroHelp' + count + '" class="form-text text-muted">Ex.: seuemail@seuemail.com!</small>';
      html += '            </div>';
      html += '            <div class="col-md-3 mb-3">';
      html += '                  <label class="pergunta" for="telcontato' + count + '">Telefone de contato</label>';
      html += '                  <input type="text" class="form-control" id="telcontato' + count + '" name="time_new[' + count + '][telcontato]" maxlength="14" >';
      html += '                  <small id="telcontatoHelp' + count + '" class="form-text text-muted">E.: 85 999990000</small>';
      html += '              </div>';
      html += '            <div class="col-md-3 mb-3">';
      html += '                <label class="pergunta" for="linkedin' + count + '">Linked In</label>';
      html += '                <input type="text" class="form-control" id="linkedin' + count + '" name="time_new[' + count + '][linkedin]" >';
      html += '                 <small id="emailmenbroHelp' + count + '" class="form-text text-muted">Ex.: https://www.linkedin.com/in/example/</small>';
      html += '              </div>';
      html += '        </div>';

      html += '        <div class="form-group mb-5">';
      html += '            <label class="pergunta" for="comprovacao' + count + '">Anexar Comprovação de Experiência e Conhecimento*</label>';
      html += '            <div class="custom-file">';
      html += '                <input type="file" class="custom-file-input imput_comprovacao" id="comprovacao' + count + '" name="time_new[' + count + '][comprovacao]" accept="application/pdf" >';
      html += '                <label id="uploadc' + count + '" class="custom-file-label" for="comprovacao' + count + '"></label>';
      html += '                <small id="compHelp' + count + '" class="form-text text-muted" style="color: red !important;">PERMITIDO APENAS ARQUIVOS (.pdf) QUE TENHA NO MÁXIMO 200MB</small>';
      html += '            </div>';

      html += '</div> <button type="button" id="' + count + '" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5 remover">Remover</button> </div>';


      $('.dados_membros').append(html);

          $('#btn_fade_new_' + count).click(function(e){
            e.preventDefault();
            var fade = this.id.replace('btn', 'time');
            console.log(fade);
            $('#' + fade).fadeToggle("slow");
          });

          $('.btn_fade').click(function(e){
              e.preventDefault();
          });

            //Upload arquivo comprovacao
        $("#comprovacao" + count).change(function(){
            var nomeArquivo = $(this).val();
            document.getElementById('uploadc' + count).innerHTML = '';
            $("#uploadc" + count).append("<span>" + nomeArquivo + "</span>");
        });


  });

  $('form').on('click', '.remover', function(){
      var button_id = $(this).attr('id');
      count--;
      $('#btn_fade_new_' + button_id +'').remove();
      $('#time_fade_new_' + button_id +'').remove();
  });

</script>
</body>

</html>
