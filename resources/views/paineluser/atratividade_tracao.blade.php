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

          <!-- Page Heading
          <h1 class="h3 mb-2 text-gray-800">Projeto na Íntegra</h1>
           -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold ">Análise de Atratividade <span class="badge badge-info float-right">Tração de Negócio </span></h5> 

            </div>

        <!-- begin form atratividade -->
        <div class="card-body">

              <!-- atratividade nav form -->

              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-section1-tab" data-toggle="tab" href="#nav-section1" role="tab" aria-controls="nav-section6" aria-selected="true">Revisão das Informações</a>
                  <a class="nav-item nav-link" id="nav-section6-tab" data-toggle="tab" href="#nav-section6" role="tab" aria-controls="nav-section6" aria-selected="true">Proposta de Valor</a>
                  <a class="nav-item nav-link" id="nav-section7-tab" data-toggle="tab" href="#nav-section7" role="tab" aria-controls="nav-section7" aria-selected="false">Estratégia de Mercado</a>
                  <a class="nav-item nav-link" id="nav-section8-tab" data-toggle="tab" href="#nav-section8" role="tab" aria-controls="nav-section8" aria-selected="false">Estratégia Financeira</a>
                  <a class="nav-item nav-link" id="nav-section9-tab" data-toggle="tab" href="#nav-section9" role="tab" aria-controls="nav-section9" aria-selected="false">Estratégia de Time</a>
                  <a class="nav-item nav-link" id="nav-section10-tab" data-toggle="tab" href="#nav-section10" role="tab" aria-controls="nav-section10" aria-selected="false">Slide e Vídeo</a>
                  <!--<a class="nav-item nav-link" id="nav-section11-tab" data-toggle="tab" href="#nav-section11" role="tab" aria-controls="nav-section11" aria-selected="false">Inclusão dos Certificados</a>-->
                  <a class="nav-item nav-link" id="nav-section12-tab" data-toggle="tab" href="#nav-section12" role="tab" aria-controls="nav-section12" aria-selected="false">Termo de Compromisso</a>
                </div>
              </nav>

            <form id="formAtatividadeCriacao" action="{{ route('response.register.attractive')}}" method="POST" enctype="multipart/form-data" class="mx-auto">
                @method('POST')
                @csrf <!-- {{ csrf_field() }} -->
              <div class="tab-content" id="nav-tabContent">



                    <!-- SESSÃO 00 REVISÃO DE DADOS -->
                    <div class="tab-pane fade show active" id="nav-section1" role="tabpanel" aria-labelledby="nav-section1-tab">

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



                    <!-- SESSÃO 01 PROPOSTA DE VALOR -->
                    <div class="tab-pane fade" id="nav-section6" role="tabpanel" aria-labelledby="nav-section6-tab">

                      <fieldset id="section6" class="mt-3" style="padding: 10px">
                      <!-- <legend style="width:auto; margin-left:0; padding: 2px; font-size: 16px"> <strong class="text-info">ANÁLISE DE MERCADO</strong> </legend> -->

                        <!-- Proposta de Valor 1 -->

                        <p class="text-dark"><b>2.1. Problema</b></p>
                        <p class="text-dark"><em>Qual é o problema?</em></p>

                        <div class="form-group">
                            @if(@$attrs[18]['id'])
                            <input type="hidden" name="response[18]" value="{{$attrs[18]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[18]" criterea="18" id="respostaproblema1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[18]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema1"></span></label>
                        </div>

                        <p class="text-dark"><em>Quais evidências sustentam que o problema existe?</em></p>

                        <div class="form-group">
                            @if(@$attrs[19]['id'])
                            <input type="hidden" name="response[19]" value="{{$attrs[19]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[19]" criterea="19" id="respostaproblema2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[19]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema2"></span></label>
                        </div>

                        <p class="text-dark"><em>O problema é urgente, mal atendido, impraticável e/ou inevitável?</em></p>

                        <div class="form-group">
                            @if(@$attrs[20]['id'])
                            <input type="hidden" name="response[20]" value="{{$attrs[20]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[20]" criterea="20" id="respostaproblema3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[20]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema3"></span></label>
                        </div>

                        <p class="text-dark"><em>O problema é visível e/ou crítico?</em></p>

                        <div class="form-group">
                            @if(@$attrs[21]['id'])
                            <input type="hidden" name="response[21]" value="{{$attrs[21]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[21]" criterea="21" id="respostaproblema4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[21]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresproblema4"></span></label>
                        </div>

                           <hr class="mt-5 mb-4"> <!-- separador -->

                        <!-- Cliente-alvo -->
                        <p class="text-dark"><b>2.2. Cliente-alvo</b></p>

                        <!-- Quem é o cliente-alvo? -->
                        <p class="text-dark"><em>Quem é o cliente-alvo?</em></p>

                        <div class="form-group">
                            @if(@$attrs[22]['id'])
                            <input type="hidden" name="response[22]" value="{{$attrs[22]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[22]" criterea="22" id="respostaClienteAlvo1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[22]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo1"></span></label>
                        </div>

                        <!-- Quais são as necessidades e desejos deles? -->
                        <p class="text-dark"><em>Quais são as necessidades e desejos deles?</em></p>

                        <div class="form-group">
                            @if(@$attrs[23]['id'])
                            <input type="hidden" name="response[23]" value="{{$attrs[23]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[23]" criterea="23" id="respostaClienteAlvo2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[23]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo2"></span></label>
                        </div>

                        <!-- Quem é o cliente-alvo? -->
                        <p class="text-dark"><em>Qual é o tamanho do mercado?</em></p>

                        <div class="form-group">
                            @if(@$attrs[24]['id'])
                            <input type="hidden" name="response[24]" value="{{$attrs[24]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[24]" criterea="24" id="respostaClienteAlvo3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[24]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresClienteAlvo3"></span></label>
                        </div>

                            <hr class="mt-5 mb-4"> <!-- separador -->

                        <!-- 2.3. Proposta de valor  -->
                        <p class="text-dark"><b>2.3. Proposta de valor</b></p>

                        <!-- Quais ganhos os clientes experimentarão? -->
                        <p class="text-dark"><em>Quais ganhos os clientes experimentarão?</em></p>

                        <div class="form-group">
                            @if(@$attrs[25]['id'])
                            <input type="hidden" name="response[25]" value="{{$attrs[25]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[25]" criterea="25" id="respostaPropostaValor1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[25]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPropostaValor1"></span></label>
                        </div>
                        
                        <!-- Que dores os clientes experimentarão? -->
                        <p class="text-dark"><em>Que dores os clientes experimentarão?</em></p>

                        <div class="form-group">
                            @if(@$attrs[26]['id'])
                            <input type="hidden" name="response[26]" value="{{$attrs[26]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[26]" criterea="26" id="respostaPropostaValor2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[26]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPropostaValor2"></span></label>
                        </div>

                           <hr class="mt-5 mb-4"> <!-- separador -->
                      
                       <!-- 2.4. Concorrentes  -->
                       <p class="text-dark"><b>2.4. Concorrentes</b></p>

                       <!-- Quem são os concorrentes e seus clientes? -->
                       <p class="text-dark"><em>Quem são os concorrentes e seus clientes?</em></p>
                       
                       <div class="form-group">
                            @if(@$attrs[27]['id'])
                            <input type="hidden" name="response[27]]" value="{{$attrs[27]['id']}}">
                            @endif
                         <textarea class="form-control text_resp" name="resposta[27]" criterea="27" id="respostaConcorrentes1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[27]['response']}}</textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes1"></span></label>
                       </div>

                       <!-- Quais são os seus recursos mínimos viáveis? -->
                       <p class="text-dark"><em>Quais são os seus recursos mínimos viáveis?</em></p>
                       
                       <div class="form-group">
                            @if(@$attrs[28]['id'])
                            <input type="hidden" name="response[28]]" value="{{$attrs[28]['id']}}">
                            @endif
                         <textarea class="form-control text_resp" name="resposta[28]" criterea="28" id="respostaConcorrentes2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[28]['response']}}</textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes2"></span></label>
                       </div>

                       <!-- Por que esses recursos são valiosos e raros? -->
                       <p class="text-dark"><em>Por que esses recursos são valiosos e raros?</em></p>
                       
                       <div class="form-group">
                            @if(@$attrs[29]['id'])
                            <input type="hidden" name="response[29]]" value="{{$attrs[29]['id']}}">
                            @endif
                         <textarea class="form-control text_resp" name="resposta[29]" criterea="29" id="respostaConcorrentes3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[29]['response']}}</textarea>
                         <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresConcorrentes3"></span></label>
                       </div>

                        <!-- Qual é o seu protótipo? -->
                        <p class="text-dark"><em>Qual é o seu protótipo?</em></p>
                       
                        <div class="form-group">
                            @if(@$attrs[30]['id'])
                            <input type="hidden" name="response[30]" value="{{$attrs[30]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[30]" criterea="30" id="respostaConcorrentes4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[30]['response']}}</textarea>
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
                            @if(@$attrs[31]['id'])
                            <input type="hidden" name="response[31]" value="{{$attrs[31]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[31]" criterea="31" id="respostaEstrategiaMercado1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[31]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresEstrategiaMercado1"></span></label>
                          </div>

                          <!-- Qual é a nossa estratégia e preços? -->
                          <p class="text-dark"><em>Qual é a nossa estratégia e preços?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[32]['id'])
                            <input type="hidden" name="response[32]" value="{{$attrs[32]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[32]" criterea="32" id="respostaEstrategiaMercado2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[32]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresEstrategiaMercado2"></span></label>
                          </div>
                          
                             <hr class="mt-5 mb-4"> <!-- separador -->

                          <!-- 3.2. Distribuição -->
                          <p class="text-dark"><b>3.2. Distribuição</b></p>
                          
                          <!-- Quais são seus canais de distribuição? -->
                          <p class="text-dark"><em>Quais são seus canais de distribuição?</em>
                            </p>
                          
                          <div class="form-group">
                            @if(@$attrs[33]['id'])
                            <input type="hidden" name="response[33]" value="{{$attrs[33]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[33]" criterea="33" id="respostaDistribuicao1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[33]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresDistribuicao1"></span></label>
                          </div>

                          <!-- Quem são seus intermediários? -->
                          <p class="text-dark"><em>Quem são seus intermediários?</em>
                          </p>

                        <div class="form-group">
                            @if(@$attrs[34]['id'])
                            <input type="hidden" name="response[34]" value="{{$attrs[34]['id']}}">
                            @endif
                          <textarea class="form-control text_resp" name="resposta[34]" criterea="34" id="respostaDistribuicao2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[34]['response']}}</textarea>
                          <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresDistribuicao2"></span></label>
                        </div>

                          <hr class="mt-5 mb-4"> <!-- separador -->

                          <!-- 3.3. Promoção -->
                          <p class="text-dark"><b>3.3. Promoção</b></p>

                          <!-- Qual é o plano e o orçamento de publicidade? -->
                          <p class="text-dark"><em>Qual é o plano e o orçamento de publicidade?</em></p>

                          <div class="form-group">
                            @if(@$attrs[35]['id'])
                            <input type="hidden" name="response[35]" value="{{$attrs[35]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[35]" criterea="35" id="respostaPromocao1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[35]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao1"></span></label>
                          </div>

                          <!-- Qual é o plano de relações públicas? -->
                          <p class="text-dark"><em>Qual é o plano de relações públicas?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[36]['id'])
                            <input type="hidden" name="response[36]" value="{{$attrs[36]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[36]" criterea="36" id="respostaPromocao2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[36]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao2"></span></label>
                          </div>

                          <!-- Qual é o plano de vendas pessoais? -->
                          <p class="text-dark"><em>Qual é o plano de vendas pessoais?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[37]['id'])
                            <input type="hidden" name="response[37]" value="{{$attrs[37]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[37]" criterea="37" id="respostaPromocao3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[37]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao3"></span></label>
                          </div>

                          <!-- Qual é o plano e o orçamento de marketing direto? -->
                          <p class="text-dark"><em>Qual é o plano e o orçamento de marketing direto?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[38]['id'])
                            <input type="hidden" name="response[38]" value="{{$attrs[38]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[38]" criterea="38" id="respostaPromocao4" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[38]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresPromocao4"></span></label>
                          </div>

                          <!-- Qual é o plano e orçamento de promoção de vendas? -->
                          <p class="text-dark"><em>Qual é o plano e orçamento de promoção de vendas?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[39]['id'])
                            <input type="hidden" name="response[39]" value="{{$attrs[39]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[39]" criterea="39" id="respostaPromocao5" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[39]['response']}}</textarea>
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
                            @if(@$attrs[40]['id'])
                            <input type="hidden" name="response[40]" value="{{$attrs[40]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[40]" criterea="40" id="respostaReceita1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[40]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresReceita1"></span></label>
                          </div>

                          <!-- Que tipos de fluxos de receita usará? -->
                          <p class="text-dark"><em>Que tipos de fluxos de receita usará?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[41]['id'])
                            <input type="hidden" name="response[41]" value="{{$attrs[41]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[41]" criterea="41" id="respostaReceita2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[41]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea2"><span class="contagem" id="caracteresReceita2"></span></label>
                          </div>

                          <!-- Quais são suas receitas estimadas no primeiro e no segundo ano? -->
                          <p class="text-dark"><em>Quais são suas receitas estimadas no primeiro e no segundo ano?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[42]['id'])
                            <input type="hidden" name="response[42]" value="{{$attrs[42]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[42]" criterea="42" id="respostaReceita3" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[42]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea2"><span class="contagem" id="caracteresReceita3"></span></label>
                          </div>

                          <hr class="mt-5 mb-4"> <!-- separador -->
                          
                          <!-- 4.2. Modelo de custo -->
                          <p class="text-dark"><b>4.2. Modelo de custo</b></p>
                          
                          <!-- Quais são seus custos estimados detalhados no primeiro e no segundo ano? -->
                          <p class="text-dark"><em>Quais são seus custos estimados detalhados no primeiro e no segundo ano?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[43]['id'])
                            <input type="hidden" name="response[43]" value="{{$attrs[43]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[43]" criterea="43" id="respostaCusto1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[43]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresCusto1"></span></label>
                          </div>
  
                          <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 4.3. Modelo de vendas -->
                          <p class="text-dark"><b>4.3. Modelo de vendas</b></p>

                          <!-- Qual é o seu processo de venda? -->
                          <p class="text-dark"><em>Qual é o seu processo de venda?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[44]['id'])
                            <input type="hidden" name="response[44]" value="{{$attrs[44]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[44]" criterea="44" id="respostaVendas1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[44]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresVendas1"></span></label>
                          </div>
                          
                          <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 4.4. Modelo de financiamento -->
                          <p class="text-dark"><b>4.4. Modelo de financiamento</b></p>
                          
                          <!-- Quais são suas necessidades de financiamento? -->
                          <p class="text-dark"><em>Quais são suas necessidades de financiamento?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[45]['id'])
                            <input type="hidden" name="response[45]" value="{{$attrs[45]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[45]" criterea="45" id="respostaFinanciamento1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[45]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresFinanciamento1"></span></label>
                          </div>

                          <!-- Quem são suas fontes candidatas de financiamento? -->
                          <p class="text-dark"><em>Quem são suas fontes candidatas de financiamento?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[46]['id'])
                            <input type="hidden" name="response[46]" value="{{$attrs[46]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[46]" criterea="46" id="respostaFinanciamento2" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[46]['response']}}</textarea>
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
                            @if(@$attrs[47]['id'])
                            <input type="hidden" name="response[47]" value="{{$attrs[47]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[47]" criterea="47" id="respostaFundadores1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[47]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresFundadores1"></span></label>
                          </div>
                          
                            <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 3.2. Mentores -->
                          <p class="text-dark"><b>3.2. Mentores</b></p>

                          <!-- Quem são os mentores? -->
                          <p class="text-dark"><em>Quem são os mentores?</em></p>
                          
                          <div class="form-group">
                            @if(@$attrs[48]['id'])
                            <input type="hidden" name="response[48]" value="{{$attrs[48]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[48]" criterea="48" id="respostaMentores1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[48]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresMentores1"></span></label>
                          </div>
                          
                            <hr class="mt-5 mb-4"> <!-- separador --> 

                          <!-- 3.3. Parceiros -->
                          <p class="text-dark"><b>3.3. Parceiros</b></p>

                          <!-- Quem são os principais parceiros? -->
                          <p class="text-dark"><em>Quem são os principais parceiros?</em></p>

                          <div class="form-group">
                            @if(@$attrs[49]['id'])
                            <input type="hidden" name="response[49]" value="{{$attrs[49]['id']}}">
                            @endif
                            <textarea class="form-control text_resp" name="resposta[49]" criterea="49" id="respostaParceiros1" rows='8' placeholder='Máximo de caracteres 1.000.' maxlength="1000">{{@$attrs[49]['response']}}</textarea>
                            <label class="float-right" for="exampleFormControlTextarea1"><span class="contagem" id="caracteresParceiros1"></span></label>
                          </div>

                        </fieldset>
                    </div>

                    <!-- SESSAO 05 SLIDE E VÍDEO -->
                    <div class="tab-pane fade" id="nav-section10" role="tabpanel" aria-labelledby="nav-section10-tab">
                      <fieldset id="section10" class="mt-3" style="padding: 10px">

                        <div class="form-group">
                            @if(@$attrs[10]['id'])
                            <input type="hidden" name="response[10]" value="{{$attrs[10]['id']}}">
                            @endif
                          <label class="text-dark" for="linkVideo2"><b>Link do pitch vídeo</b></label>
                          <input type="text" class="form-control text_resp" id="linkVideo2" name="resposta[10]" criterea="10" onchange="fileLinkB()" aria-describedby="linkVideo2lHelp" placeholder="Ex.: https://www.youtube.com/watch?v=MQs_MGaXqhk" value="{{@$attrs[10]['response']}}" >
                          <div id="alertaLink2"></div>
                          <div class="alert alert-secondary mt-3" role="alert">
                              <p><strong>O pitch vídeo deverá ser estruturado em conformidade com as seções anteriores do formulário:</strong></p>
                              <p><strong> 1.</strong> Identificação do projeto: nome da startup; cidade-sede da startup; tendência tecnológica; setor de atuação da startup; tipo de solução.</p>
                              <p><strong> 2.</strong> Proposta de valor: problema; cliente-alvo; proposta de valor; concorrentes. </p>
                              <p><strong> 3.</strong> Estratégia de mercado: preço; distribuição; promoção.</p>
                              <p><strong> 4.</strong> Estratégia financeira: modelo de receita, modelo de custo, modelo de vendas ,modelo de financiamento.</p>
                              <p><strong> 5.</strong> Estratégia de time: fundadores; mentores; parceiros.</p>
                          </div>

                        </div>

                        <div class="form-group">
                          <label class="text-dark" for="slide"><b>Upload de slides de apresentação do projeto</b></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input imput_slideb text_resp" onchange="fileSlideB()" id="slide" name="files[slide]" accept="application/pdf">
                              <div id="slidemsn2" class="custom-file-label text-truncate" for="slide">Somente arquivo: PDF </div>
                              <div id="alertaSlideSize2"></div>
                          </div>
                        </div>

                      </fieldset> 
                    </div>

                      <!-- SESSAO 06 CERTIFICADOS 
                      <div class="tab-pane fade" id="nav-section11" role="tabpanel" aria-labelledby="nav-section11-tab">
                        <fieldset id="section11" class="mt-3" style="padding: 10px">

                        <div class="form-group">
                            <label class="text-dark" for="certificados"><b>Upload de documentos de certificados</b></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input imput_certificadosb" onchange="certificadoSlideB()" id="certificados" name="files[certificados][]" accept="image/gif, image/jpeg, image/png, application/pdf" multiple="true">
                                <label id="certificadosmsn2" class="custom-file-label text-truncate" for="certificados">Somente arquivos: JPEG, PNG, GIF ou PDF. </label>
                                <div id="alertaCertificadoSize2"></div>
                            </div>
                        </div>
  
                        </fieldset> 
                      </div>-->

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
                        <button type="submit" id="btnSub2" class="btn btn-lg btn-info btn-block input-check btnsub"> Salvar as Informações </button>
                        <div id="alertaSubmitS"></div>
                        <div id="alertaSubmitLinkS"></div>
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
