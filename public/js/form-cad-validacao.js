        
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function(){

    $("#nome-completo").focus();
    $("#nomeHelp").css('display', 'none');
    $("#startapHelp").css('display', 'none');
    $("#emailHelp").css('display', 'none');
    $("#senhaHelp").css('display', 'none');
    $("#csenhaHelp").css('display', 'none');

    $("#btn-cadastro").click(function(){
        
        var nome = $("#nome-completo").val();
        var nome_startup = $("#nome-startup").val();
        var email = $("#email-stup").val();
        var senha = $("#senha-stup").val();
        var conf_senha = $("#senha-stup-conf").val();

        if (nome == "") {
            $("#nomeHelp").css('display', 'inline');
            $('#nome-completo').removeClass("valido");
            $('#nome-completo').addClass("invalido");   
            return false;
        }else{
                $("#nomeHelp").css('display', 'none');
                $('#nome-completo').removeClass("invalido");
                $('#nome-completo').addClass("valido");

                if(nome_startup == ""){
                    $("#startapHelp").css('display', 'inline');
                    $('#nome-startup').removeClass("valido");
                    $('#nome-startup').addClass("invalido");   
                    return false;
                }else{
                    $("#startapHelp").css('display', 'none');
                    $('#nome-startup').removeClass("invalido");
                    $('#nome-startup').addClass("valido");

                    if(email == "" || !expr.test(email)){
                        $("#emailHelp").css('display', 'inline');
                        $('#email-stup').removeClass("valido");
                        $('#email-stup').addClass("invalido");   
                        return false;
                    }else{
                        $("#emailHelp").css('display', 'none');
                        $('#email-stup').removeClass("invalido");
                        $('#email-stup').addClass("valido");
                        if (senha == "" || senha.length < 8){
                            $("#senhaHelp").css('display', 'inline');
                            $('#senha-stup').removeClass("valido");
                            $('#senha-stup').addClass("invalido");   
                            return false;
                        }else{
                            $("#senhaHelp").css('display', 'none');
                            $('#senha-stup').removeClass("invalido");
                            $('#senha-stup').addClass("valido");
                            if(conf_senha == "" || conf_senha != senha){
                                $("#csenhaHelp").css('display', 'inline');
                                $('#senha-stup-conf').removeClass("valido");
                                $('#senha-stup-conf').addClass("invalido");   
                                return false;
                            }else{
                                $("#csenhaHelp").css('display', 'none');
                                $('#senha-stup-conf').removeClass("invalido");
                                $('#senha-stup-conf').addClass("valido");

                                setTimeout(function(){ console.log(email); }, 3000);
                            }
                        }
                    }
                }
            }  
        });
});



