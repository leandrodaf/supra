"use strict";

$(document).ready(function () {

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
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#complemento").val("");
        $("#pais").val("");
        $("#ibge").val("");

    }

    $("#cep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#complemento").val("...");
                $("#pais").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#complemento").val(dados.complemento);
                        // $("#estado").val(dados.uf);
                        $("#pais").val("Brasil");
                        $("#ibge").val(dados.ibge);

                        $('#estado option').filter(function () {
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
                dataType: 'JSON',
                success: function (data) {
                    var newOption = new Option(data.nome, data.id, false, false);
                    // $('#responsavel' + id).val(null).trigger('change');
                    $("#responsavel" + id + " option").remove().trigger('change');
                    $('#responsavel' + id).append(newOption).trigger('change');


                    $("#form-responsavel").get(0).reset();
                    $('#modal-default-responsavel').modal('hide');
                },
                beforeSend: function (before) {
                    $('#fieldsResponsaveis').hide();
                    $('#loadingCadastroResponsavel').show();
                },
                complete: function (complete) {
                    $('#loadingCadastroResponsavel').hide();
                    $('#fieldsResponsaveis').show();
                },
                error: function (data) {
                    $('#fieldsResponsaveis').show();
                }
            });
        }
    });

    $('#form-responsavel').submit(function (e) {
        e.preventDefault();
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

    $('#data_nascimento_aluno').datepicker({
        autoclose: true,
        startDate: reduzirDiasData(2192),
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });

    $("#data_nascimento_aluno").mask("99/99/9999", {placeholder: "__/__ /___"});

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




    $('input[name="flg_irmaos_aluno"]').on('click', function (event) {
        if (this.value == 1) {
            $('#qtdAlunos').removeAttr("hidden", "hidden");

        } else {
            $('#qtdAlunos').attr("hidden", "hidden");
            $('input[name="qtd_irmaos_aluno"]').val("");
        }

    });



    $('.sw-btn-next').val("Próximo");
    $('.sw-btn-prev').val("Voltar");

    $('#form-responsavel').validator();
    // $('#matriculaAluno').validator();
    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finalizar')
        .addClass('btn btn-info')
        .on('click', function () {
            if (!$(this).hasClass('disabled')) {
                var elmForm = $("#matriculaAluno");
                if (elmForm) {
                    elmForm.validator('validate');
                    var elmErr = elmForm.find('.has-error');
                    if (elmErr && elmErr.length > 0) {
                        alert('Oops we still have error in the form');
                        return false;
                    } else {
                        elmForm.submit();
                        return false;
                    }
                }
            }
        });

    var btnCancel = $('<button></button>').text('Cancelar')
        .addClass('btn btn-danger')
        .on('click', function () {
            $('#smartwizard').smartWizard("reset");
            $('#matriculaAluno').find("input, textarea").val("");
        });

    // Smart Wizard
    $('#smartwizard').smartWizard({
        selected: 0,
        theme: 'circles',
        transitionEffect: 'fade',
        toolbarSettings: {
            toolbarPosition: 'bottom',
            toolbarExtraButtons: [btnFinish, btnCancel]
        },
        anchorSettings: {
            markDoneStep: true, // add done css
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        }
    });

    $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);

        if (stepDirection === 'forward' && elmForm) {
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            if (elmErr && elmErr.length > 0) {
                return false;
            }
        }
        return true;
    });

    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        // Enable finish button only on last step
        if (stepNumber == 3) {
            $('.btn-finish').removeClass('disabled');
        } else {
            $('.btn-finish').addClass('disabled');
        }
    });


    $('#estado').select2({
        width: '100%'
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