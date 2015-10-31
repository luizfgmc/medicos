
function verifica_campos(id, e) {
    var _identifier;
    $(id + ' .required').each(function () {
        _identifier = $(this);
        if ((_identifier.val() == "")) {
            _identifier.addClass('error-required');
            //alert('Os campos com * precisam ser preenchidos');
            e.preventDefault();
            return false;
        } else {
            _identifier.removeClass(' ');
            if (_identifier.hasClass('is-mail')) {
                _mailVal = _identifier.val();
                var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(_mailVal)) {
                    _identifier.addClass('error-required');
                    //alert('Esse não é um email valido');
                    e.preventDefault();
                    return false;
                } else {
                    _identifier.removeClass('error-required');
                }
            }

            if (_identifier.hasClass('is-tel')) {
                _telVal = _identifier.val();
                var regex = /^[0-9\(\)\s\-]*$/;
                if (!regex.test(_telVal)) {
                    _identifier.addClass('error-required');
                    //alert('Tente o formato (xx) xxxx-xxxx');
                    e.preventDefault();
                    return false;
                } else {
                    _identifier.removeClass('error-required');
                }
            }

        }
    });
    var i = 0;
    nomesArray = new Array();
    // Pega todos os inputs com essa classe e guarda os nomes deles em um array
    jQuery(id + " input[class^=required-radio]").each(function () {
        nome = $(this).attr('name');
        nomesArray[i] = nome;
        i++;
    });
    var uniqueNames = [];
    // Elimina nomes iguais.
    $.each(nomesArray, function (i, el) {
        if ($.inArray(el, uniqueNames) === -1)
            uniqueNames.push(el);
    });
    var verdadeiro = 0;
    quantidadeNomes = uniqueNames.length;
    // Verifica se eles estão checkados
    for (j = 0; j < quantidadeNomes; j++) {
        var radio = document.getElementsByName(uniqueNames[j]);
        //numero de inputs com esse nome
        var radioL = radio.length;
        for (var i = 0; i < radioL; i++) {
            if (radio[i].checked) {
                verdadeiro++;
            }
        }
        if (verdadeiro >= quantidadeNomes) {
            return true;
        }
        else {
            alert('Os campos com * precisam ser preenchidos');
            e.preventDefault();
            return false;
        }

    }


}


function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i)

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }

}

