        
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function(){

    $("#login").focus();

    $("#loginHelp").css('display', 'none');
    $("#senhaloginHelp").css('display', 'none');
    

    $("#btn-login").click(function(){
        
        var login = $("#login").val();
        var senhal = $("#senhalogin").val();

        if (login == "" || !expr.test(login)) {
            $("#loginHelp").css('display', 'inline');
            $('#login').removeClass("valido");
            $('#login').addClass("invalido");   
            return false;
        }else{
                $("#nomeHelp").css('display', 'none');
                $('#login').removeClass("invalido");
                $('#login').addClass("valido");

                if(senhal == "" || senhal.length < 8){
                    $("#senhaloginHelp").css('display', 'inline');
                    $('#senhalogin').removeClass("valido");
                    $('#senhalogin').addClass("invalido");   
                    return false;
                }else{
                    $("#senhaloginHelp").css('display', 'none');
                    $('#senhalogin').removeClass("invalido");
                    $('#senhalogin').addClass("valido");

                    setTimeout(function(){ alert("Hello"); }, 6000);
                       
            }
        }

        
    });
});




