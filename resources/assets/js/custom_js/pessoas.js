"use strict";

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('.verInfo').click(function (data) {
        var id = this;
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/alunos/getInfoUser/" + id.id,
            cache: true,
            success: function success(data) {
                $('#nomedynamic').text(data.nome);
                $('#sexodynamic').text(data.sexo);
                $('#dataNascimentodynamic').text(data.dataNascimento);
                $('#rgdynamic').text(data.rg);
                $('#redirectdynamic').attr('href', '/alunos/' + data.id);

            },
            beforeSend: function beforeSend() {
                $('#loadingResponsavel').show();
            },
            complete: function complete() {
                $('#loadingResponsavel').hide();
            }
        });
    });


    let validateEmail = function (email) {
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

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


    $('#cpf_cnpj').mask("999.999.999-99", {placeholder: "___.___.___-__"});

    if ($(".validatecpf").length) {
        $('.validatecpf').cpfcnpj({
            mask: true,
            validate: 'cpf',
            event: 'blur',
            handler: '.validatecpf',
            ifValid: function (input) {
                input.removeClass("error");
            },
            ifInvalid: function (input) {
                input.addClass("error");
            }
        });
    }

    $('#tipo_pessoas_id').change(function () {
        let changeTipoPessoa = $("#tipo_pessoas_id option:selected").val();

        if (changeTipoPessoa !== "4") {
            $('#dadosProfessor').hide();

            $('#setorFuncionario').val('').trigger('change');
            $('#funcaoFuncionario').val('').trigger('change');

            $('#setorFuncionario').removeAttr('required');
            $('#funcaoFuncionario').removeAttr('required');
            $('#data_admissao').removeAttr('required');

            $('#data_admissao').val("");

            $('#numero_ctps').val("");
            $('#ctps_serie').val("");
            $('#pis').val("");
            $('#salario_base').val("");
            $('#vale_refeicao').val("");
            $('#vale_transporte').val("");
            $('#contato_emergencial').val("");



            $('#bronquite').val("");
            $('#diabetes').val("");
            $('#alergia').val("");
            $('#faltadear').val("");
            $('#convulsao').val("");
            $('#sintomas').val("");

            $('#bronquite').hide();
            $('#diabetes').hide();
            $('#alergia').hide();
            $('#faltadear').hide();
            $('#convulsao').hide();
            $('#sintomas').hide();

        } else {
            $('#bronquite').attr('required', 'required');
            $('#diabetes').attr('required', 'required');
            $('#alergia').attr('required', 'required');
            $('#faltadear').attr('required', 'required');
            $('#convulsao').attr('required', 'required');

            $('#setorFuncionario').attr('required', 'required');
            $('#funcaoFuncionario').attr('required', 'required');
            $('#data_admissao').attr('required', 'required');

            $('#dadosProfessor').show();

            $('#bronquite').show();
            $('#diabetes').show();
            $('#alergia').show();
            $('#faltadear').show();
            $('#convulsao').show();
            $('#sintomas').show();

        }

        if (changeTipoPessoa !== "5") {
            $('.cpfCnpj').text("CPF");
            $('#cpf_cnpj').mask("999.999.999-99", {placeholder: "___.___.___-__"});
            $('#cpf_cnpj').val("");
            $('#razaoSocial').val("");
            $('#inscricaoEstadual').val("");

            $('.rg').show();
            $('#nomeLabel').text("Nome Completo:");

            $('.sexo').show();
            $('.dataNascimento').show();
            $('.citizenship').show();
            $('.familySituation').show();

            $('#rg').attr('required', 'required');

            $('#sexo').attr('required', 'required');
            $('#dataNascimento').attr('required', 'required');
            $('#citizenship').attr('required', 'required');
            $('#familySituation').attr('required', 'required');

            $('#tipoEmpresa').hide();
        } else {
            $('#rg').val("");
            $('.rg').hide();

            $('#sexo').val("");
            $('.sexo').hide();
            $('#dataNascimento').val("");
            $('.dataNascimento').hide();
            $('#citizenship').val("");
            $('.citizenship').hide();
            $('#familySituation').val("");
            $('.familySituation').hide();

            $('#rg').removeAttr('required');
            $('#nomeLabel').text("Nome Fantasia:");
            $('#sexo').removeAttr('required');
            $('#dataNascimento').removeAttr('required');
            $('#citizenship').removeAttr('required');
            $('#familySituation').removeAttr('required');


            $('.cpfCnpj').text("CNPJ");

            $("#cpf_cnpj").mask("99.999.999/9999-99", {placeholder: "__.___.___/____-__"});

            $('.validatecpf').cpfcnpj({
                mask: true,
                validate: 'cnpj',
                event: 'blur',
                handler: '.validatecpf',
                ifValid: function (input) {
                    input.removeClass("error");
                },
                ifInvalid: function (input) {
                    input.addClass("error");
                }
            });

            $('#tipoEmpresa').show();
        }


    });

    $("#contato_emergencial").mask("(99) 9 9999-9999", {placeholder: "(__) _ ____-______"});
    $('#salario_base').maskMoney({defaultZero: false});
    $('#vale_refeicao').maskMoney({defaultZero: false});
    $('#vale_transporte').maskMoney({defaultZero: false});

    $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__ /___"});
    $("#data_admissao").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('#dataNascimento').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });

    $('#setorFuncionario').select2({
        width: '100%',
    });

    $('#funcaoFuncionario').select2({
        width: '100%'
    });

    $('#data_admissao').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });

    $('#estado').select2({
        width: '100%'
    });

    $('#citizenship').select2({
        width: '100%'
    });
    $('#familySituation').select2({
        width: '100%'
    });
    $('#sexo').select2({
        width: 'resolve'
    });
    $('#tipo_pessoas_id').select2({
        width: '100%'
    });

    $('#pessoas-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        }
    });

    // $('input').iCheck({
    //     checkboxClass: 'icheckbox_square-blue',
    //     radioClass: 'iradio_square-blue',
    //     increaseArea: '5%' // optional
    // });

    $('#criarPessoa').validator();

    $("#zipCode").mask("99999-999", {placeholder: "_____-___"});
    $("#rg").mask("99.999.999-99", {placeholder: "__.___.___-_"});

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


    var escolheTipoPessoa = () => {

        if ($('meta[name="tipo-user"]').attr('content') == "4") {
            $('#setorFuncionario').attr('required', 'required');
            $('#funcaoFuncionario').attr('required', 'required');
            $('#data_admissao').attr('required', 'required');
            $('#dadosProfessor').show();
        }

        if ($('meta[name="tipo-user"]').attr('content') == "5") {
            $('#rg').val("");
            $('.rg').hide();
            $('#sexo').val("");
            $('.sexo').hide();
            $('#dataNascimento').val("");
            $('.dataNascimento').hide();
            $('#citizenship').val("");
            $('.citizenship').hide();
            $('#familySituation').val("");
            $('.familySituation').hide();

            $('#rg').removeAttr('required');
            $('#sexo').removeAttr('required');
            $('#dataNascimento').removeAttr('required');
            $('#citizenship').removeAttr('required');
            $('#familySituation').removeAttr('required');


            $('.cpfCnpj').text("CNPJ");
            $("#cpf_cnpj").mask("99.999.999/9999-99", {placeholder: "__.___.___/____-__"});
            $('.validatecpf').cpfcnpj({
                mask: true,
                validate: 'cnpj',
                event: 'blur',
                handler: '.validatecpf',
                ifValid: function (input) {
                    input.removeClass("error");
                },
                ifInvalid: function (input) {
                    input.addClass("error");
                }
            });

            $('#tipoEmpresa').show();
        }
    }

    escolheTipoPessoa();


    $('.listEmail').click(function () {

        let ids = $(this).get(0).id.split('-');


        $.ajax({
            async: true,
            url: '/pessoas/emailMain?idPessoa=' + ids[0] + '&idEmail=' + ids[1],
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: "json",
            contentType: 'application/json; charset=utf-8',
            data: function (data) {
            },
            success: function (data) {
                window.location.reload();
            },
            beforeSend: function (before) {
            },
            complete: function (complete) {
            },
            error: function (error) {
                console.log(error);
            }
        });
    })


});
