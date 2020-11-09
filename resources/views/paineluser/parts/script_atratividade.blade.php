
<script>
    // SCRIPT PARA AÇÃO DE FADE DOS PARTICIPANTES
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
    // SCRIPT PARA SALVAR AS RESPOSTAS DE FORMA DINAMICA
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
                        var msg = "Não foi possivel concluir a ação ! \n";
                        msg += "recarregue a pagina e tente novamente";

                        alert(msg);
                    }else{
                        console.log('Salvo com sucesso ! :)');
                    }
                }else{
                    console.log('Não foi possivel salvar :(');
                    var msg = "Não foi possivel concluir a ação ! \n";
                    msg += "recarregue a pagina e tente novamente";

                    alert(msg);
                }

            }
        }

        xhttp.send();
    }
</script>

<script>
    // SCRIPT PARA INCLUSÃO DE NOVOS PARTICIPANTES
    var count = 0;

    $('#inclua_mais').click(function(e){
        e.preventDefault();
        count++;

        var html = '';
        html += '<button id="btn_fade_new_' + count + '" class="btn btn_fade btn-outline-secondary btn-lg btn-block mt-5 mb-5"> Formulário Novo Participante ' + count + '</button>';

        html += '    <div class="time_fade" id="time_fade_new_' + count + '" style="display: none;" >';

        html += '        <div class="form-group">';
        html += '            <label class="pergunta" for="nome-compl' + count + '">Nome Completo</label>';
        html += '            <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="nome-compl' + count + '" name="time_new[' + count + '][nome]" aria-describedby="nomeclpHelp">';
        html += '            <small id="nomeclpHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '        </div>';
        html += '        <div class="form-row">';
        html += '            <div class="col-md-7 mb-3">';
        html += '                <label class="pergunta" for="funcaop' + count + '">Função no Projeto (negócio, produto ou marketing)</label>';
        html += '                <select class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '"  id="funcaop' + count + '" name="time_new[' + count + '][funcao]" aria-describedby="funcaopHelp">';
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
        html += '              <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="rg' + count + '" name="time_new[' + count + '][rg]" maxlength="15" >';
        html += '              <small id="rgHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '            <div class="col-md-2 mb-3">';
        html += '              <label class="pergunta" for="orgemaissor' + count + '">Órgão Emissor</label>';
        html += '              <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="orgemaissor' + count + '" name="time_new[' + count + '][orgemaissor]" >';
        html += '              <small id="orgemaissorHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '            <div class="col-md-5 mb-3">';
        html += '                <label class="pergunta" for="cpf' + count + '">CPF</label>';
        html += '                <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="cpf' + count + '" name="time_new[' + count + '][cpf]" aria-describedby="cpfHelp" maxlength="15">';
        html += '                <small id="cpfHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatorio!</small>';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="form-row">';
        html += '            <div class="col-md-4 mb-3">';
        html += '                <label class="pergunta" for="instensino' + count + '">Instituição de Ensino</label>';
        html += '                <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="instensino' + count + '" name="time_new[' + count + '][instensino]" aria-describedby="instensinoHelp">';
        html += '                <small id="instensinoHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '            <div class="col-md-4 mb-3">';
        html += '                <label class="pergunta" for="curso' + count + '">Curso</label>';
        html += '                <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="curso' + count + '" name="time_new[' + count + '][curso]" aria-describedby="cursoHelp">';
        html += '                <small id="cursoHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '            <div class="col-md-4 mb-3">';
        html += '                <label class="pergunta" for="categoria' + count + '-projeto">Formação</label>';
        html += '                    <select class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '"  id="formacao' + count + '" name="time_new[' + count + '][formacao]" >';
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
        html += '              <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="logradouro' + count + '" name="time_new[' + count + '][logradouro]">';
        html += '              <small id="logradouroHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '            <div class="col-md-3 mb-3">';
        html += '                <label class="pergunta" for="estadom' + count + '">Estado</label>';
        html += '                <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="estadom' + count + '" name="time_new[' + count + '][estado]" >';
        html += '                <small id="estadomHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '              </div>';
        html += '            <div class="col-md-3 mb-3">';
        html += '              <label class="pergunta" for="cidadem' + count + '">Cidade</label>';
        html += '              <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="cidadem' + count + '" name="time_new[' + count + '][cidade]" >';
        html += '              <small id="cidademHelp' + count + '" class="form-text text-muted obrigatorio">Campo obrigatório!</small>';
        html += '            </div>';
        html += '        </div>';

        html += '        <div class="form-row">';
        html += '            <div class="col-md-6 mb-3">';
        html += '                <label class="pergunta" for="emailmenbro' + count + '">E-mail</label>';
        html += '                <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="emailmenbro' + count + '" name="time_new[' + count + '][emailmenbro]" >';
        html += '                 <small id="emailmenbroHelp' + count + '" class="form-text text-muted">Ex.: seuemail@seuemail.com!</small>';
        html += '            </div>';
        html += '            <div class="col-md-3 mb-3">';
        html += '                  <label class="pergunta" for="telcontato' + count + '">Telefone de contato</label>';
        html += '                  <input type="text" class="form-control obrigatorio" session="nav-section0" form_fade="time_fade_new_' + count + '" id="telcontato' + count + '" name="time_new[' + count + '][telcontato]" maxlength="14" >';
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
        html += '            </div><hr>';

        html += '</div> <button type="button" id="' + count + '" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5 remover">Remover Participante ' + count + '</button> </div>';

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

        var inputs = document.getElementsByClassName('obrigatorio');
        for(key in inputs){
            if (inputs[key].id) {
                var data = inputs[key];
                envForm(data.id)
            }
        }


    });

    $('form').on('click', '.remover', function(){
        var button_id = $(this).attr('id');
        count--;
        $('#btn_fade_new_' + button_id).remove();
        $('#time_fade_new_' + button_id).remove();
    });
</script>

<script>
    // SCRIPT PARA CARREGAR AS CIDADES
    $(document).ready(function(){
         carregar_json();
         function carregar_json(){
             var html = '';
             var city_selected = '{{$startup['city']}}';
             var state_selected = '{{$startup['state']}}';

             $.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/2e43be5f86eef95b915c1c804ccc86dc9790a50a/estados-cidades.json',
            function(data){
                 for(key in data['estados']){
                    if (data['estados'][key]['sigla'] == state_selected) {
                        data_cities = data['estados'][key]['cidades'];
                        console.log(data_cities);
                        for(key_c in data_cities){
                            data_c = data_cities[key_c];
                            var selected = '';
                            if (data_c.indexOf(city_selected) > -1) {selected = 'selected="true"'}
                            html += '<option value="' + data_c + '" ' + selected + ' >' + data_c + '</option>';
                        }
                    }

                 }

                 $('#startup_city').html(html);
             });
         }
    });
</script>

<script>
    // SCRIPT DE REMOÇÃO DE PARTICIPANTES
    $('form').on('click', '.remove_particpant', function(){
        var remove = confirm("Deseja remover o Participante ?");
        if (remove) {
            var button_id = $(this).attr('id');
            var route = '{{ route('remove.participant')}}';
            var url = route + '/' + button_id;
            sendResponse(url)
            $('#btn_fade_' + button_id).remove();
            $('#time_fade_' + button_id).remove();
        }
    });
</script>