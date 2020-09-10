<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        if (strpos($url, 'herokuapp.com')):
    ?>
            <!-- PERMITIR CONTEUDO MISTO TEMPORAREAMENTE -->
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>
    <title>SIAP - Inscrição do Projetos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="body-bg">

    <section style="overflow: hidden">
        <div class="container">
            <div class="mt-4 mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-11 mx-auto">
                        <div class="card p-1">
                            <div class="card-body mx-auto">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <ul class="progresso">
                                            <li class="ativo completo one" rel="tooltip" title="Identificação do Projeto"></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li id="seven" style="display: none"></li>
                                            <li></li>                    
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form id="formulario" action="{{ route('startup.register')}}" method="POST" enctype="multipart/form-data" class="mx-auto">
                                    @method('POST')
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <fieldset>
                                        <input type="hidden" name="session[1][startup_id]" value="{{$startup_id}}">
                                        <h3 class="card-title mt-3">Identificação do Projeto</h3>
                                        <div class="form-group">
                                                <label class="pergunta" for="estado">Estado sede da startup</label>
                                                <select class="form-control" id="estado" name="session[1][estado]" >
                                                    <option

                                                        @if ($startup['state'] == '000000')
                                                            disabled
                                                        @endif
                                                        @if ($startup['state'] != '000000')
                                                            value="{{$startup['state']}}"
                                                        @endif

                                                        selected
                                                    > 
                                                    @if ($startup['state'] == '000000')
                                                        Escolher o município sede da equipe 
                                                    @endif
                                                    @if ($startup['state'] != '000000')
                                                        {{$startup['state']}}
                                                    @endif
                                                    </option>
                                                </select>
                                            <small id="estadoHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                        </div>
                                        <div class="form-group">
                                            <label class="pergunta" for="cidade">Município sede da startup</label>
                                                <select class="form-control" id="cidade" name="session[1][cidade]" >
                                                    <option

                                                        @if ($startup['city'] == '000000')
                                                            disabled
                                                        @endif
                                                        @if ($startup['city'] != '000000')
                                                            value="{{$startup['city']}}"
                                                        @endif

                                                        selected
                                                    > 
                                                    @if ($startup['city'] == '000000')
                                                        Escolher o município sede da equipe 
                                                    @endif
                                                    @if ($startup['city'] != '000000')
                                                        {{$startup['city']}}
                                                    @endif
                                                    </option>
                                                </select>
                                                <small id="cidadeHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">
                                            <label class="pergunta" for="categoria-projeto">Categoria de projeto</label>
                                                <select class="form-control" id="categoria-projeto" name="session[1][categoria]" >
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>
                                                <option 
                                                    value="criação"

                                                    @if ($startup['category'] == 'criação')
                                                        selected="true" 
                                                    @endif

                                                >Criação de Negócio</option>
                                                <option 
                                                    value="tração"

                                                    @if ($startup['category'] == 'tração')
                                                        selected="true" 
                                                    @endif

                                                >Tração de Negócio</option>
                                                </select>
                                                <small id="categoriaHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">

                                            <!-- LOOP DE MONTEGEM DAS OPÇÕES -->
                                            @foreach($questions[1] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                            <label class="pergunta" for="tomou-conhecimento">{{$question['name']}}</label>
                                            <select
                                                class="form-control" 
                                                id="tomou-conhecimento" 
                                                name="session[{{$question['session']}}][questions][{{$question['id']}}][value]"
                                            >
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>

                                                @foreach($question['options'] as $option)

                                                    <option 
                                                        value="{{$option['id']}}"

                                                        @if (@$responses[$question['id']]['option'] == $option['id'])
                                                          selected="true" 
                                                        @endif

                                                    >{{$option['name']}}</option>

                                                @endforeach

                                            </select>

                                            @endforeach

                                            <small id="tconhecimentoHelp" class="form-text text-muted">Campo obrigatório!</small>

                                         </div>
                                        <button id="btnNextone" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Forme 2 - Informações sobre o produto -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Informações sobre o produto</h3>

                                        @foreach($questions[2] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                        <label class="pergunta" for="question_{{$question['id']}}">{{$question['name']}}</label>
                                            <div class="form-group">

                                            @foreach($question['options'] as $option)

                                                <div class="custom-control custom-radio">
                                                    <input 
                                                        type="radio" 
                                                        id="{{$option['id']}}" 
                                                        name="session[{{$question['session']}}][questions][{{$question['id']}}][value]" 
                                                        class="custom-control-input" 
                                                        value="{{$option['id']}}" 

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration != 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] != $option['id'])
                                                          checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label" for="{{$option['id']}}">{{$option['name']}}</label>
                                                </div>

                                            @endforeach

                                            </div>

                                        @endforeach

                                        <button id="btnPrevtwo" class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNexttwo" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                     <!-- Forme 3 - Informações sobre o mercado -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Informações sobre o mercado</h3>

                                        @foreach($questions[3] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                        <label class="pergunta" for="question_{{$question['id']}}">{{$question['name']}}</label>
                                            <div class="form-group">

                                            @foreach($question['options'] as $option)

                                                <div class="custom-control custom-radio">
                                                    <input 
                                                        type="radio" 
                                                        id="{{$option['id']}}" 
                                                        name="session[{{$question['session']}}][questions][{{$question['id']}}][value]" 
                                                        class="custom-control-input" 
                                                        value="{{$option['id']}}" 

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration != 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] != $option['id'])
                                                          checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label" for="{{$option['id']}}">{{$option['name']}}</label>
                                                </div>

                                            @endforeach

                                            </div>

                                        @endforeach

                                        <button id="btnPrevthree" class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNextthree" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 4 - Informações sobre Finanças -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Informações sobre finanças</h3>

                                        @foreach($questions[4] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                        <label class="pergunta" for="question_{{$question['id']}}">{{$question['name']}}</label>
                                            <div class="form-group">

                                            @foreach($question['options'] as $option)

                                                <div class="custom-control custom-radio">
                                                    <input 
                                                        type="radio" 
                                                        id="{{$option['id']}}" 
                                                        name="session[{{$question['session']}}][questions][{{$question['id']}}][value]" 
                                                        class="custom-control-input" 
                                                        value="{{$option['id']}}" 


                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration != 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] != $option['id'])
                                                          checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label" for="{{$option['id']}}">{{$option['name']}}</label>
                                                </div>

                                            @endforeach

                                            </div>

                                        @endforeach

                                        <button id="btnPrevfour"  class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNextfour" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 5 - Informações sobre modelo de negócio -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Informações sobre modelo de negócio</h3>

                                        @foreach($questions[5] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                        <label class="pergunta" for="question_{{$question['id']}}">{{$question['name']}}</label>
                                            <div class="form-group">

                                            @foreach($question['options'] as $option)

                                                <div class="custom-control custom-radio">
                                                    <input 
                                                        type="radio" 
                                                        id="{{$option['id']}}" 
                                                        name="session[{{$question['session']}}][questions][{{$question['id']}}][value]" 
                                                        class="custom-control-input" 
                                                        value="{{$option['id']}}" 


                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration != 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] != $option['id'])
                                                          checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label" for="{{$option['id']}}">{{$option['name']}}</label>
                                                </div>

                                            @endforeach

                                            </div>

                                        @endforeach

                                        <button id="btnPrevfive" class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNextfive" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 6 - Identificação do time do projeto -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Identificação do time do projeto</h3>

                                        <div class="form-group dados_membros">

                                            <label class="pergunta" for="estagiotp">Dados dos membros:</label>

                                            @foreach($questions[6] as $question)

                                            @if (@$responses[$question['id']])
                                                <input 
                                                    type="hidden" 
                                                    name="session[{{$question['session']}}][questions][{{$question['id']}}][response]"
                                                    value="{{$responses[$question['id']]['response']}}" 
                                                >
                                            @endif

                                            <label class="pergunta" for="question_{{$question['id']}}">{{$question['name']}}</label>
                                                <div class="form-group">

                                                @foreach($question['options'] as $option)

                                                    <div class="custom-control custom-radio">
                                                        <input 
                                                            type="radio" 
                                                            id="{{$option['id']}}" 
                                                            name="session[{{$question['session']}}][questions][{{$question['id']}}][value]" 
                                                            class="custom-control-input" 
                                                            value="{{$option['id']}}" 


                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration != 1 && @$responses[$question['id']]['option'] == $option['id'])
                                                          checked
                                                        @endif

                                                        @if ($loop->iteration == 1 && @$responses[$question['id']]['option'] != $option['id'])
                                                          checked
                                                        @endif
                                                        >
                                                        <label class="custom-control-label" for="{{$option['id']}}">{{$option['name']}}</label>
                                                    </div>

                                                @endforeach

                                                </div>

                                            @endforeach

                                            <div class="form-group">
                                                <label class="pergunta" for="nome-compl">Nome Completo</label>
                                                <input type="text" class="form-control" id="nome-compl" name="time[1][nome]" aria-describedby="nomeclpHelp">
                                                <small id="nomeclpHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-7 mb-3">
                                                    <label class="pergunta" for="funcaop">Função no Projeto (negócio, produto ou marketing)</label>
                                                    <input type="text" class="form-control" id="funcaop" name="time[1][funcao]" aria-describedby="funcaopHelp">
                                                    <small id="funcaopHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label class="pergunta" for="datanasc">Data de Nascimento</label>
                                                    <input type="date" class="form-control" id="datanasc" name="time[1][datanasc]" aria-describedby="datanascHelp">
                                                    <small id="datanascHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-5 mb-3">
                                                  <label class="pergunta" for="rg">RG</label>
                                                  <input type="text" class="form-control" id="rg" name="time[1][rg]" maxlength="15" >
                                                  <small id="rgHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                  <label class="pergunta" for="orgemaissor">Órgão Emissor</label>
                                                  <input type="text" class="form-control" id="orgemaissor" name="time[1][orgemaissor]" >
                                                  <small id="orgemaissorHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <label class="pergunta" for="cpf">CPF</label>
                                                    <input type="text" class="form-control" id="cpf" name="time[1][cpf]" aria-describedby="cpfHelp" maxlength="15">
                                                    <small id="cpfHelp" class="form-text text-muted obrigatorio">CPF inválido!</small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="pergunta" for="instensino">Instituição de Ensino</label>
                                                    <input type="text" class="form-control" id="instensino" name="time[1][instensino]" aria-describedby="instensinoHelp">
                                                    <small id="instensinoHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="pergunta" for="curso">Curso</label>
                                                    <input type="text" class="form-control" id="curso" name="time[1][curso]" aria-describedby="cursoHelp">
                                                    <small id="cursoHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="pergunta" for="categoria-projeto">Formação</label>
                                                        <select class="form-control" id="formacao" name="time[1][formacao]" >
                                                        <option value="" disabled selected>Escolher uma das respostas abaixo</option>
                                                        <option value="1">Nível Médio Regular Incompleto</option>
                                                        <option value="2">Nível Médio Regular Completo</option>
                                                        <option value="3">Nível Médio Profissionalizante Incompleto</option>
                                                        <option value="4">Nível Médio Profissionalizante Completo</option>
                                                        <option value="5">Superior Completo</option>
                                                        <option value="6">Superior Incompleto</option>
                                                        <option value="7">Nível Técnico Incompleto</option>
                                                        <option value="8">Nível Técnico Completo</option>
                                                        </select>
                                                        <small id="formacaoHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                            </div>

                                             <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                  <label class="pergunta" for="logradouro">Logradouro</label>
                                                  <input type="text" class="form-control" id="logradouro" name="time[1][logradouro]">
                                                  <small id="logradouroHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label class="pergunta" for="estadom">Estado</label>
                                                    <input type="text" class="form-control" id="estadom" name="time[1][estado]" >
                                                    <small id="estadomHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                  </div>
                                                <div class="col-md-3 mb-3">
                                                  <label class="pergunta" for="cidadem">Cidade</label>
                                                  <input type="text" class="form-control" id="cidadem" name="time[1][cidade]" >
                                                  <small id="cidademHelp" class="form-text text-muted obrigatorio">Campo obrigatório!</small>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                  <label class="pergunta" for="telcontato">Telefone de contato</label>
                                                  <input type="text" class="form-control" id="telcontato" name="time[1][telcontato]" maxlength="14" >
                                                  <small id="telcontatoHelp" class="form-text text-muted">E.: 85 999990000</small>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="pergunta" for="emailmenbro">E-mail</label>
                                                    <input type="text" class="form-control" id="emailmenbro" name="time[1][emailmenbro]" >
                                                     <small id="emailmenbroHelp" class="form-text text-muted">Ex.: seuemail@seuemail.com!</small>
                                                  </div>
                                            </div>

                                            <div class="form-group mb-5">
                                                <label class="pergunta" for="comprovacao">Anexar Comprovação de Experiência e Conhecimento*</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="comprovacao" name="time[1][comprovacao]" >
                                                    <label id="uploadc" class="custom-file-label" for="comprovacao"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <button id="inclua_mais" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5">Inclua + 1</button>

                                        <button id="btnPrevsix" class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNextsix" class="btn btn-lg btn-green acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 7 - Inclusão de anexos do projeto -->

                                    <fieldset>

                                            <h3 class="card-title mt-3">Inclusão de anexos do projeto</h3>

                                            <div class="form-group">
                                                <label class="pergunta" for="estagiotp">Vídeo:</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFilev" name="session[7][anexos][video]" >
                                                    <label id="upvideo" class="custom-file-label" for="customFile">Vídeo</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="pergunta" for="estagiotp">PDF:</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFilep" name="session[7][anexos][pdf]" >
                                                    <label id="uppdf" class="custom-file-label" for="customFile">PDF</label>
                                                </div>
                                            </div>

                                            <button id="btnPrevseven" class="btn btn-lg btn-green acao"> Voltar </button> 
                                            <button id="btnNextseven" class="btn btn-lg btn-green acao"> Próxima Etapa </button>

                                    </fieldset>

                                    <!-- Form 8 - Confirmação do termo de compromisso -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Confirmação do termo de compromisso</h3>

                                        <div class="form-group">
                                            <label class="pergunta" for="termoTextarea">Leia o termo</label>
                                            <textarea class="form-control mt-3" id="termoTextarea" rows="6">
                                                O preenchimento da Seção 8 do formulário eletrônico será obrigatório. Os candidatos
                                                atestarão que leram e compreenderam o regulamento do Corredores Digitais, aceitando-o
                                                integralmente. Além disso, os candidatos declararão para os devidos fins de direito, sob as
                                                penas da lei, que as informações prestadas para a inscrição na edição 2020 do Programa
                                                Corredores Digitais são verdadeiras e autênticas. E, finalmente, os candidatos permitirão
                                                que a SECITECE compartilhe os dados referentes aos seus projetos com parceiros e
                                                avaliadores.
                                            </textarea>
                                            <div class="custom-control custom-checkbox mt-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" value="Eu li, aceito e concordo com os termos.">
                                                <label class="custom-control-label" for="customCheck1">Eu li, aceito e concordo com os termos.</label>
                                              </div>
                                            </div>


                                        <button id="btnPreveight" class="btn btn-lg btn-green acao"> Voltar </button>
                                        <button id="btnNexteight" class="btn btn-lg btn-green acao" onclick="document.getElementById('formulario').submit();" > Enviar </button>
                                    </fieldset>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/form-inscricao-valid.js') }}"></script>
<script src="{{ asset('js/form_mais_um.js') }}"></script>
<script>
    $(document).ready(function(){
         carregar_json('estado');
         function carregar_json(id, cidade_id){
             var html = '';
             var state_selected = '{{$startup['state']}}';

             $.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/2e43be5f86eef95b915c1c804ccc86dc9790a50a/estados-cidades.json',
            function(data){
                 console.log(data);
                 if(id == 'estado' && cidade_id == null){
                    html += '<option disabled selected> Escolher o estado sede da equipe </option>'; 
                     for(var i = 0; i < data.estados.length; i++){
                        if (state_selected == data.estados[i].sigla) {
                         html += '<option value='+ data.estados[i].sigla +' selected>'+ data.estados[i].nome +'</option>'
                        }else{
                         html += '<option value='+ data.estados[i].sigla +'>'+ data.estados[i].nome +'</option>'
                        }
                     }
                 }else{
                    html += '<option disabled selected> Escolher o município sede da equipe </option>'; 
                    for(var i = 0; i < data.estados.length; i++){
                        if(data.estados[i].sigla == cidade_id){
                            for(var j = 0; j < data.estados[i].cidades.length; j++){
                                html += '<option value='+ data.estados[i].cidades[j] +'>' + data.estados[i].cidades[j] + '</option>';
                            }
                        }
                     }
                 }

                 $('#'+id).html(html);
             });
         }

         $(document).on('change', '#estado', function(){
             var cidade_id = $(this).val();
             console.log(cidade_id);
             if(cidade_id != null){
                carregar_json('cidade', cidade_id);
                console.log(cidade_id);
             }
         });
    });
   /* $(function () {
        $("[rel='tooltip']").tooltip();
        
    });
    $("input:radio").on("click",function(){
   
            var inp = $(this);

            // desmarco tudo (menos o clicado) e removo a classe
            $("input:radio")
            .not(inp)
            .prop("checked", false)
            .addClass("invalid-feedback")

            // verifico se está checado e altero a classe
            inp
            .prop("checked", inp.is(":checked"))
            .toggleClass("theone");
    });
    */
    

    var btn_enviar = document.getElementById('btnNexteight');
    var form       = document.getElementById('formulario');
</script>
</body>
</html>