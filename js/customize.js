/** Url padrão */
const BASE_URL = 'http://'+location.host+'/';

/** fechar caixa de alerta */
function closeAlertMsg()
{
    $('.msg_alert').slideUp('slow');
}
/** Passwords Match in Forms */
if (document.getElementById("password") != null)
{
    var n = document.getElementById("password");
    var r = document.getElementById("confirm_password");

    function i() {
        if (n.value != r.value) {
            r.setCustomValidity("Os campos de senhas não coincidem.")
        } else {
            r.setCustomValidity("")
        }
    }
    n.onchange = i;
    r.onkeyup = i
}
/** Atualizar Captcha da página de cadastro */
function refreshCaptcha()
{
    $.ajax({
        url: BASE_URL+"user/getnewcaptcha",
        type: "POST",
        dataType: "json",
        data: { captcha : true },
        success: function(e) {
            if(e['filename'] != undefined){
                document.getElementById('img_captcha').src = BASE_URL+'captcha/'+e['filename'];
            }
        }
    })
}