"use strict";

$(document).ready(function () {


    let reduzirDiasData = function (dias) {
        let hoje = new Date();
        let dataVenc = new Date(hoje.getTime() - (dias * 24 * 60 * 60 * 1000));
        return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    };


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


    $("#data_nascimento_aluno").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('#data_nascimento_aluno').datepicker({
        autoclose: true,
        startDate: reduzirDiasData(2192),
        locale: 'pt-BR',
        format: 'dd/mm/yyyy',
        orientation: 'bottom auto'
    });


    $('.informacoesTitulo').tooltip();


    let validateEmail = function (email) {
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

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

    $('#phone').select2({
        width: '100%',
        tags: true,
        tokenSeparators: [',', ';', ' '],
        placeholder: "Digite os emails",
        createTag: function (term, data) {
            let value = term.term;
            return {
                id: value,
                text: value
            };
        }
    });

    // let adicionarDiasData = function (dias) {
    //     let hoje = new Date();
    //     let dataVenc = new Date(hoje.getTime() + (dias * 24 * 60 * 60 * 1000));
    //     return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    // };


    $('#tipo_pessoas_id').select2();
    $('#sexo_aluno').select2();

    $('#formularioAlunos').validator();
    $('#formularioResponsaveis').validator();

    // $('input').iCheck({
    //     checkboxClass: 'icheckbox_square-blue',
    //     radioClass: 'iradio_square-blue',
    //     increaseArea: '5%'
    // });

    $("#rg_aluno").mask("99.999.999-9");

    $('.verInfo').click(function (data) {
        var id = this;
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/pessoas/getInfoUser/" + id.id,
            cache: true,
            success: function (data) {
                $('#nomedynamic').text(data.nome);
                $('#cpfdynamic').text(data.cpf_cnpj);
                $('#sexodynamic').text(data.sexo);
                $('#rgdynamic').text(data.rg);
                $('#nascimentodynamic').text(data.dataNascimento);
                $('#redirectdynamic').attr('href', '/pessoas/' + data.id);

                if (data.status == 1) {
                    $('#statusdynamic').text("Ativo");
                } else {
                    $('#statusdynamic').text("Inativo");
                }

                $('#citizenshipdynamic').text(data.citizenship);
                $('#familySituationdynamic').text(data.familySituation);

                $('#dataNascimentodynamic').text(data.dataNascimento);
            },
            beforeSend: function () {
                $('#loadingResponsavel').show();
            },
            complete: function () {
                $('#loadingResponsavel').hide();
            }
        });
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
                    $('#sarampo').text(data.sarampo ? "Sim" : "Não");
                    analisaAlteraDados('sarampoField', data.sarampo);

                    $('#rubeola').text(data.rubeola ? "Sim" : "Não");
                    analisaAlteraDados('rubeolaField', data.rubeola);

                    $('#catapora').text(data.catapora ? "Sim" : "Não");
                    analisaAlteraDados('cataporaField', data.catapora);

                    $('#escarlatina').text(data.escarlatina ? "Sim" : "Não");
                    analisaAlteraDados('escarlatinaField', data.escarlatina);
                    if (data.outradoenca == null) {
                        $('.outrasdoencas').hide()
                    } else {
                        $('#outradoenca').text(data.outradoenca);
                        $('#outradoencaField').val(data.outradoenca);
                    }

                    $('#bronquite').text(data.bronquite ? "Sim" : "Não");
                    analisaAlteraDados('bronquiteField', data.bronquite);

                    $('#faltadear').text(data.faltadear ? "Sim" : "Não");
                    analisaAlteraDados('faltadearField', data.faltadear);

                    $('#diabete').text(data.diabete ? "Sim" : "Não");
                    analisaAlteraDados('diabeteField', data.diabete);

                    $('#refluxo').text(data.refluxo ? "Sim" : "Não");
                    analisaAlteraDados('refluxoField', data.refluxo);

                    $('#convulsao').text(data.convulsao ? "Sim" : "Não");
                    analisaAlteraDados('convulsaoField', data.convulsao);

                    if (data.medicamentotomar == null) {
                        $('.medicamosTomar').hide()
                    } else {
                        $('#medicamentotomar').text(data.medicamentotomar);
                        $('#medicamentotomarField').val(data.medicamentotomar);
                    }

                    $('#alergia').text(data.alergia ? "Sim" : "Não");
                    analisaAlteraDados('alergiaField', data.alergia);

                    if (data.sintomasalergia == null) {
                        $('.sintomasalergia').hide()
                    } else {
                        $('#sintomasalergia').text(data.sintomasalergia);
                        $('#sintomasalergiaField').val(data.sintomasalergia);
                    }

                    $('#visao').text(data.visao ? "Sim" : "Não");
                    analisaAlteraDados('visaoField', data.visao);

                    $('#fala').text(data.fala ? "Sim" : "Não");
                    analisaAlteraDados('falaField', data.fala);

                    $('#audicao').text(data.audicao ? "Sim" : "Não");
                    analisaAlteraDados('audicaoField', data.audicao);

                    $('#edfisica').text(data.edfisica ? "Sim" : "Não");
                    analisaAlteraDados('edfisicaField', data.edfisica);

                    if (data.outradeficienciax == null) {
                        $('.outrasDeficiencias').hide()
                    } else {
                        $('#outradeficienciax').text(data.outradeficienciax);
                        $('#outradeficienciaxField').val(data.outradeficienciax);
                    }
                }

            },
            beforeSend: function () {
                $('#loadingHealthInformations').show();
            },
            complete: function () {
                $('#loadingHealthInformations').hide();
            }
        });
    };

    if ($('.healthInformations').length) {

        $('.healthInformations').on(carregaHealthInformations());

    }


    $('input[name="flg_irmaos_aluno"]').on('ifClicked', function (event) {
        if (this.value == 1)
            $('#qtdAlunos').removeAttr("hidden", "hidden");
        else
            $('#qtdAlunos').attr("hidden", "hidden");
        $('input[name="qtd_irmaos_aluno"]').val("");
    });

    $('#alunos-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'alunos/getBasicData',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'foto_modificada', name: 'foto_modificada', orderable: false, searchable: false},
            {data: 'nome_aluno', name: 'nome_aluno'},
            {data: 'rg_aluno', name: 'rg_aluno'},
            {data: 'sexo_aluno', name: 'sexo_aluno'},
            {data: 'data_nascimento_aluno', name: 'data_nascimento_aluno'},
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


    let validatipoUser = function (data) {
        if (data === 2) {
            return " (Responsável)";
        } else {
            return " (Autorizado)";
        }
    };

    $('#responsavel').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um responsável',
        "language": "pt-BR",
        ajax: {
            async: true,
            url: '/pessoas/getAjax',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nome + ' - ' + item.cpf_cnpj + validatipoUser(item.tipo_pessoas_id),
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


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


    $('#telefoneAluno').select2({
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


    $('.listEmail').click(function () {

        let ids = $(this).get(0).id.split('-');

        $.ajax({
            async: true,
            url: '/alunos/emailMain?idAluno=' + ids[0] + '&idEmail=' + ids[1],
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
    });


    $('.listphone').click(function () {

        let ids = $(this).get(0).id.split('-');

        $.ajax({
            async: true,
            url: '/alunos/phoneMain?idAluno=' + ids[0] + '&idPhone=' + ids[1],
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


    $('[data-toggle="tooltip"]').tooltip();


    $('#yearclass tr').click(function () {
        window.location = $(this).data('url');
        return false;
    });

});