$(function(){
    var atual_fs, next_fs, prev_fs;
    var exprEmeio = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var regex = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;
    $("#cpf").mask("999.999.999-99");

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
                $("#estado").focus();
                return false;
            }else{
                $("#estado").removeClass("invalido");
                $("#estado").addClass("valido");
               if(cidade == null){
                    $("#cidade").removeClass("valido");
                    $("#cidade").addClass("invalido");
                    $("#cidade").focus();
                    return false;
                }else{
                    $("#cidade").removeClass("invalido");
                    $("#cidade").addClass("valido");
                    if(categoriaprojeto == null){
                        $("#categoria-projeto").removeClass("valido");
                        $("#categoria-projeto").addClass("invalido");
                        $("#categoria-projeto").focus();
                        return false;
                    }else{
                        $("#categoria-projeto").removeClass("invalido");
                        $("#categoria-projeto").addClass("valido");
                        if(tomouconhecimento == null){
                            $("#tomou-conhecimento").removeClass("valido");
                            $("#tomou-conhecimento").addClass("invalido");
                            $("#tomou-conhecimento").focus();
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
        document.getElementById('uploadc').innerHTML = '';
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

        var imputs_file_comp = document.getElementsByClassName('imput_comprovacao');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var v_size = (file_data.size < 199000000);
                    var v_type = (file_data.type == 'application/pdf');
                    var participante = imputs_file_comp[key].id.replace('comprovacao', 'participante ')

                    if (!v_size) {
                        alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        return false;
                    }
                    if (!v_type) {
                        alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        return false;
                    }
                }
            }
        }


            if(nomecompl == "") {
                alert('ainda ha campos que estão invalidos, por gentileza verificar os formularios dos particpantes');
                document.getElementById('all_ok').value = 'nao'
                $("#nome-compl").removeClass("valido");
                $("#nome-compl").addClass("invalido");
                $("#nome-compl").focus();
                return false;
            }else{
                document.getElementById('all_ok').value = 'nao'
                    $("#nome-compl").removeClass("invalido");
                    $("#nome-compl").addClass("valido");
                if(funcaopi == ""){
                    document.getElementById('all_ok').value = 'nao'
                    $("#funcaop").removeClass("valido");
                    $("#funcaop").addClass("invalido");
                    $("#funcaop").focus();
                    return false;
                }else{
                    document.getElementById('all_ok').value = 'nao'
                    $("#funcaop").removeClass("invalido");
                    $("#funcaop").addClass("valido");
                    if(datanasci == ""){
                        document.getElementById('all_ok').value = 'nao'
                        $("#datanasc").removeClass("validotwo");
                        $("#datanasc").addClass("invalidotwo");
                        return false;
                    }else{
                        document.getElementById('all_ok').value = 'nao'
                        $("#datanasc").removeClass("invalidotwo");
                        $("#datanasc").addClass("validotwo");
                    }if(rgs == ""){
                        document.getElementById('all_ok').value = 'nao'
                        $("#rg").removeClass("valido");
                        $("#rg").addClass("invalido");
                        $("#rg").focus();
                        return false;
                    }else{
                        document.getElementById('all_ok').value = 'nao'
                        $("#rg").removeClass("invalido");
                        $("#rg").addClass("valido");
                        if(orgemaisso == ""){
                            document.getElementById('all_ok').value = 'nao'
                            $("#orgemaissor").removeClass("valido");
                            $("#orgemaissor").addClass("invalido");
                            $("#orgemaissor").focus();
                            return false;
                        }else{
                            document.getElementById('all_ok').value = 'nao'
                            $("#orgemaissor").removeClass("invalido");
                            $("#orgemaissor").addClass("valido");
                            if(cpf == "" || !regex.test(cpf)){
                                $('.obrigatorio').show();
                                document.getElementById('all_ok').value = 'nao'
                                $("#cpf").removeClass("valido");
                                $("#cpf").addClass("invalido");
                                $("#cpf").focus();
                                return false;
                            }else{
                                $('.obrigatorio').hide();
                                document.getElementById('all_ok').value = 'nao'
                                $("#cpf").removeClass("invalido");
                                $("#cpf").addClass("valido");
                                if(instensino == ""){
                                    document.getElementById('all_ok').value = 'nao'
                                    $("#instensino").removeClass("valido");
                                    $("#instensino").addClass("invalido");
                                    $("#instensino").focus();
                                    return false;
                                }else{
                                    document.getElementById('all_ok').value = 'nao'
                                    $("#instensino").removeClass("invalido");
                                    $("#instensino").addClass("valido");
                                    if(curso == ""){
                                        document.getElementById('all_ok').value = 'nao'
                                        $("#curso").removeClass("valido");
                                        $("#curso").addClass("invalido");
                                        $("#curso").focus();
                                        return false;
                                    }else{
                                        document.getElementById('all_ok').value = 'nao'
                                        $("#curso").removeClass("invalido");
                                        $("#curso").addClass("valido");
                                        if(formacao == null){
                                            document.getElementById('all_ok').value = 'nao'
                                            $("#formacao").removeClass("valido");
                                            $("#formacao").addClass("invalido");
                                            $("#formacao").focus();
                                            return false;
                                        }else{
                                            document.getElementById('all_ok').value = 'nao'
                                            $("#formacao").removeClass("invalido");
                                            $("#formacao").addClass("valido");
                                            if(logradouro == ""){
                                                document.getElementById('all_ok').value = 'nao'
                                                $("#logradouro").removeClass("valido");
                                                $("#logradouro").addClass("invalido");
                                                $("#logradouro").focus();
                                                return false;
                                            }else{
                                                document.getElementById('all_ok').value = 'nao'
                                                $("#logradouro").removeClass("invalido");
                                                $("#logradouro").addClass("valido");
                                                if(estad == ""){
                                                    document.getElementById('all_ok').value = 'nao'
                                                    $("#estadom").removeClass("valido");
                                                    $("#estadom").addClass("invalido");
                                                    $("#estadom").focus();
                                                    return false;
                                                }else{
                                                    document.getElementById('all_ok').value = 'nao'
                                                    $("#estadom").removeClass("invalido");
                                                    $("#estadom").addClass("valido");
                                                    if(cidad == ""){
                                                        document.getElementById('all_ok').value = 'nao'
                                                        $("#cidadem").removeClass("valido");
                                                        $("#cidadem").addClass("invalido");
                                                        $("#cidadem").focus();
                                                        return false;
                                                    }else{
                                                        document.getElementById('all_ok').value = 'nao'
                                                        $("#cidadem").removeClass("invalido");
                                                        $("#cidadem").addClass("valido");
                                                        if(tel == ""){
                                                            document.getElementById('all_ok').value = 'nao'
                                                            $("#telcontato").removeClass("valido");
                                                            $("#telcontato").addClass("invalido");
                                                            $("#telcontato").focus();
                                                            return false;
                                                        }else{
                                                            document.getElementById('all_ok').value = 'nao'
                                                            $("#telcontato").removeClass("invalido");
                                                            $("#telcontato").addClass("valido");
                                                            if(emailmenbro == "" || !exprEmeio.test(emailmenbro)){
                                                                document.getElementById('all_ok').value = 'nao'
                                                                $("#emailmenbro").removeClass("valido");
                                                                $("#emailmenbro").addClass("invalido");
                                                                $("#emailmenbro").focus();
                                                                return false;
                                                            }else{
                                                                document.getElementById('all_ok').value = 'nao'
                                                                $("#emailmenbro").removeClass("invalido");
                                                                $("#emailmenbro").addClass("valido");
                                                                if(comprovacao == ""){
                                                                    document.getElementById('all_ok').value = 'nao'
                                                                    $("#comprovacao").removeClass("validotwo");
                                                                    $("#comprovacao").addClass("invalidotwo");
                                                                    $("#comprovacao").focus();
                                                                    alert('Comprovação participante 1 Ausente !');
                                                                    return false;
                                                                }else{
                                                                    document.getElementById('all_ok').value = 'ok';
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

    setTimeout(function(){ 
            var all_ok = document.getElementById('all_ok').value;

            console.log(all_ok)

            if (all_ok == 'ok') {

                atual_fs = $('#btnNextsix').parent();
                next_fs = $('#btnNextsix').parent().next();

                $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
                $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
                $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');

                atual_fs.hide(800);
                next_fs.show(800);

                actionArquivos();
            }else{
                alert('ainda ha campos que estão invalidos, por gentileza verificar os formularios dos particpantes');
            }
         }, 1000);

    });



function actionArquivos() {

           var categoria = document.getElementById('categoria-projeto');
           console.log(categoria.value)
           if (categoria.value == 'criação') {

                    setTimeout(function(){ 
                        document.getElementById('btnNextseven').click();
                     }, 1000);

                    $('#btnNextseven').click(function(){

                        atual_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        $('.progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
                        $('.progresso li').eq($('fieldset').index(atual_fs)).addClass('completo');
                        $('.progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');

                        atual_fs.hide(800);
                        next_fs.show(800);

                    });

           }else{


                //Formulario 7
                $('#btnNextseven').click(function(){

                    var videoUpload = $("#customFilev").val();
                    var pdfUpload = $("#customFilep").val();

                    if(videoUpload == ""){
                        $("#customFilev").removeClass("validotwo");
                        $("#customFilev").addClass("invalidotwo");
                        alert('Não ha arquivo de video presente, adicione um para prosseguir');
                        return false;
                    }else{
                        console.log(videoUpload);
                        if(pdfUpload == ""){
                            $("#customFilep").removeClass("validotwo");
                            $("#customFilep").addClass("invalidotwo");
                            alert('Não ha arquivo de pdf presente, adicione um para prosseguir');
                            return false;
                        }else{
                            console.log(pdfUpload);
                            var imputs_file_trac = document.getElementsByClassName('imput_trac');
                            for(key in imputs_file_trac){
                                if (imputs_file_trac[key].id) {
                                    if (imputs_file_trac[key].files.length > 0) {
                                        var file_data = imputs_file_trac[key].files[0];

                                        if (imputs_file_trac[key].id == 'customFilep') {
                                            var v_type = (file_data.type == 'application/pdf');
                                            var tipo = 'pdf';
                                        }

                                        if (imputs_file_trac[key].id == 'customFilev') {
                                            var v_type = (file_data.type.split('/')[0] == 'video');
                                            var tipo = 'video';
                                        }

                                        var v_size = (file_data.size < 199000000);

                                        if (!v_size) {
                                            alert('o arquivo de [' + tipo + '] contem mais de 200MB, tente outro!');
                                            return false;
                                        }
                                        if (!v_type) {
                                            alert('o arquivo de [' + tipo + '] não contem a extensão correta, tente outro!');
                                            return false;
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



           }


}

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
        if(tracaov == 'tração'){
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


        }
     }); 
     
});