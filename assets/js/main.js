
function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i)

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }

}

jQuery(document).ready(function () {

    jQuery('#mostraLoginMedico').click(function () {
        jQuery('.containerEscolha').height('0');
        jQuery('.containerEscolha').width('0');
    });


});