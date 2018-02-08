"use strict";

$(document).ready(function () {

    var form = $("#matriculaAluno");

    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        }
    });

    var settings = {
        labels: {
            current: "Passo atual:",
            pagination: "Páginação",
            finish: "Finalizar",
            next: "Próximo",
            previous: "Voltar",
            loading: "Carregando ..."
        },
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        saveState: true,
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";

            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";

            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            form.submit()
        },
        onFinish: function () {
            alert('FOIIIIIIIIIIIIIII');
        }

    };


    form.children("div").steps(settings);

    $('.validatecpf').cpfcnpj({
        mask: true,
        validate: 'cpfcnpj',
        event: 'blur',
        handler: '.validatecpf',
        ifValid: function (input) {
            input.removeClass("error");
        },
        ifInvalid: function (input) {
            input.addClass("error");
        }
    });

    //Busca CEP Async

    function limpa_formulário_cep() {
        $("#street").val("");
        $("#neighborhood").val("");
        $("#city").val("");
        $("#complement").val("");
        $("#country").val("");
        $("#ibge").val("");

    }

    $("#zipCode").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#street").val("...");
                $("#neighborhood").val("...");
                $("#city").val("...");
                $("#complement").val("...");
                $("#country").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#street").val(dados.logradouro);
                        $("#neighborhood").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#complement").val(dados.complemento);
                        // $("#estado").val(dados.uf);
                        $("#country").val("Brasil");
                        $("#ibge").val(dados.ibge);

                        $('#state option').filter(function () {
                            return ($(this).text() == dados.uf);
                        }).prop('selected', true).trigger('change');

                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });


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


    $('#citizenship').select2({
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (data) {
                    var newOption = new Option(data.nome, data.id, false, false);
                    // $('#responsavel' + id).val(null).trigger('change');
                    $("#responsavel" + id + " option").remove().trigger('change');
                    $('#responsavel' + id).append(newOption).trigger('change');

                    $("emailResponsavel").select2().val("").trigger("change");
                    $("telefoneResponsavel").select2().val("").trigger("change");

                    $("#form-responsavel").get(0).reset();
                    $("#modal-default-responsavel").modal('hide');
                },
                beforeSend: function (before) {
                    $('#fieldsResponsaveis').hide();
                    $('#loadingCadastroResponsavel').show();
                },
                complete: function (complete) {
                    $('#loadingCadastroResponsavel').hide();
                    $('#fieldsResponsaveis').show();
                },
                error: function (error) {
                    console.log("!!Erro!!")
                    console.log(error)
                    $('#fieldsResponsaveis').show();
                }
            });
        }
    });

    $('#form-responsavel').submit(function (e) {
        e.preventDefault();
    });

    $("#rg_aluno").mask("99.999.999-9", {placeholder: "__.___.___-_"});
    $("#zipCode").mask("99999-999", {placeholder: "_____-___"});
    $("#rg").mask("99.999.999-99", {placeholder: "__.___.___-_"});
    $("#cpf_cnpj").mask("999.999.999-99", {placeholder: "___.___.___-__"});


    $('#responsavel1').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione o responsável 1',
        language: 'pt-BR',
        ajax: {
            url: '/pessoas/getAjax',
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

    $('#responsavel2Matricula').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione o responsável 1',
        language: 'pt-BR',
        ajax: {
            url: '/pessoas/getAjax',
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
                            text: item.nome + ' - ' + item.cpf_cnpj + ' (' + checkStatusTypePerson(item.tipo_pessoas_id) + ')',
                            text: item.nome + ' - ' + item.cpf_cnpj,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


    let checkStatusTypePerson = function (value) {
        return value != 2 ? "Autorizado" : "Responsável";
    }

    let reduzirDiasData = function (dias) {
        let hoje = new Date();
        let dataVenc = new Date(hoje.getTime() - (dias * 24 * 60 * 60 * 1000));
        return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    };

    $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('#dataNascimento').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });


    $("#data_nascimento_aluno").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('#data_nascimento_aluno').datepicker({
        autoclose: true,
        startDate: reduzirDiasData(2192),
        locale: 'pt-BR',
        format: 'dd/mm/yyyy',
        orientation: 'bottom auto'
    });

    $('#tipo_pessoas_id').select2();
    $('#sexo_aluno').select2();

    let validateEmail = function (email) {
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };


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

    $('#emailResponsavel').select2({
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

    $('input[name="flg_irmaos_aluno"]').on('click', function (event) {
        if (this.value == 1) {
            $('#qtdAlunos').removeAttr("hidden", "hidden");
            $('input[name="qtd_irmaos_aluno"]').attr('required', 'required');
        } else {
            $('#qtdAlunos').attr("hidden", "hidden");
            $('input[name="qtd_irmaos_aluno"]').removeAttr("required", "required");
            $('input[name="qtd_irmaos_aluno"]').val("");
        }
    });

    $('#telefoneResponsavel').select2({
        width: '100%',
        tags: true,
        tokenSeparators: [',', ';', ' '],
        placeholder: "Digite os telefones",
        createTag: function (term, data) {
            let value = term.term;
            return {
                id: value.replace(/^(\d{3})(\d{4})(\d{5}).*/, '($1) $2-$3'),
                text: value
            };
        }
    });


    $('#form-responsavel').validator();
    // $('#matriculaAluno').validator();
    // Toolbar extra buttons

    $('#state').select2({
        width: '100%'
    });


    $('input[name="healthInformations[convulsao]"]').on('click', function (event) {
        if (this.value == 1) {

            $('textarea[name="healthInformations[medicamentotomar]"]').removeAttr("disabled", "disabled");
            $('textarea[name="healthInformations[medicamentotomar]"]').attr('required', 'required');

        } else {
            $('textarea[name="healthInformations[medicamentotomar]"]').attr("disabled", "disabled");
            $('textarea[name="healthInformations[medicamentotomar]"]').removeAttr("required", "required");
            $('textarea[name="healthInformations[medicamentotomar]"]').val("");
        }

    });


    $('input[name="healthInformations[alergia]"]').on('click', function (event) {
        if (this.value == 1) {

            $('textarea[name="healthInformations[sintomasalergia]"]').removeAttr("disabled", "disabled");
            $('textarea[name="healthInformations[sintomasalergia]"]').attr('required', 'required');

        } else {
            $('textarea[name="healthInformations[sintomasalergia]"]').attr("disabled", "disabled");
            $('textarea[name="healthInformations[sintomasalergia]"]').removeAttr("required", "required");
            $('textarea[name="healthInformations[sintomasalergia]"]').val("");
        }

    });


    $('#telefoneAluno').select2({
        width: '100%',
        tags: true,
        tokenSeparators: [',', ';', ' '],
        placeholder: "Digite os telefones",
        createTag: function (term, data) {
            let value = term.term;
            return {
                id: value,
                text: value
            };
        }
    });


    // $.uploadPreview({
    //     input_field: "#foto_aluno",   // Default: .image-upload
    //     preview_box: "#image-preview",  // Default: .image-preview
    //     label_field: "#image-label",    // Default: .image-label
    //     label_default: "Choose File",   // Default: Choose File
    //     label_selected: "Change File",  // Default: Change File
    //     no_label: false                 // Default: false
    // });

});