var textareas = document.getElementsByClassName('text_resp');
for(key in textareas){
    if (textareas[key].id) {
        var data = textareas[key];
        countCaracteres(data.id),
        envForm(data.id)
    }
}
var inputs = document.getElementsByClassName('obrigatorio');
for(key in inputs){
    if (inputs[key].id) {
        var data = inputs[key];
        envForm(data.id)
    }
}

function countCaracteres(id) {
    $(document).on("keyup", "#" + id , function () {

        var limite = 1000;
        var informativo = "caracteres restantes.";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        var id_inf = id.replace('resposta', 'caracteres');
        if (caracteresRestantes <= 0) {
            var comentario = $("textarea[id=" + id + "]").val();
            $("textarea[id=" + id + "]").val(comentario.substr(0, limite));
            $("#" + id_inf).text("0 " + informativo);
        } else {
            $("#" + id_inf).text(caracteresRestantes + " " + informativo);
        }

    });
}


//::::::::::::::::::::: begin LINK 2 :::::::::::::::::::::::::::::::::::
function fileLinkB(){

    var valorLink = document.getElementById('linkVideo2').value;
    var vYoutube = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    var ourV = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    
    
        if(! (ourV.test(valorLink) || valorLink.match(vYoutube)) ){
            document.getElementById("alertaLink2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O campo está vazio ou link está incorreto!</div>";
            return false;
        }else{
            document.getElementById("alertaLink2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Link validado com sucesso!</div>";
            return false;
        }

};

function fileSlideB(){

    var imputs_file_comp = document.getElementsByClassName('imput_slideb');
 
    for(key in imputs_file_comp){
        if (imputs_file_comp[key].id) {
            if (imputs_file_comp[key].files.length > 0) {
                var file_data = imputs_file_comp[key].files[0];

                var v_size = (file_data.size < 200000000);
                var v_type = (file_data.type == 'application/pdf');
                //var participante = imputs_file_comp[key].id.replace('slide');

                document.getElementById("slidemsn2").innerText = file_data.name;
                document.getElementById("alertaSlideSize2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Arquivo selecionado com sucesso!</div>";

                if (!v_size) {
                    //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                    document.getElementById("slidemsn2").text = file_data.name;
                    document.getElementById("alertaSlideSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo é maior que 200MB!</div>";
                    return false;
                }
                if (!v_type) {
                    //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                    document.getElementById("slidemsn2").text = file_data.name;
                    document.getElementById("alertaSlideSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo não é (.pdf), tente outro!</div>";
                    return false;
                }
            }
        }
    }

};

/*
function certificadoSlideB(){

    var imputs_file_comp = document.getElementsByClassName('imput_certificadosb');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var types = ['image/gif', 'image/jpeg', 'image/png', 'application/pdf'];

                    var v_size = (file_data.size < 199000000);
                    var v_type = (types.indexOf(file_data.type) > -1);
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("certificadosmsn2").innerText = file_data.name;
                    document.getElementById("alertaCertificadoSize2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso! </div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("certificadosmsn2").text = file_data.name;
                        document.getElementById("alertaCertificadoSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 200MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("certificadosmsn2").text = file_data.name;
                        document.getElementById("alertaCertificadoSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>um dos arquivos não contem a extensão correta, tente outro!</div>";
                        return false;
                    }
                }
            }
        }

}; */

// Desabilita o botão Submit
document.querySelector('.input-check').disabled=true;

// Função abilita ao clicar no checkbox e Desabilita ao desmarcar o checkbox
function checkBoxTermoB(){

    var btnCheck = document.getElementById('customCheck1');
    if(btnCheck.checked){
        document.querySelector('.input-check').disabled=false;
        //document.getElementById("alertaLink").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Este campo é de preenchimento obrigatório!</div>";
        return false;
    }else{
        document.querySelector('.input-check').disabled=true;
        //document.getElementById("alertaLink").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Código do Link validado com sucesso! " +  RegExp.$1 + "</div>";
        return false;
    }

};


/*$("#btnSub").click(function() {
			
    var textareas = document.getElementsByClassName('text_resp').value;
   
           if(textareas = ""){

            document.getElementById("alertaSubmit").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O tamanho dos arquivos é maior que 200MB!</div>";
            return false;
             
           }else{
               return false;
           }
    // isso vai cancelar qualquer ação padrão do elemento escolhido	
   // e.preventDefault();
    
  }); */

  function envForm(id){
    $(document).on("click", ".btnsub", function () {

        var tValor =  $("textarea[id=" + id + "]").val();
        var sValor =  $("input[id=" + id + "]").val();

        if(tValor == ""){
            console.log(tValor);
            document.getElementById("alertaSubmitS").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Existem campos de TEXTO não preenchidos!</div>";
            $("textarea[id=" + id + "]").css('border-color','#c00');

            var input = document.getElementById(id);
            if (input.getAttribute('session')) {
                var id_session = input.getAttribute('session');
                var session = document.getElementById(id_session + '-tab');
                session.click();
                input.focus();
            }
            return false;
        }else{
            $("textarea[id=" + id + "]").css('border-color','green');
            document.getElementById("alertaSubmitS").innerHTML = "";
        }

        if(sValor == ""){
            console.log(sValor);
            document.getElementById("alertaSubmitLinkS").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O campo PITCH VÍDEO ou SLIDE APRESENTAÇÂO ou campos na SESSÃO DE REVISÃO não estão preenchidos!</div>";
            $("input[id=" + id + "]").css('border-color','#c00');

            var input = document.getElementById(id);
            if (input.getAttribute('session')) {
                var id_session = input.getAttribute('session');
                var session = document.getElementById(id_session + '-tab');
                session.click();
                input.focus();
            }
            if (input.getAttribute('form_fade')) {
                var id_form_fade = input.getAttribute('form_fade');
                console.log(id_form_fade)
                $("#" + id_form_fade).fadeIn("slow");
                input.focus();
                setTimeout(function(){
                    document.getElementById("alertaSubmitLinkS").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Ha campos de PARTICIAPNTES não preenchidos!</div>";
                }, 1000);
            }
            return false;
        }else{
            $("input[id=" + id + "]").css('border-color','green');
            // document.getElementById("alertaSubmitLinkS").innerHTML = '';
        }
        return true;
    });

   /* $(document).on("click", ".btnsub", function () {
        if(document.getElementById("slide").files.length == 0 ){
            console.log('erro!');
            document.getElementById("alertaSlideSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O campo é obrigatório!</div>";
            return false;
        }
    });*/
  }

 
 