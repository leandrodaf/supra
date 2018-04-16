"use strict";


$(document).ready(function () {

    // Teatcher


    $(document).on('click', '.remove', function () {
        let item = $(this);

        $.ajax({
            async: true,
            type: "DELETE",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/schoolsubject/teacher/" + $('meta[name="id"]').attr('content'),
            data: {subjects: item[0].id},
            cache: true,
            success: function success(data) {

            },
            beforeSend: function beforeSend(data) {

            },
            complete: function complete(data) {
            }
        });

        item.remove().slideUp();
        $('#staticClassItem' + item[0].id).remove().slideUp();
    });


    let loadingSchoolSubjectsStatic = function () {
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/schoolsubject/teacher/" + $('meta[name="id"]').attr('content'),
            cache: true,
            success: function success(data) {
                if (data.length < 1) {
                    $('#naoTemMateriasAtribuidas').show();
                } else {
                    $('#naoTemMateriasAtribuidas').hide();
                    for (var index in data) {
                        let item =
                            "<li class='list-group-item d-flex justify-content-between align-items-center' id='staticClassItem" + data[index].id + "'>" +
                            data[index].nome +
                            "</li>";

                        $('#listSchoolSubjectsStatic').append(item).fadeIn();
                    }
                }


            },
            beforeSend: function beforeSend() {
                $('#loadinglistSchoolSubjectsStatic').show();
                $('#listSchoolSubjectsStatic').empty();
            },
            complete: function complete() {
                $('#loadinglistSchoolSubjectsStatic').hide();
            }
        });
    };

    loadingSchoolSubjectsStatic();


    let loadingSchoolSubjects = function () {
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/schoolsubject/teacher/" + $('meta[name="id"]').attr('content'),
            cache: true,
            success: function success(data) {
                if (data.length < 1) {
                    $('#naoTemMateriasAtribuidas').show();
                } else {
                    $('#naoTemMateriasAtribuidas').hide();
                    for (var index in data) {
                        let item =
                            "<li class='list-group-item d-flex justify-content-between align-items-center remove' style='cursor: pointer;' id='" + data[index].id + "'>" +
                            data[index].nome +
                            "<span class='badge' style='background-color: #cb2027; color: #ffffff; font-size: 15px'>" +
                            "<i class='fa fa-trash-o'></i>" +
                            "</span>" +
                            "</li>";

                        $('#listSchoolSubjects').append(item).fadeIn();

                        let item2 =
                            "<li class='list-group-item d-flex justify-content-between align-items-center' >" +
                            data[index].nome +
                            "</li>";

                        $('#listSchoolSubjectsStatic').append(item2).fadeIn();

                    }
                }
                loadingSchoolSubjectsStatic()
            },
            beforeSend: function beforeSend() {
                $('#loadinglistSchoolSubjects').show();
                $('#listSchoolSubjects').empty();
            },
            complete: function complete() {
                $('#loadinglistSchoolSubjects').hide();
            }
        });
    };

    $('#btnLoadingSchoolSubjects').click(function () {
        loadingSchoolSubjects();
    });

    $("#listSchoolSubjects").sortable("disabled");

    $(".add-new").click(function () {

        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/schoolsubject/teacher/" + $('meta[name="id"]').attr('content'),
            data: {subjects: $("#schoolsubjects :selected").val()},
            cache: true,
            success: function success(data) {
                loadingSchoolSubjects();
            },
            beforeSend: function beforeSend(data) {
            },
            complete: function complete(data) {
                loadingSchoolSubjects();
            }
        });


    });

    //

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


    let validaInfoPessoaId = function (condition) {
        let changeTipoPessoa = $("#tipo_pessoas_id option:selected").val();

        if (condition) {
            $('#cpf_cnpj').val('');

        }

        if (changeTipoPessoa === "1" || changeTipoPessoa == "2") {
            $('#cpf_cnpj').cpfcnpj({
                mask: true,
                validate: 'cpf',
                event: 'blur',
                handler: '#cpf_cnpj',
                ifValid: function (input) {
                    input.removeClass("error");
                },
                ifInvalid: function (input) {
                    input.addClass("error");
                }
            });
            $("#cpf_cnpj").mask("999.999.999-99", {placeholder: "___.___.___-__"});

            $('#nome').attr('required', 'required').show();


            $('#cpf_cnpj').attr('required', 'required').show();
            $('.rg').attr('required', 'required').show();
            $('.dataNascimento').attr('required', 'required').show();
            $('#rg').attr('required', 'required').show();
            $('#dataNascimento').attr('required', 'required').show();
            $('#familySituation').attr('required', 'required').show();
            $('.familySituation').attr('required', 'required').show();
            $('#citizenship').attr('required', 'required').show();
            $('.citizenship').attr('required', 'required').show();
            $('#sexo').attr('required', 'required').show();
            $('.sexo').attr('required', 'required').show();
            $('#zipCode').attr('required', 'required').show();
            $('#number').attr('required', 'required').show();

            //Funcionario
            $('#setorFuncionario').removeAttr('required', 'required').val('').hide();
            $('#funcaoFuncionario').removeAttr('required', 'required').val('').hide();
            $('#data_admissao').removeAttr('required', 'required').val('').hide();
            $('#numero_ctps').removeAttr('required', 'required').val('').hide();
            $('#ctps_serie').removeAttr('required', 'required').val('').hide();
            $('#pis').removeAttr('required', 'required').val('').hide();
            $('#salario_base').removeAttr('required', 'required').val('').hide();
            $('#vale_refeicao').removeAttr('required', 'required').val('').hide();
            $('#vale_transporte').removeAttr('required', 'required').val('').hide();
            $('#bronquite').removeAttr('required', 'required').val('').hide();
            $('#faltadear').removeAttr('required', 'required').val('').hide();
            $('#diabetes').removeAttr('required', 'required').val('').hide();
            $('#convulsao').removeAttr('required', 'required').val('').hide();
            $('#alergia').removeAttr('required', 'required').val('').hide();
            $('#contato_emergencial').removeAttr('required', 'required').val('').hide();

            //    Funcionario
            $('#razaoSocial').removeAttr('required', 'required').val('').hide();
            $('#inscricaoEstadual').removeAttr('required', 'required').val('').hide();

            //Variação de labels
            $('.cpfCnpj').text("CPF");
            $('#nomeLabel').text("Nome Completo");

            $('#tipoEmpresa').hide();
            $('#dadosFuncionario').hide();
        }

        if (changeTipoPessoa === "4") {
            $('#cpf_cnpj').cpfcnpj({
                mask: true,
                validate: 'cpf',
                event: 'blur',
                handler: '#cpf_cnpj',
                ifValid: function (input) {
                    input.removeClass("error");
                },
                ifInvalid: function (input) {
                    input.addClass("error");
                }
            });
            $("#cpf_cnpj").mask("999.999.999-99", {placeholder: "___.___.___-__"});

            $('#nome').attr('required', 'required').show();
            $('#cpf_cnpj').attr('required', 'required').show();
            $('.rg').attr('required', 'required').show();
            $('.dataNascimento').attr('required', 'required').show();
            $('#rg').attr('required', 'required').show();
            $('#dataNascimento').attr('required', 'required').show();
            $('#familySituation').attr('required', 'required').show();
            $('.familySituation').attr('required', 'required').show();
            $('#citizenship').attr('required', 'required').show();
            $('.citizenship').attr('required', 'required').show();
            $('#sexo').attr('required', 'required').show();
            $('.sexo').attr('required', 'required').show();
            $('#zipCode').attr('required', 'required').show();
            $('#number').attr('required', 'required').show();
            $('#salario_base').maskMoney({defaultZero: false});
            $('#vale_refeicao').maskMoney({defaultZero: false});
            $('#vale_transporte').maskMoney({defaultZero: false});
            $('#contato_emergencial').mask("(99) 9 9999-9999", {placeholder: "(__) _ ____-______"});
            $("#data_admissao").mask("99/99/9999", {placeholder: "__/__ /___"});

            //Funcionario
            $('#setorFuncionario').attr('required', 'required').show();
            $('#funcaoFuncionario').attr('required', 'required').show();
            $('#data_admissao').attr('required', 'required').show();
            $('#numero_ctps').attr('required', 'required').show();
            $('#ctps_serie').attr('required', 'required').show();
            $('#pis').attr('required', 'required').show();
            $('#salario_base').attr('required', 'required').show();
            $('#vale_refeicao').attr('required', 'required').show();
            $('#vale_transporte').attr('required', 'required').show();
            $('#bronquite').attr('required', 'required').show();
            $('#faltadear').attr('required', 'required').show();
            $('#diabetes').attr('required', 'required').show();
            $('#convulsao').attr('required', 'required').show();
            $('#alergia').attr('required', 'required').show();
            $('#contato_emergencial').attr('required', 'required').show();

            //    Funcionario
            $('#razaoSocial').removeAttr('required', 'required').val('').hide();
            $('#inscricaoEstadual').removeAttr('required', 'required').val('').hide();

            //Variação de labels
            $('.cpfCnpj').text("CPF");
            $('#nomeLabel').text("Nome Completo");

            $('#tipoEmpresa').hide();
            $('#dadosFuncionario').show();
        }

        if (changeTipoPessoa === "5") {
            $('#cpf_cnpj').cpfcnpj({
                mask: true,
                validate: 'cnpj',
                event: 'blur',
                handler: '#cpf_cnpj',
                ifValid: function (input) {
                    input.removeClass("error");
                },
                ifInvalid: function (input) {
                    input.addClass("error");
                }
            });

            $("#cpf_cnpj").mask("99.999.999/9999-99", {placeholder: "__.___.___/____-__"});

            $('#nome').attr('required', 'required').show();
            $('#cpf_cnpj').attr('required', 'required').show();
            $('.rg').removeAttr('required', 'required').val('').hide();
            $('.dataNascimento').removeAttr('required', 'required').val('').hide();
            $('#rg').removeAttr('required', 'required').val('').hide();
            $('#dataNascimento').removeAttr('required', 'required').val('').hide();
            $('#familySituation').removeAttr('required', 'required').val('').hide();
            $('.familySituation').removeAttr('required', 'required').val('').hide();
            $('#citizenship').removeAttr('required', 'required').val('').hide();
            $('.citizenship').removeAttr('required', 'required').val('').hide();
            $('#sexo').removeAttr('required', 'required').val('').hide();
            $('.sexo').removeAttr('required', 'required').val('').hide();
            $('#zipCode').attr('required', 'required').show();
            $('#number').attr('required', 'required').show();

            //Funcionario
            $('#setorFuncionario').removeAttr('required', 'required').val('').hide();
            $('#funcaoFuncionario').removeAttr('required', 'required').val('').hide();
            $('#data_admissao').removeAttr('required', 'required').val('').hide();
            $('#numero_ctps').removeAttr('required', 'required').val('').hide();
            $('#ctps_serie').removeAttr('required', 'required').val('').hide();
            $('#pis').removeAttr('required', 'required').val('').hide();
            $('#salario_base').removeAttr('required', 'required').val('').hide();
            $('#vale_refeicao').removeAttr('required', 'required').val('').hide();
            $('#vale_transporte').removeAttr('required', 'required').val('').hide();
            $('#bronquite').removeAttr('required', 'required').val('').hide();
            $('#faltadear').removeAttr('required', 'required').val('').hide();
            $('#diabetes').removeAttr('required', 'required').val('').hide();
            $('#convulsao').removeAttr('required', 'required').val('').hide();
            $('#alergia').removeAttr('required', 'required').val('').hide();
            $('#contato_emergencial').removeAttr('required', 'required').val('').hide();

            //    Funcionario
            $('#razaoSocial').attr('required', 'required').show();
            $('#inscricaoEstadual').attr('required', 'required').show();

            //Variação de labels
            $('.cpfCnpj').text("CNPJ");
            $('#nomeLabel').text("Nome Fantasia");

            $('#tipoEmpresa').show();
            $('#dadosFuncionario').hide();
        }
    }

    validaInfoPessoaId();


    $('#tipo_pessoas_id').change(function (action) {
        validaInfoPessoaId(true);
    });

    $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__ /___"});

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

    $('#state').select2({
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
        processing: true,
        serverSide: true,
        ajax: 'pessoas/getBasicData',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nome', name: 'nome'},
            {data: 'cpf_cnpj', name: 'cpf_cnpj'},
            {data: 'status', name: 'status'},
            {data: 'tipo_pessoas_id', name: 'tipo_pessoas_id'},
            {data: 'link', name: 'link', orderable: false, searchable: false}

        ],

        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                        column.search(val ? val : '', true, false).draw();
                    });
            });
        },
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
            }
        });
    });


    $('.listphone').click(function () {

        let ids = $(this).get(0).id.split('-');

        $.ajax({
            async: true,
            url: '/pessoas/phoneMain?idPessoa=' + ids[0] + '&idPhone=' + ids[1],
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
            }
        });
    })


    $('#schoolsubjects').select2({
        width: '100%',
        language: 'pt-BR'
    });

    $('#yearclass tr').click(function () {
        window.location = $(this).data('url');
        return false;
    });

    var analisaAlteraDados = function (idCampo, valor) {
        if (valor) {
            $('#' + idCampo).prop("checked", true);
        } else {
            $('#' + idCampo + 'False').prop("checked", true);
        }
    }

    var carregaHealthInformations = function (data) {
        var id = $('.healthInformations').get(0).id;
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/healthInformations/" + id,
            cache: true,
            success: function (data) {
                if (data.errors) {
                    $('#errorsHealthInformations').show();
                    } else {
                    $('.healthInformations').show();
                    $('#bronquite').text(data.bronquite ? "Sim" : "Não");
                    analisaAlteraDados('bronquiteField', data.bronquite);

                    $('#faltadear').text(data.faltadear ? "Sim" : "Não");
                    analisaAlteraDados('faltadearField', data.faltadear);

                    $('#diabete').text(data.diabete ? "Sim" : "Não");
                    analisaAlteraDados('diabeteField', data.diabete);

                    $('#convulsao').text(data.convulsao ? "Sim" : "Não");
                    analisaAlteraDados('convulsaoField', data.convulsao);
                }
                window.location.reload();

            },
            beforeSend: function () {
                $('#loadingHealthInformations').show();
            },
            complete: function () {
                $('#loadingHealthInformations').hide();
            }
        });
    };

    $('#buttonAtualizarHealthInformations').on('click', function () {
        var id = $('.numeroResponsavel').get(0).id;

        $.ajax({
            async: true,
            url: '/healthInformations/' + id,
            type: 'POST',
            data: $('#formHealthInformations').serialize(),
            dataType: 'JSON',
            success: function (data) {
                carregaHealthInformations();
                $('#editarHealthInformations').modal('hide');
            },
            beforeSend: function (before) {
                $('#loadingAtualizaHealthInformations').show('show');
            },
            complete: function (complete) {
                $('#loadingAtualizaHealthInformations').hide('hide');
            },
            error: function (error) {
                $('#loadingAtualizaHealthInformations').hide('hide');
                console.log(error);
            }
        });
    });

});
