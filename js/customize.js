/** fechar caixa de alerta */
function closeAlertMsg()
{
    $('.msg_alert').slideUp('slow');
}
/** Passwords Match in Forms */
if (document.getElementById("password") != null) {
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