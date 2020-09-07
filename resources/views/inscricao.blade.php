<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP - Inscrição do Projetos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="body-bg">

    <section style="overflow: hidden">
        <div class="container">
            <div class="mt-4 mb-3">
                <div class="card w-90 p-1 mx-auto">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-12">
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4"></div>
                                    <div class="col-sm-12 col-md-4">
                                        <ul class="progresso">
                                            <li class="ativo completo" rel="tooltip" title="Identificação do Projeto"></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>                    
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-4"></div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form id="formulario" class="mx-auto">

                                    <fieldset>
                                        <h3 class="card-title mt-3">Identificação do Projeto</h3>
                                        <div class="form-group">
                                                <label for="estado">Estado sede da startup</label>
                                                <select class="form-control" id="estado"></select>
                                            <small id="estadoHelp" class="form-text text-muted">Campo obrigatório!</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="cidade">Município sede da startup</label>
                                                <select class="form-control" id="cidade"></select>
                                                <small id="cidadeHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">
                                            <label for="categoria-projeto">Categoria de projeto</label>
                                            <select class="form-control" id="categoria-projeto">
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>
                                                <option value="Criação">Criação de Negócio</option>
                                                <option value="Tração">Tração de Negócio</option>
                                            </select>
                                            <small id="categoriaHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>
                                         <div class="form-group">

                                            <!-- LOOP DE MONTEGEM DAS OPÇÕES -->
                                            @foreach($questions[1] as $question)

                                            <label for="question_{{$question['id']}}">{{$question['name']}}</label>
                                            <select class="form-control" id="question_{{$question['id']}}" name="session[{{$question['session']}}]question[{{$question['id']}}]" >
                                                <option value="" disabled selected>Escolher uma das respostas abaixo</option>

                                                 @foreach($question['options'] as $option)

                                                    <option value="{{$option['id']}}">{{$option['name']}}</option>

                                                 @endforeach

                                            </select>

                                            @endforeach

                                            <small id="tconhecimentoHelp" class="form-text text-muted">Campo obrigatório!</small>
                                         </div>


                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Forme 2 - Informações sobre o produto -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre o produto</h3>

                                        @foreach($questions[2] as $question)

                                        <div class="form-group">

                                             <label>{{$question['name']}}</label>

                                             @foreach($question['options'] as $option)

                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input question_{{$question['id']}}" 
                                                        type="checkbox" 
                                                        name="session[{{$question['session']}}]question[{{$question['id']}}]option[{{$option['id']}}]"
                                                        id="option_{{$question['id']}}_{{$option['id']}}" 
                                                        value="{{$option['id']}}"
                                                    >
                                                    <label class="form-check-label" for="option_{{$question['id']}}_{{$option['id']}}">
                                                            {{$option['name']}}
                                                    </label>
                                                </div>

                                             @endforeach

                                        </div>

                                        @endforeach

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                         <!-- Forme 3 - Informações sobre o mercado -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre o mercado</h3>

                                        @foreach($questions[3] as $question)

                                        <div class="form-group">

                                             <label>{{$question['name']}}</label>

                                             @foreach($question['options'] as $option)

                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input question_{{$question['id']}}" 
                                                        type="checkbox" 
                                                        name="session[{{$question['session']}}]question[{{$question['id']}}]option[{{$option['id']}}]"
                                                        id="option_{{$question['id']}}_{{$option['id']}}" 
                                                        value="{{$option['id']}}"
                                                    >
                                                    <label class="form-check-label" for="option_{{$question['id']}}_{{$option['id']}}">
                                                            {{$option['name']}}
                                                    </label>
                                                </div>

                                             @endforeach

                                        </div>

                                        @endforeach

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 4 - Informações sobre Finanças -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre finanças</h3>

                                        @foreach($questions[4] as $question)

                                        <div class="form-group">

                                             <label>{{$question['name']}}</label>

                                             @foreach($question['options'] as $option)

                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input question_{{$question['id']}}" 
                                                        type="checkbox" 
                                                        name="session[{{$question['session']}}]question[{{$question['id']}}]option[{{$option['id']}}]"
                                                        id="option_{{$question['id']}}_{{$option['id']}}" 
                                                        value="{{$option['id']}}"
                                                    >
                                                    <label class="form-check-label" for="option_{{$question['id']}}_{{$option['id']}}">
                                                            {{$option['name']}}
                                                    </label>
                                                </div>

                                             @endforeach

                                        </div>

                                        @endforeach                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>

                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 5 - Informações sobre modelo de negócio -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Informações sobre modelo de negócio</h3>

                                        @foreach($questions[5] as $question)

                                        <div class="form-group">

                                             <label>{{$question['name']}}</label>

                                             @foreach($question['options'] as $option)

                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input question_{{$question['id']}}" 
                                                        type="checkbox" 
                                                        name="session[{{$question['session']}}]question[{{$question['id']}}]option[{{$option['id']}}]"
                                                        id="option_{{$question['id']}}_{{$option['id']}}" 
                                                        value="{{$option['id']}}"
                                                    >
                                                    <label class="form-check-label" for="option_{{$question['id']}}_{{$option['id']}}">
                                                            {{$option['name']}}
                                                    </label>
                                                </div>

                                             @endforeach

                                        </div>

                                        @endforeach

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 6 - Identificação do time do projeto -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Identificação do time do projeto</h3>

                                        @foreach($questions[6] as $question)

                                        <div class="form-group">

                                             <label>{{$question['name']}}</label>

                                             @foreach($question['options'] as $option)

                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input question_{{$question['id']}}" 
                                                        type="checkbox" 
                                                        name="session[{{$question['session']}}]question[{{$question['id']}}]option[{{$option['id']}}]"
                                                        id="option_{{$question['id']}}_{{$option['id']}}" 
                                                        value="{{$option['id']}}"
                                                    >
                                                    <label class="form-check-label" for="option_{{$question['id']}}_{{$option['id']}}">
                                                            {{$option['name']}}
                                                    </label>
                                                </div>

                                             @endforeach

                                        </div>

                                        @endforeach

                                        <div class="form-group">
                                            <label for="estagiotp">Dados dos membros:</label>
                                            <button type="button" class="btn btn-outline-secondary btn-lg btn-block inclua_mais mt-5 mb-5">Inclua + 1</button>
                                        </div>


                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 7 - Inclusão de anexos do projeto -->

                                    <fieldset>
                                        <h3 class="card-title mt-3">Inclusão de anexos do projeto</h3>

                                        <div class="form-group">
                                            <label for="estagiotp">Vídeo:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Vídeo</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="estagiotp">PDF:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">PDF</label>
                                            </div>
                                        </div>
                                        
                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green next acao"> Próxima Etapa </button>
                                    </fieldset>

                                    <!-- Form 8 - Confirmação do termo de compromisso -->

                                    <fieldset >
                                        <h3 class="card-title mt-3">Confirmação do termo de compromisso</h3>
                                        

                                        <button id="btn-cadastro" class="btn btn-lg btn-green prev acao"> Voltar </button>
                                        <button id="btn-cadastro" class="btn btn-lg btn-green enviar acao"> Enviar </button>
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
<script>
    $(document).ready(function(){
         carregar_json('estado');
         function carregar_json(id, cidade_id){
             var html = '';

             $.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/2e43be5f86eef95b915c1c804ccc86dc9790a50a/estados-cidades.json',
            function(data){
                 console.log(data);
                 if(id == 'estado' && cidade_id == null){
                    html += '<option disabled selected> Escolher o estado sede da equipe </option>'; 
                     for(var i = 0; i < data.estados.length; i++){
                         html += '<option value='+ data.estados[i].sigla +'>'+ data.estados[i].nome +'</option>'
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

         $("input:checkbox").on("click",function(){
   
            var inp = $(this);

            // desmarco tudo (menos o clicado) e removo a classe
            $("input:checkbox")
            .not(inp)
            .prop("checked", false)
            .removeClass("theone")

            // verifico se está checado e altero a classe
            inp
            .prop("checked", inp.is(":checked"))
            .toggleClass("theone");
        });
    });
   /* $(function () {
        $("[rel='tooltip']").tooltip();
    });*/
</script>
</body>
</html>