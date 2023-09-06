$(document).ready(function () {
    // Escuta o evento 'input' para detectar mudanças no campo de entrada
    $('#ProductPrice').on('input', function () {
        // Remove os caracteres de separação de milhares e decimal
        let value = $(this).val().replace(",", "").replace(".", "");

        // Verifica se o valor é numérico
        if (!isNaN(value)) {
            // Divide o número por 100 e formata como uma string com duas casas decimais
            let formattedValue = (parseFloat(value) / 100).toFixed(2);

            // Define o valor formatado no campo de entrada
            $(this).val(formattedValue);

            // Coloca o cursor no final do texto
            this.setSelectionRange(formattedValue.length, formattedValue.length);
        } else {
            let value2 = value.replace(/[^0-9]/g, '');
            let formattedValue = (value2 / 100).toFixed(2);
            $(this).val(formattedValue);

            // Coloca o cursor no final do texto
            this.setSelectionRange(formattedValue.length, formattedValue.length);
        }
    });

    $('#boxvalue').on('input', function () {
        // Remove os caracteres de separação de milhares e decimal
        let value = $(this).val().replace(",", "").replace(".", "");

        // Verifica se o valor é numérico
        if (!isNaN(value)) {
            // Divide o número por 100 e formata como uma string com duas casas decimais
            let formattedValue = (parseFloat(value) / 100).toFixed(2);

            // Define o valor formatado no campo de entrada
            $(this).val(formattedValue);
        } else {
            let value2 = value.replace(/[^0-9]/g, '');
            let formattedValue = (value2 / 100).toFixed(2);
            $(this).val(formattedValue);

        }
        // Coloca o cursor no final do texto
        this.setSelectionRange(formattedValue.length, formattedValue.length);
    });

    $('#search').on('focus', function () {
        $(this).attr('placeholder', 'Nome ou Código');
    });

    $('#search').on('blur', function () {
        $(this).attr('placeholder', ' ');
    });

    // BARCODE READER
    $('#CustomCode').focus();
    $('#CustomCode').on('blur', function () {
        if ($(this).val().trim().length < 1) {
            $('#mensagemErro').text('Campo obrigatório');
            $('#mensagemErro').show();
            $(this).focus();
        } else {
            $('#mensagemErro').hide();
        }
    });

    $('#ProdForm').on('submit', function () {
            $('#carregando').text('Carregando...');
            $('#carregando').show();
    });
});
