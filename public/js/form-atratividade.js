var textareas = document.getElementsByClassName('text_resp');
for(key in textareas){
    if (textareas[key].id) {
        var data = textareas[key];
        countCaracteres(data.id)
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
                        document.getElementById("alertaSlideSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo não é (.pdf), tente outro!</div>";
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

                    var types = ['image/gif', 'image/jpeg', 'image/png', 'application/pdf'];

                    var v_size = (file_data.size < 199000000);
                    var v_type = (types.indexOf(file_data.type) > -1);
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("certificadosmsn").innerText = file_data.name;
                    document.getElementById("alertaCertificadoSize").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso! </div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("certificadosmsn").text = file_data.name;
                        document.getElementById("alertaCertificadoSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 200MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("certificadosmsn").text = file_data.name;
                        document.getElementById("alertaCertificadoSize").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>um dos arquivos não contem a extensão correta, tente outro!</div>";
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