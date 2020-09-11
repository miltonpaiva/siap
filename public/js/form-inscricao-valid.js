$(function(){
    var atual_fs, next_fs, prev_fs;
    var exprEmeio = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var regex = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

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

    //Upload arquivo comprovacao
    $("#comprovacao").change(function(){
        var nomeArquivo = $(this).val();
        $("#uploadc").append("<span>" + nomeArquivo + "</span>");
    });

    var validado = false;

    //Formulario 6
    $('#btnNextsix').click(function(){

        var nomecompl = $("#nome-compl").val();
        var funcaopi = $("#funcaop").val();
        var datanasci = $("#datanasc").val();
        var rgs = $("#rg").val();
        var orgemaisso = $("#orgemaissor").val();
        var cpf = $("#cpf").val();
        var instensino = $("#instensino").val();
        var curso = $("#curso").val();
        var formacao = $("#formacao").val();
        var logradouro = $("#logradouro").val();
        var estad = $("#estadom").val();
        var cidad = $("#cidadem").val();
        var tel = $("#telcontato").val();
        var emailmenbro = $("#emailmenbro").val();
        var comprovacao = $("#comprovacao").val();
        
            if(nomecompl == "") {
                $("#nome-compl").removeClass("valido");
                $("#nome-compl").addClass("invalido");
                return false;
            }else{
                    $("#nome-compl").removeClass("invalido");
                    $("#nome-compl").addClass("valido");
                if(funcaopi == ""){
                    $("#funcaop").removeClass("valido");
                    $("#funcaop").addClass("invalido");
                    return false;
                }else{
                    $("#funcaop").removeClass("invalido");
                    $("#funcaop").addClass("valido");
                    if(datanasci == ""){
                        $("#datanasc").removeClass("validotwo");
                        $("#datanasc").addClass("invalidotwo");
                        return false;
                    }else{
                        $("#datanasc").removeClass("invalidotwo");
                        $("#datanasc").addClass("validotwo");
                    }if(rgs == "" || rgs.length <= 12){
                        $("#rg").removeClass("valido");
                        $("#rg").addClass("invalido");
                        return false;
                    }else{
                        $("#rg").removeClass("invalido");
                        $("#rg").addClass("valido");
                        if(orgemaisso == ""){
                            $("#orgemaissor").removeClass("valido");
                            $("#orgemaissor").addClass("invalido");
                            return false;
                        }else{
                            $("#orgemaissor").removeClass("invalido");
                            $("#orgemaissor").addClass("valido");
                            if(cpf == "" || !regex.test(cpf)){
                                $('.obrigatorio').show();
                                $("#cpf").removeClass("valido");
                                $("#cpf").addClass("invalido");
                                return false;
                            }else{
                                $('.obrigatorio').hide();
                                $("#cpf").removeClass("invalido");
                                $("#cpf").addClass("valido");
                                if(instensino == ""){
                                    $("#instensino").removeClass("valido");
                                    $("#instensino").addClass("invalido");
                                    return false;
                                }else{
                                    $("#instensino").removeClass("invalido");
                                    $("#instensino").addClass("valido");
                                    if(curso == ""){
                                        $("#curso").removeClass("valido");
                                        $("#curso").addClass("invalido");
                                        return false;
                                    }else{
                                        $("#curso").removeClass("invalido");
                                        $("#curso").addClass("valido");
                                        if(formacao == null){
                                            $("#formacao").removeClass("valido");
                                            $("#formacao").addClass("invalido");
                                            return false;
                                        }else{
                                            $("#formacao").removeClass("invalido");
                                            $("#formacao").addClass("valido");
                                            if(logradouro == ""){
                                                $("#logradouro").removeClass("valido");
                                                $("#logradouro").addClass("invalido");
                                                return false;
                                            }else{
                                                $("#logradouro").removeClass("invalido");
                                                $("#logradouro").addClass("valido");
                                                if(estad == ""){
                                                    $("#estadom").removeClass("valido");
                                                    $("#estadom").addClass("invalido");
                                                    return false;
                                                }else{
                                                    $("#estadom").removeClass("invalido");
                                                    $("#estadom").addClass("valido");
                                                    if(cidad == ""){
                                                        $("#cidadem").removeClass("valido");
                                                        $("#cidadem").addClass("invalido");
                                                        return false;
                                                    }else{
                                                        $("#cidadem").removeClass("invalido");
                                                        $("#cidadem").addClass("valido");
                                                        if(tel == ""){
                                                            $("#telcontato").removeClass("valido");
                                                            $("#telcontato").addClass("invalido");
                                                            return false;
                                                        }else{
                                                            $("#telcontato").removeClass("invalido");
                                                            $("#telcontato").addClass("valido");
                                                            if(emailmenbro == "" || !exprEmeio.test(emailmenbro)){
                                                                $("#emailmenbro").removeClass("valido");
                                                                $("#emailmenbro").addClass("invalido");
                                                                return false;
                                                            }else{
                                                                $("#emailmenbro").removeClass("invalido");
                                                                $("#emailmenbro").addClass("valido");
                                                                if(comprovacao == ""){
                                                                    $("#comprovacao").removeClass("validotwo");
                                                                    $("#comprovacao").addClass("invalidotwo");
                                                                    return false;
                                                                }else{
                                                                   var categoria = document.getElementById('categoria-projeto');
                                                                   if (categoria.value = 'criação') {

                                                                            $('#btnNextsix').click(function(){
                                                                                setTimeout(function(){ 
                                                                                    document.getElementById('btnNextseven').click();
                                                                                 }, 1000);

                                                                            });

                                                                            $('#btnNextseven').click(function(){

                                                                                atual_fs = $(this).parent();
                                                                                next_fs = $(this).parent().next();

                                                                                $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
                                                                                $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
                                                                                $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');

                                                                                atual_fs.hide(800);
                                                                                next_fs.show(800);

                                                                            });

                                                                   }
                                                                    console.log(comprovacao);
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

    //Upload video e PDF
    $("#customFilev").change(function(){
        var nomeVideo = $(this).val();
        $("#upvideo").append("<span>" + nomeVideo + "</span>");
    });

    $("#customFilep").change(function(){
        var nomepdf = $(this).val();
        $("#uppdf").append("<span>" + nomepdf + "</span>");
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

            //Formulario 7
            $('#btnNextseven').click(function(){


                var videoUpload = $("#customFilev").val();
                var pdfUpload = $("#customFilep").val();

                if(videoUpload == ""){
                    $("#customFilev").removeClass("validotwo");
                    $("#customFilev").addClass("invalidotwo");
                    return false;
                }else{
                    console.log(videoUpload);
                    if(pdfUpload == ""){
                        $("#customFilep").removeClass("validotwo");
                        $("#customFilep").addClass("invalidotwo");
                        return false;
                    }else{
                        console.log(pdfUpload);
                    }
                }

                atual_fs = $(this).parent();
                next_fs = $(this).parent().next();
                
                $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
                $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
                $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
                
                atual_fs.hide(800);
                next_fs.show(800);

            });


        }else{

            $('#btnNextsix').click(function(){
                setTimeout(function(){ 
                    document.getElementById('btnNextseven').click();
                 }, 1000);

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


        }
     }); 
     
});