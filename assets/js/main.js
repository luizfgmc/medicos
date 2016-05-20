
function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i)

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }

}

jQuery(document).ready(function () {

    function esconderCaixasDeLogin()
    {
        jQuery('.containerEscolha').height('0');
        jQuery('.containerEscolha').width('0');
        jQuery('.loginMedico').height('0');
        jQuery('.loginMedico').width('0');
        jQuery('.loginInstituicao').height('0');
        jQuery('.loginInstituicao').width('0');
    }

    function mostrarCaixaInicialDeEscolha()
    {
        esconderCaixasDeLogin();
        jQuery('.containerEscolha').height('295');
        jQuery('.containerEscolha').width('586');
    }

    jQuery('#mostraLoginMedico').click(function () {
        esconderCaixasDeLogin();
        jQuery('.loginMedico').height('389');
        jQuery('.loginMedico').width('457');
    });

    jQuery('#mostraLoginInstituicao').click(function () {
        esconderCaixasDeLogin();
        jQuery('.loginInstituicao').height('389');
        jQuery('.loginInstituicao').width('457');
    });

    jQuery('.ocultarLogin').click(function () {
        mostrarCaixaInicialDeEscolha();
    });
    
    
        jQuery('#cep').focusout(function () {

        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + jQuery("#cep").val(),
                function () {
                    //Se o resultado for igual a 1
                    if (resultadoCEP["resultado"]) {
                        $("#bairro").val(unescape(resultadoCEP["bairro"]));
                        $("#cidade").val(unescape(resultadoCEP["cidade"]));
                        $("#logradouro").val(unescape(resultadoCEP["logradouro"]));
                    }
                });
    });

});