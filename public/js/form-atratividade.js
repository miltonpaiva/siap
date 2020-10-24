$(document).on("input", "#resposta1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta1]").val();
        $("textarea[name=resposta1]").val(comentario.substr(0, limite));
        $("#caracteres1").text("0 " + informativo);
    } else {
        $("#caracteres1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta2", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta2]").val();
        $("textarea[name=2]").val(comentario.substr(0, limite));
        $("#caracteres2").text("0 " + informativo);
    } else {
        $("#caracteres2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta3", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta3]").val();
        $("textarea[name=3]").val(comentario.substr(0, limite));
        $("#caracteres3").text("0 " + informativo);
    } else {
        $("#caracteres3").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta4", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta4]").val();
        $("textarea[name=4]").val(comentario.substr(0, limite));
        $("#caracteres4").text("0 " + informativo);
    } else {
        $("#caracteres4").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta5", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta5]").val();
        $("textarea[name=5]").val(comentario.substr(0, limite));
        $("#caracteres5").text("0 " + informativo);
    } else {
        $("#caracteres5").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta6", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta6]").val();
        $("textarea[name=6]").val(comentario.substr(0, limite));
        $("#caracteres6").text("0 " + informativo);
    } else {
        $("#caracteres6").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#resposta7", function () {
    
    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=resposta7]").val();
        $("textarea[name=7]").val(comentario.substr(0, limite));
        $("#caracteres7").text("0 " + informativo);
    } else {
        $("#caracteres7").text(caracteresRestantes + " " + informativo);
    }

});

function fileLink(){

    var valorLink = document.getElementById('linkVideo').value;
    var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    
    
    if(valorLink == " " || !valorLink.match(v)){
        document.getElementById("alertaLink").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Campo está vazio ou link está incorreto!</div>";
        return false;
    }else{
        document.getElementById("alertaLink").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Código do Link validado com sucesso! " +  RegExp.$1 + "</div>";
        return false;
    }

};

function fileSlide(){
   
    var imputs_file_comp = document.getElementsByClassName('imput_slide');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var v_size = (file_data.size < 199000000);
                    var v_type = (file_data.type == 'application/pdf');
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("slidemsn").innerText = file_data.name;
                    document.getElementById("alertaSlideSize").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso!</div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("slidemsn").text = file_data.name;
                        document.getElementById("alertaSlideSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 200MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("slidemsn").text = file_data.name;
                        return false;
                    }
                }
            }
        }
   
};

function certificadoSlide(){
   
    var imputs_file_comp = document.getElementsByClassName('imput_certificados');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var v_size = (file_data.size < 19900000);
                    var v_type = (file_data.type == 'image/gif, image/jpeg, image/png, application/pdf');
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("certificadosmsn").innerText = file_data.name;
                    document.getElementById("alertaCertificadoSize").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso! </div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("certificadosmsn").text = file_data.name;
                        document.getElementById("alertaCertificadoSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 100MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("certificadosmsn").text = file_data.name;
                        return false;
                    }
                }
            }
        }
   
};

// Desabilita o botão Submit 
document.querySelector('.input-check').disabled=true;

// Função abilita ao clicar no checkbox e Desabilita ao desmarcar o checkbox 
function checkBoxTermo(){

    var btnCheck = document.getElementById('customCheck1');
        
    if(btnCheck.checked){
        document.querySelector('.input-check').disabled=false;
        document.getElementById("alertaLink").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Este campo é de preenchimento obrigatório!</div>";
        return false;
    }else{
        document.querySelector('.input-check').disabled=true;
        document.getElementById("alertaLink").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Código do Link validado com sucesso! " +  RegExp.$1 + "</div>";
        return false;
    }

};