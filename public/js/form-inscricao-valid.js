$(function(){
    var atual_fs, next_fs, prev_fs;
   // var exprEmeio = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    $("#estado").focus();
    $('.obrigatorio').hide();

    $('#btnNextone').click(function(){
       
        var estado = $("#estado").val();
        var cidade = $("#cidade").val();
        var categoriaprojeto = $('#categoria-projeto').val();
        var tomouconhecimento = $('#tomou-conhecimento').val();
        
            if(estado == null){
                $("#estado").removeClass("valido");
                $("#estado").addClass("invalido");
                return false;
            }else{
                $("#estado").removeClass("invalido");
                $("#estado").addClass("valido");
               if(cidade == null){
                    $("#cidade").removeClass("valido");
                    $("#cidade").addClass("invalido");
                    return false;
                }else{
                    $("#cidade").removeClass("invalido");
                    $("#cidade").addClass("valido");
                    if(categoriaprojeto == null){
                        $("#categoria-projeto").removeClass("valido");
                        $("#categoria-projeto").addClass("invalido");
                        return false;
                    }else{
                        $("#categoria-projeto").removeClass("invalido");
                        $("#categoria-projeto").addClass("valido");
                        if(tomouconhecimento == null){
                            $("#tomou-conhecimento").removeClass("valido");
                            $("#tomou-conhecimento").addClass("invalido");
                            return false;
                        }else{
                            $("#tomou-conhecimento").removeClass("invalido");
                            $("#tomou-conhecimento").addClass("valido");
                          
                            $.ajax({
                                url: 'http://localhost:8080/proj-laravel/siap/public/teste.php',
                                method: 'POST',
                                dataType: 'json',
                                data: {est: estado, cid: cidade, catproj: categoriaprojeto, tconhecimento: tomouconhecimento}
                            }).done(function(result){
                                console.log(result);
                            });
                         
                            atual_fs = $(this).parent();
                            next_fs = $(this).parent().next();
                            
                            $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
                            $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
                            $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
                            
                            atual_fs.hide(800);
                            next_fs.show(800);

                            return false;

                        }

                    }
                }
            }
    });
    
    //Formulario 2
    $('#btnNexttwo').click(function(){

        var valor = "";
         //Executa Loop entre todas as Radio buttons com o name de valor
         $('input:radio[name=customRadio]').each(function() {
            //Verifica qual está selecionado
            if ($(this).is(':checked'))
                valor = ($(this).val());
         })
        console.log(valor);
      
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevtwo').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });
    
    //Formulario 3
    $('#btnNextthree').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevthree').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    //Formulario 4
    $('#btnNextfour').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevfour').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    //Formulario 5
    $('#btnNextfive').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevfive').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    //Formulario 6
    $('#btnNextsix').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevsix').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    //Formulario 7
    $('#btnNextseven').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPrevseven').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    //Formulario 8
    $('#btnNexteight').click(function(){
        
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        next_fs.show(800);

    });

    $('#btnPreveight').click(function(){

        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();
        
        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).removeClass('completo');
        $('.progresso li').eq($('fieldset').index(prev_fs)).addClass('ativo');
        
        atual_fs.hide(800);
        prev_fs.show(800);

    });

    var rv = $("input[name='customRadio1']:checked").val();
    console.log(rv);
   
    $("input:radio").on("click",function(){
   
        var inp = $(this);
   
        // desmarco tudo (menos o clicado) e removo a classe
        $("input:radio[name=customRadio]")
        .not(inp)
        .prop("checked", false)
        .removeClass("theone")

        // verifico se está checado e altero a classe
        inp
        .prop("checked", inp.is(":checked"))
        .toggleClass("theone");
    });

   $("#formulario button").click(function() {
        return false;
   });

    $("#categoria-projeto").change(function() {
        var tracaov = $(this).val();
        console.log(tracaov);
        if(tracaov == 'Tração'){
            $('#seven').show();

            /*$('#fieldgerarseven').append('<fieldset> <br> <h3 class="card-title mt-3">Inclusão de anexos do projeto</h3><div class="form-group"> <br> <label for="estagiotp">Vídeo:</label> <div class="custom-file"> <input type="file" class="custom-file-input" id="customFile"> <label class="custom-file-label" for="customFile">Vídeo</label> </div> </div> <div class="form-group"> <label for="estagiotp">PDF:</label> <div class="custom-file"> <input type="file" class="custom-file-input" id="customFile"> <label class="custom-file-label" for="customFile">PDF</label> </div> </div> <br> <button class="btn btn-lg btn-green prev acao"> Voltar </button>  <button class="btn btn-lg btn-green next acao"> Próxima Etapa </button> <br> </fieldset>');*/
        }
     }); 
     
});