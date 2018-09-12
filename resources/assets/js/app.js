// Máscara de moeda

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e) {
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for (i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for (; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i)) != -1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0' + SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0' + SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
            $('#confirm_sale_input').trigger('input');
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
            objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
        $('#confirm_sale_input').trigger('input');
    }
    return false;
}

//Fim Máscara moeda

//success esconder

$(".ls-alert-success").delay(4000).slideUp(200, function () {
    $(this).alert('close');
});

$(".ls-alert-danger").delay(4000).slideUp(200, function () {
    $(this).alert('close');
});

//fim sccess esconder

$(document).ready(function () {

    var eventsPeaple = [];
    $.ajax({
        url: "/despesas/ajax",
        type: "get",
        async: true,

        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var event = {};
                event.title = data[i].nome + '\n ' + 'Valor: ' + currencyFormatted(data[i].valor, 'R$');
                event.start = data[i].data_vencimento;

                if (data[i].quitada) {
                    event.color = '#2ecc71'
                } else {
                    event.color = '#' + data[i].cor;
                }

                event.url = '/despesas/' + data[i].id;

                eventsPeaple.push(event);
            }
            $('#calendar').fullCalendar({
                events: eventsPeaple,
                locale: 'pt-br'

            })
        }
    });
});

function currencyFormatted(value, str_cifrao) {
    return str_cifrao + ' ' + value.formatMoney(2, ',', '.');
}

