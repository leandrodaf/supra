"use strict";

$(document).ready(function () {

    let adicionarDiasData = function (dias) {
        let hoje = new Date();
        let dataVenc = new Date(hoje.getTime() + (dias * 24 * 60 * 60 * 1000));
        return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    };

    let reduzirDiasData = function (dias) {
        let hoje = new Date();
        let dataVenc = new Date(hoje.getTime() - (dias * 24 * 60 * 60 * 1000));
        return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    };


    $('#tipo_pessoas_id').select2();
    $('#sexo_aluno').select2();

    $('#formularioAlunos').validator();

    $('#data_nascimento_aluno').datepicker({
        startDate: reduzirDiasData(2192)
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '5%' // optional
    });

    $("#rg_aluno").mask("99.999.999-9");


    $('input[name="flg_irmaos_aluno"]').on('ifClicked', function (event) {
        if (this.value == 1)
            $('#qtdAlunos').removeAttr("hidden", "hidden");
        else
            $('#qtdAlunos').attr("hidden", "hidden");
        $('input[name="qtd_irmaos_aluno"]').val("");
    });

    $('#alunos-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        }
    });

    $('#email').select2({
        width: '100%',
        tags: true,
        tokenSeparators: [',', ';', ' '],
        placeholder: "Digite os emails",
        createTag: function (term, data) {
            let value = term.term;
            if (validateEmail(value)) {
                return {
                    id: value,
                    text: value
                };
            }
            return null;
        }
    });

    $('#responsavel').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um responsável',
        "language": "pt-BR",
        ajax: {
            url: '/alunos/getAjax',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nome,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    let validateEmail = function (email) {
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

});