//::::::::::::::::::::: begin 2.1 problema :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaproblema1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaproblema1]").val();
        $("textarea[name=respostaproblema1]").val(comentario.substr(0, limite));
        $("#caracteresproblema1").text("0 " + informativo);
    } else {
        $("#caracteresproblema1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaproblema2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaproblema2]").val();
        $("textarea[name=respostaproblema2]").val(comentario.substr(0, limite));
        $("#caracteresproblema2").text("0 " + informativo);
    } else {
        $("#caracteresproblema2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaproblema3", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaproblema3]").val();
        $("textarea[name=respostaproblema3]").val(comentario.substr(0, limite));
        $("#caracteresproblema3").text("0 " + informativo);
    } else {
        $("#caracteresproblema3").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaproblema4", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaproblema4]").val();
        $("textarea[name=respostaproblema4]").val(comentario.substr(0, limite));
        $("#caracteresproblema4").text("0 " + informativo);
    } else {
        $("#caracteresproblema4").text(caracteresRestantes + " " + informativo);
    }

});


//::::::::::::::::::::: begin 2.2 cliente alvo :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaClienteAlvo1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaClienteAlvo1]").val();
        $("textarea[name=respostaClienteAlvo1]").val(comentario.substr(0, limite));
        $("#caracteresClienteAlvo1").text("0 " + informativo);
    } else {
        $("#caracteresClienteAlvo1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaClienteAlvo2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaClienteAlvo2]").val();
        $("textarea[name=respostaClienteAlvo2]").val(comentario.substr(0, limite));
        $("#caracteresClienteAlvo2").text("0 " + informativo);
    } else {
        $("#caracteresClienteAlvo2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaClienteAlvo3", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaClienteAlvo3]").val();
        $("textarea[name=respostaClienteAlvo3]").val(comentario.substr(0, limite));
        $("#caracteresClienteAlvo3").text("0 " + informativo);
    } else {
        $("#caracteresClienteAlvo3").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 2.3 proposta de valor :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaPropostaValor1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPropostaValor1]").val();
        $("textarea[name=respostaPropostaValor1]").val(comentario.substr(0, limite));
        $("#caracteresPropostaValor1").text("0 " + informativo);
    } else {
        $("#caracteresPropostaValor1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaPropostaValor2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPropostaValor2]").val();
        $("textarea[name=respostaPropostaValor2]").val(comentario.substr(0, limite));
        $("#caracteresPropostaValor2").text("0 " + informativo);
    } else {
        $("#caracteresPropostaValor2").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 2.4 concorrentes :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaConcorrentes1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaConcorrentes1]").val();
        $("textarea[name=respostaConcorrentes1]").val(comentario.substr(0, limite));
        $("#caracteresConcorrentes1").text("0 " + informativo);
    } else {
        $("#caracteresConcorrentes1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaConcorrentes2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaConcorrentes2]").val();
        $("textarea[name=respostaConcorrentes2]").val(comentario.substr(0, limite));
        $("#caracteresConcorrentes2").text("0 " + informativo);
    } else {
        $("#caracteresConcorrentes2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaConcorrentes3", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaConcorrentes3]").val();
        $("textarea[name=respostaConcorrentes3]").val(comentario.substr(0, limite));
        $("#caracteresConcorrentes3").text("0 " + informativo);
    } else {
        $("#caracteresConcorrentes3").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaConcorrentes4", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaConcorrentes4]").val();
        $("textarea[name=respostaConcorrentes4]").val(comentario.substr(0, limite));
        $("#caracteresConcorrentes4").text("0 " + informativo);
    } else {
        $("#caracteresConcorrentes4").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.1 Preço :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaEstrategiaMercado1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaEstrategiaMercado1]").val();
        $("textarea[name=respostaEstrategiaMercado1]").val(comentario.substr(0, limite));
        $("#caracteresEstrategiaMercado1").text("0 " + informativo);
    } else {
        $("#caracteresEstrategiaMercado1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaEstrategiaMercado2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaEstrategiaMercado2]").val();
        $("textarea[name=respostaEstrategiaMercado2]").val(comentario.substr(0, limite));
        $("#caracteresEstrategiaMercado2").text("0 " + informativo);
    } else {
        $("#caracteresEstrategiaMercado2").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.2 distribuicao :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaDistribuicao1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaDistribuicao1]").val();
        $("textarea[name=respostaDistribuicao1]").val(comentario.substr(0, limite));
        $("#caracteresDistribuicao1").text("0 " + informativo);
    } else {
        $("#caracteresDistribuicao1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaDistribuicao2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaDistribuicao2]").val();
        $("textarea[name=respostaDistribuicao2]").val(comentario.substr(0, limite));
        $("#caracteresDistribuicao2").text("0 " + informativo);
    } else {
        $("#caracteresDistribuicao2").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.3 promocao :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaPromocao1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPromocao1]").val();
        $("textarea[name=respostaPromocao1]").val(comentario.substr(0, limite));
        $("#caracteresPromocao1").text("0 " + informativo);
    } else {
        $("#caracteresPromocao1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaPromocao2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPromocao2]").val();
        $("textarea[name=respostaPromocao2]").val(comentario.substr(0, limite));
        $("#caracteresPromocao2").text("0 " + informativo);
    } else {
        $("#caracteresPromocao2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaPromocao3", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPromocao3]").val();
        $("textarea[name=respostaPromocao3]").val(comentario.substr(0, limite));
        $("#caracteresPromocao3").text("0 " + informativo);
    } else {
        $("#caracteresPromocao3").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaPromocao4", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPromocao4]").val();
        $("textarea[name=respostaPromocao4]").val(comentario.substr(0, limite));
        $("#caracteresPromocao4").text("0 " + informativo);
    } else {
        $("#caracteresPromocao4").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaPromocao5", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaPromocao5]").val();
        $("textarea[name=respostaPromocao5]").val(comentario.substr(0, limite));
        $("#caracteresPromocao5").text("0 " + informativo);
    } else {
        $("#caracteresPromocao5").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 4.1 modelo de receita :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaReceita1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaReceita1]").val();
        $("textarea[name=respostaReceita1]").val(comentario.substr(0, limite));
        $("#caracteresReceita1").text("0 " + informativo);
    } else {
        $("#caracteresReceita1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaReceita2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaReceita2]").val();
        $("textarea[name=respostaReceita2]").val(comentario.substr(0, limite));
        $("#caracteresReceita2").text("0 " + informativo);
    } else {
        $("#caracteresReceita2").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaReceita3", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaReceita3]").val();
        $("textarea[name=respostaReceita3]").val(comentario.substr(0, limite));
        $("#caracteresReceita3").text("0 " + informativo);
    } else {
        $("#caracteresReceita3").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 4.2 modelo de custo :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaCusto1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaCusto1]").val();
        $("textarea[name=respostaCusto1]").val(comentario.substr(0, limite));
        $("#caracteresCusto1").text("0 " + informativo);
    } else {
        $("#caracteresCusto1").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 4.3 modelo de vendas :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaVendas1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaVendas1]").val();
        $("textarea[name=respostaVendas1]").val(comentario.substr(0, limite));
        $("#caracteresVendas1").text("0 " + informativo);
    } else {
        $("#caracteresVendas1").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 4.4 modelo de financiamento :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaFinanciamento1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaFinanciamento1]").val();
        $("textarea[name=respostaFinanciamento1]").val(comentario.substr(0, limite));
        $("#caracteresFinanciamento1").text("0 " + informativo);
    } else {
        $("#caracteresFinanciamento1").text(caracteresRestantes + " " + informativo);
    }

});

$(document).on("input", "#respostaFinanciamento2", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaFinanciamento2]").val();
        $("textarea[name=respostaFinanciamento2]").val(comentario.substr(0, limite));
        $("#caracteresFinanciamento2").text("0 " + informativo);
    } else {
        $("#caracteresFinanciamento2").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.1. Fundadores :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaFundadores1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaFundadores1]").val();
        $("textarea[name=respostaFundadores1]").val(comentario.substr(0, limite));
        $("#caracteresFundadores1").text("0 " + informativo);
    } else {
        $("#caracteresFundadores1").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.2. Mentores :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaMentores1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaMentores1]").val();
        $("textarea[name=respostaMentores1]").val(comentario.substr(0, limite));
        $("#caracteresMentores1").text("0 " + informativo);
    } else {
        $("#caracteresMentores1").text(caracteresRestantes + " " + informativo);
    }

});

//::::::::::::::::::::: begin 3.3. Parceiros :::::::::::::::::::::::::::::::::::

$(document).on("input", "#respostaParceiros1", function () {

    var limite = 1000;
    var informativo = "caracteres restantes.";
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    if (caracteresRestantes <= 0) {
        var comentario = $("textarea[name=respostaParceiros1]").val();
        $("textarea[name=respostaParceiros1]").val(comentario.substr(0, limite));
        $("#caracteresParceiros1").text("0 " + informativo);
    } else {
        $("#caracteresParceiros1").text(caracteresRestantes + " " + informativo);
    }

});


//::::::::::::::::::::: begin LINK 2 :::::::::::::::::::::::::::::::::::
function fileLinkB(){

    var valorLink = document.getElementById('linkVideo2').value;
    var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
    
    
    if(valorLink == " " || !valorLink.match(v)){
        document.getElementById("alertaLink2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Campo está vazio ou link está incorreto!</div>";
        return false;
    }else{
        document.getElementById("alertaLink2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Código do Link validado com sucesso! " +  RegExp.$1 + "</div>";
        return false;
    }

};

function fileSlideB(){
   
    var imputs_file_comp = document.getElementsByClassName('imput_slideb');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var v_size = (file_data.size < 199000000);
                    var v_type = (file_data.type == 'application/pdf');
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("slidemsn2").innerText = file_data.name;
                    document.getElementById("alertaSlideSize2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso!</div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("slidemsn2").text = file_data.name;
                        document.getElementById("alertaSlideSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 200MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("slidemsn2").text = file_data.name;
                        return false;
                    }
                }
            }
        }
   
};

function certificadoSlideB(){
   
    var imputs_file_comp = document.getElementsByClassName('imput_certificadosb');
        for(key in imputs_file_comp){
            if (imputs_file_comp[key].id) {
                if (imputs_file_comp[key].files.length > 0) {
                    var file_data = imputs_file_comp[key].files[0];

                    var v_size = (file_data.size < 19900000);
                    var v_type = (file_data.type == 'image/gif, image/jpeg, image/png, application/pdf');
                    //var participante = imputs_file_comp[key].id.replace('slide');

                    document.getElementById("certificadosmsn2").innerText = file_data.name;
                    document.getElementById("alertaCertificadoSize2").innerHTML = "<div class='alert alert-success mt-3' role='alert'>O arquivo foi selecionado com sucesso! </div>";

                    if (!v_size) {
                        //alert('o arquivo do [' + participante + '] contem mais de 200MB, tente outro!');
                        document.getElementById("certificadosmsn2").text = file_data.name;
                        document.getElementById("alertaCertificadoSize2").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>O arquivo contem mais de 100MB, tente outro!</div>";
                        return false;
                    }
                    if (!v_type) {
                        //alert('o arquivo do [' + participante + '] não contem a extensão (.pdf), tente outro!');
                        document.getElementById("certificadosmsn2").text = file_data.name;
                        return false;
                    }
                }
            }
        }
   
};

// Desabilita o botão Submit 
document.querySelector('.input-check').disabled=true;

// Função abilita ao clicar no checkbox e Desabilita ao desmarcar o checkbox 
function checkBoxTermoB(){

    var btnCheck = document.getElementById('customCheck1');
        
    if(btnCheck.checked){
        document.querySelector('.input-check').disabled=false;
        document.getElementById("alertaLinkS").innerHTML = "<div class='alert alert-success mt-3' role='alert'>Agora salve o formulário com todas as informações! </div>";
        
        return false;
    }else{
       
            document.querySelector('.input-check').disabled=true;
            document.getElementById("alertaLinkS").innerHTML = "<div class='alert alert-danger mt-3' role='alert'>Você precisa aceitar o termo clicando no checkbox para savar as informações!</div>";
            return false;
        
    }

};