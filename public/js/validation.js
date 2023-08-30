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

    // Function to enable or disable the "Código" input field based on selection
    $('input[name="btnradio"]').on('change', function () {
        const customCodeInput = $('#CustomCode');
        if ($(this).attr('id') === 'btnradio2') {
            customCodeInput.prop('disabled', false);
        } else {
            customCodeInput.prop('disabled', true);
            customCodeInput.val('')
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

});
