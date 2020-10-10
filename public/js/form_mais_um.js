var count = 1;

$('#inclua_mais').click(function(){

    count++;

var html = '';
html += '<button id="btn_fade_' + count + '" class="btn btn_fade btn-outline-secondary btn-lg btn-block mt-5 mb-5"> Formulário Participante ' + count + '</button>';

html += '<div id="time_fade_' + count + '" style="display: none;" >';

html += '<label for="estagiotp'+ count +'">Dados dos membros:</label>';
html += '<div class="form-group">';
html += '<label for="nome-compl">Nome Completo</label>';
html += '<input type="text" class="form-control" id="nome-compl'+ count +'" name="time[' + count + '][nome]" aria-describedby="nomeclpHelp">';
html += '<small id="nomeclpHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-group">';

html += '<label for="funcaop'+ count +'">Função no Projeto (negócio, produto ou marketing)</label>';
html += '<select class="form-control" id="funcaop'+ count +'" name="time[' + count + '][funcao]" aria-describedby="funcaopHelp">';
html += '<option value="" disabled selected>Escolher uma das respostas abaixo</option>';
html += '<option value="negócio">Negócio</option>';
html += '<option value="Produto">Produto</option>';
html += '<option value="Marketing">Marketing</option>';
html += '</select>';


html += '<small id="funcaopHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-group">';
html += '<label for="datanasc'+ count +'">Data de Nascimento</label>';
html += '<input type="date" class="form-control" id="datanasc'+ count +'" name="time[' + count + '][datanasc]" aria-describedby="datanascHelp">';
html += '<small id="datanascHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-row">';
html += '<div class="col-md-8 mb-3">';
html += '<label for="rg'+ count +'">RG</label>';
html += '<input type="number" class="form-control" id="rg'+ count +'" name="time[' + count + '][rg]" >';
html += '<small id="rgHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="col-md-4 mb-3">';
html += '<label for="orgemaissor'+ count +'">Órgão Emissor</label>';
html += '<input type="text" class="form-control" id="orgemaissor'+ count +'" name="time[' + count + '][orgemaissor]" >';
html += '<small id="orgemaissorHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '</div>';
html += '<div class="form-group">';
html += '<label for="cpf'+ count +'">CPF</label>';
html += '<input type="text" class="form-control" id="cpf'+ count +'" name="time[' + count + '][cpf]" aria-describedby="cpfHelp'+ count +'">';
html += '<small id="cpfHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-group">';
html += '<label for="instensino'+ count +'">Instituição de Ensino</label>';
html += '<input type="text" class="form-control" id="instensino'+ count +'" name="time[' + count + '][instensino]" aria-describedby="instensinoHelp'+ count +'">';
html += '<small id="instensinoHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-group">';
html += '<label for="curso'+ count +'">Curso</label>';
html += '<input type="text" class="form-control" id="curso'+ count +'" name="time[' + count + '][curso]" aria-describedby="cursoHelp'+ count +'">';
html += '<small id="cursoHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-group">';
html += '<label for="categoria-projeto'+ count +'">Formação</label>';
html += '<select class="form-control" id="formacao'+ count +'" name="time[' + count + '][formacao]" >';
html += '<option value="" disabled selected>Escolher uma das respostas abaixo</option>';
html += '<option value="1">Nível Médio Regular Incompleto</option>';
html += '<option value="2">Nível Médio Regular Completo</option>';
html += '<option value="3">Nível Médio Profissionalizante Incompleto</option>';
html += '<option value="4">Nível Médio Profissionalizante Completo</option>';
html += '<option value="5">Superior Completo</option>';
html += '<option value="6">Superior Incompleto</option>';
html += '<option value="7">Nível Técnico Incompleto</option>';
html += '<option value="8">Nível Técnico Completo</option>';
html += '</select>';
html += '<small id="formacaoHel'+ count +'p" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="form-row">';
html += '<div class="col-md-6 mb-3">';
html += '<label for="Logradouro'+ count +'">Logradouro</label>';
html += '<input type="text" class="form-control" id="logradouro'+ count +'" name="time[' + count + '][logradouro]" >';
html += '<small id="LogradouroHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="col-md-3 mb-3">';
html += '<label for="estadom">Estado</label>';
html += '<input type="text" class="form-control" id="estadom'+ count +'" name="time[' + count + '][estadom]" >';
html += '<small id="estadomHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="col-md-3 mb-3">';
html += '<label for="cidadem'+ count +'">Cidade</label>';
html += '<input type="text" class="form-control" id="cidadem'+ count +'" name="time[' + count + '][cidadem]" > ';
html += '<small id="cidademHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '</div>';
html += '<div class="form-row">';

html += '<div class="col-md-6 mb-3">';
html += '<label for="emailmenbro'+ count +'">E-mail</label>';
html += '<input type="text" class="form-control" id="emailmenbro'+ count +'" name="time[' + count + '][emailmenbro]" >';
html += '<small id="emailmenbroHelp'+ count +'" class="form-text text-muted">Verifique novamente seu e-mail @, . !</small>';
html += '</div>';
html += '<div class="col-md-3 mb-3">';
html += '<label for="telcontato'+ count +'">Telefone de contato</label>';
html += '<input type="number" class="form-control" id="telcontato'+ count +'" name="time[' + count + '][telcontato]" >';
html += '<small id="telcontatoHelp'+ count +'" class="form-text text-muted">Campo obrigatório!</small>';
html += '</div>';
html += '<div class="col-md-3 mb-3">';
html += '<label class="pergunta" for="linkedin'+ count +'">Linked In</label>';
html += '<input type="text" class="form-control" id="linkedin'+ count +'" name="time['+ count +'][linkedin]" >';
html += '<small id="emailmenbroHelp'+ count +'" class="form-text text-muted">Ex.: https://www.linkedin.com/in/example/</small>';
html += '</div>';

html += '</div>';
html += '<div class="form-group">';
html += '<label for="comprovacao">Anexar Comprovação de Experiência e Conhecimento*</label>';
html += '<div class="custom-file">';
html += '<input type="file" class="custom-file-input imput_comprovacao " id="comprovacao'+ count +'" name="time[' + count + '][comprovacao]" accept="application/pdf" >';
html += '<label class="custom-file-label" id="uploadc'+ count +'" for="comprovacao'+ count +'">Comprovante</label>';
html += '<small id="compHelp" class="form-text text-muted" style="color: red !important;">PERMITIDO APENAS ARQUIVOS (.pdf) QUE TENHA NO MÁXIMO 200MB</small>';
html += '</div>';
html += '</div> <button type="button" id="' + count + '" class="btn btn-outline-secondary btn-lg btn-block mt-5 mb-5 remover">Remover</button> </div>';


	$('.dados_membros').append(html);


  $('#btn_fade_' + count).click(function(e){
  	e.preventDefault();
    $('#time_fade_' + count).fadeToggle("slow");
  });

	$('.btn_fade').click(function(e){
	  	e.preventDefault();
	});


    //Upload arquivo comprovacao
    $("#comprovacao" + count).change(function(){
        var nomeArquivo = $(this).val();
        $("#uploadc" + count).append("<span>" + nomeArquivo + "</span>");
    });


    $("#cpf" + count).mask("999.999.999-99");

    $('#btnNextsix').click(function(){

        var nomecompl = $("#nome-compl" + count).val();
        var funcaopi = $("#funcaop" + count).val();
        var datanasci = $("#datanasc" + count).val();
        var rgs = $("#rg" + count).val();
        var orgemaisso = $("#orgemaissor" + count).val();
        var cpf = $("#cpf" + count).val();
        var instensino = $("#instensino" + count).val();
        var curso = $("#curso" + count).val();
        var formacao = $("#formacao" + count).val();
        var logradouro = $("#logradouro" + count).val();
        var estad = $("#estadom" + count).val();
        var cidad = $("#cidadem" + count).val();
        var tel = $("#telcontato" + count).val();
        var emailmenbro = $("#emailmenbro" + count).val();
        var comprovacao = $("#comprovacao" + count).val();
        
            if(nomecompl == "") {
                document.getElementById('all_ok').value = 'nao'
                $("#nome-compl" + count).removeClass("valido");
                $("#nome-compl" + count).addClass("invalido");
                $("#nome-compl" + count).focus();
                return false;
            }else{
                document.getElementById('all_ok').value = 'nao'
                    $("#nome-compl" + count).removeClass("invalido");
                    $("#nome-compl" + count).addClass("valido");
                if(funcaopi == ""){
                    document.getElementById('all_ok').value = 'nao'
                    $("#funcaop" + count).removeClass("valido");
                    $("#funcaop" + count).addClass("invalido");
                    $("#funcaop" + count).focus();
                    return false;
                }else{
                    document.getElementById('all_ok').value = 'nao'
                    $("#funcaop" + count).removeClass("invalido");
                    $("#funcaop" + count).addClass("valido");
                    if(datanasci == ""){
                        document.getElementById('all_ok').value = 'nao'
                        $("#datanasc" + count).removeClass("validotwo");
                        $("#datanasc" + count).addClass("invalidotwo");
                        return false;
                    }else{
                        document.getElementById('all_ok').value = 'nao'
                        $("#datanasc" + count).removeClass("invalidotwo");
                        $("#datanasc" + count).addClass("validotwo");
                    }if(rgs == ""){
                        document.getElementById('all_ok').value = 'nao'
                        $("#rg" + count).removeClass("valido");
                        $("#rg" + count).addClass("invalido");
                        $("#rg" + count).focus();
                        return false;
                    }else{
                        document.getElementById('all_ok').value = 'nao'
                        $("#rg" + count).removeClass("invalido");
                        $("#rg" + count).addClass("valido");
                        if(orgemaisso == ""){
                            document.getElementById('all_ok').value = 'nao'
                            $("#orgemaissor" + count).removeClass("valido");
                            $("#orgemaissor" + count).addClass("invalido");
                            $("#orgemaissor" + count).focus();
                            return false;
                        }else{
                            document.getElementById('all_ok').value = 'nao'
                            $("#orgemaissor" + count).removeClass("invalido");
                            $("#orgemaissor" + count).addClass("valido");
                            if(cpf == "" ){
                                $('.obrigatorio').show();
                                document.getElementById('all_ok').value = 'nao'
                                $("#cpf" + count).removeClass("valido");
                                $("#cpf" + count).addClass("invalido");
                                $("#cpf" + count).focus();
                                return false;
                            }else{
                                $('.obrigatorio').hide();
                                document.getElementById('all_ok').value = 'nao'
                                $("#cpf" + count).removeClass("invalido");
                                $("#cpf" + count).addClass("valido");
                                if(instensino == ""){
                                    document.getElementById('all_ok').value = 'nao'
                                    $("#instensino" + count).removeClass("valido");
                                    $("#instensino" + count).addClass("invalido");
                                    $("#instensino" + count).focus();
                                    return false;
                                }else{
                                    document.getElementById('all_ok').value = 'nao'
                                    $("#instensino" + count).removeClass("invalido");
                                    $("#instensino" + count).addClass("valido");
                                    if(curso == ""){
                                        document.getElementById('all_ok').value = 'nao'
                                        $("#curso" + count).removeClass("valido");
                                        $("#curso" + count).addClass("invalido");
                                        $("#curso" + count).focus();
                                        return false;
                                    }else{
                                        document.getElementById('all_ok').value = 'nao'
                                        $("#curso" + count).removeClass("invalido");
                                        $("#curso" + count).addClass("valido");
                                        if(formacao == null){
                                            document.getElementById('all_ok').value = 'nao'
                                            $("#formacao" + count).removeClass("valido");
                                            $("#formacao" + count).addClass("invalido");
                                            $("#formacao" + count).focus();
                                            return false;
                                        }else{
                                            document.getElementById('all_ok').value = 'nao'
                                            $("#formacao" + count).removeClass("invalido");
                                            $("#formacao" + count).addClass("valido");
                                            if(logradouro == ""){
                                                document.getElementById('all_ok').value = 'nao'
                                                $("#logradouro" + count).removeClass("valido");
                                                $("#logradouro" + count).addClass("invalido");
                                                $("#logradouro" + count).focus();
                                                return false;
                                            }else{
                                                document.getElementById('all_ok').value = 'nao'
                                                $("#logradouro" + count).removeClass("invalido");
                                                $("#logradouro" + count).addClass("valido");
                                                if(estad == ""){
                                                    document.getElementById('all_ok').value = 'nao'
                                                    $("#estadom" + count).removeClass("valido");
                                                    $("#estadom" + count).addClass("invalido");
                                                    $("#estadom" + count).focus();
                                                    return false;
                                                }else{
                                                    document.getElementById('all_ok').value = 'nao'
                                                    $("#estadom" + count).removeClass("invalido");
                                                    $("#estadom" + count).addClass("valido");
                                                    if(cidad == ""){
                                                        document.getElementById('all_ok').value = 'nao'
                                                        $("#cidadem" + count).removeClass("valido");
                                                        $("#cidadem" + count).addClass("invalido");
                                                        $("#cidadem" + count).focus();
                                                        return false;
                                                    }else{
                                                        document.getElementById('all_ok').value = 'nao'
                                                        $("#cidadem" + count).removeClass("invalido");
                                                        $("#cidadem" + count).addClass("valido");
                                                        if(tel == ""){
                                                            document.getElementById('all_ok').value = 'nao'
                                                            $("#telcontato" + count).removeClass("valido");
                                                            $("#telcontato" + count).addClass("invalido");
                                                            $("#telcontato" + count).focus();
                                                            return false;
                                                        }else{
                                                            document.getElementById('all_ok').value = 'nao'
                                                            $("#telcontato" + count).removeClass("invalido");
                                                            $("#telcontato" + count).addClass("valido");
                                                            if(emailmenbro == ""){
                                                                document.getElementById('all_ok').value = 'nao'
                                                                $("#emailmenbro" + count).removeClass("valido");
                                                                $("#emailmenbro" + count).addClass("invalido");
                                                                $("#emailmenbro" + count).focus();
                                                                return false;
                                                            }else{
                                                                document.getElementById('all_ok').value = 'nao'
                                                                $("#emailmenbro" + count).removeClass("invalido");
                                                                $("#emailmenbro" + count).addClass("valido");
                                                                if(comprovacao == ""){
                                                                    document.getElementById('all_ok').value = 'nao'
                                                                    $("#comprovacao" + count).removeClass("validotwo");
                                                                    $("#comprovacao" + count).addClass("invalidotwo");
                                                                    $("#comprovacao" + count).focus();
                                                                    alert('Comprovação de algum participante Ausente !');
                                                                    return false;
                                                                }else{


                                                                    document.getElementById('all_ok').value = 'ok'


                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

    });


document.getElementById('all_ok').value = 'nao';


});

$('form').on('click', '.remover', function(){
    var button_id = $(this).attr('id');
    $('#grupo' + button_id +'').remove();
});