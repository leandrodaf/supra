"use strict";

$(document).ready(function () {

    $('#pessoa').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um funcionário',
        "language": "pt-BR",
        ajax: {
            async: true,
            url: '/pessoas/funcionario',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nome + ' - ' + item.cpf_cnpj,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


    $('#roles').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um funcionário',
        "language": "pt-BR"
    });

});
