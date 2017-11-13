"use strict";

$(document).ready(function () {


    $('.responsavel').click(function () {
        var botao = this;

        if (botao.id == 1) {
            $('#modalTitle').text("Responsável 1")
            $('.numeroResponsavel').attr('id', '1');
        } else {
            $('#modalTitle').text("Responsável 2")
            $('.numeroResponsavel').attr('id', '2');
        }
    });


    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '5%' // optional
    });

    $('#nacionalidade').select2({
        width: '100%'
    });


    $('#inputResponsavel').on('click', function () {
        if ($('#inputResponsavel').hasClass("disabled") != true) {
            var id = $('.numeroResponsavel').get(0).id;
            $('#fieldsResponsaveis').show();
            $.ajax({
                url: 'pessoas/storeAjax',
                type: 'POST',
                data: $('#form-responsavel').serialize(),
                dataType: 'JSON',
                success: function (data) {
                    var newOption = new Option(data.nome, data.id, false, false);
                    // $('#responsavel' + id).val(null).trigger('change');
                    $("#responsavel" + id + " option").remove().trigger('change');
                    $('#responsavel' + id).append(newOption).trigger('change');


                    $("#form-responsavel").get(0).reset();
                    $('#modal-default-responsavel').modal('hide');
                    console.log(data);
                },
                beforeSend: function (before) {
                    $('#fieldsResponsaveis').hide();
                    $('#loadingCadastroResponsavel').show();
                    console.log(before);
                },
                complete: function (complete) {
                    $('#loadingCadastroResponsavel').hide();
                    $('#fieldsResponsaveis').show();
                    console.log(complete);
                },
                error: function (data) {
                    $('#fieldsResponsaveis').show();
                    console.log(data);
                }
            });
        }
    });
    $('#form-responsavel').submit(function (e) {
        e.preventDefault();
    });

    $('#form-responsavel').validator();

    //Controla o wizard de cadastro de alunos
    $(document).ready(function () {
        $('#rootwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard .progress-bar').css({width: $percent + '%'});
            }
        });
    });


    $("#rg_aluno").mask("99.999.999-9", {placeholder: "__.___.___-_"});
    $("#cep").mask("99999-999", {placeholder: "_____-___"});
    $("#rg").mask("99.999.999-99", {placeholder: "__.___.___-_"});
    $("#cpf_cnpj").mask("999.999.999-99", {placeholder: "___.___.___-__"});

    $('#responsavel1').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione o responsável 1',
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

    $('#responsavel2').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione o responsável 2',
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


    let reduzirDiasData = function (dias) {
        let hoje = new Date();
        let dataVenc = new Date(hoje.getTime() - (dias * 24 * 60 * 60 * 1000));
        return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    };


    $('#formularioAlunos').validator();

    $('#data_nascimento_aluno').datepicker({
        startDate: reduzirDiasData(2192)
    });

    let validateEmail = function (email) {

        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    $('#tipo_pessoas_id').select2();
    $('#sexo_aluno').select2();

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

    $('input[name="flg_irmaos_aluno"]').on('ifClicked', function (event) {
        if (this.value == 1)
            $('#qtdAlunos').removeAttr("hidden", "hidden");
        else
            $('#qtdAlunos').attr("hidden", "hidden");
        $('input[name="qtd_irmaos_aluno"]').val("");
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '5%'
    });

});