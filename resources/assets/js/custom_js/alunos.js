"use strict";

$(document).ready(function () {

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

    // let adicionarDiasData = function (dias) {
    //     let hoje = new Date();
    //     let dataVenc = new Date(hoje.getTime() + (dias * 24 * 60 * 60 * 1000));
    //     return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
    // };

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

                    if(data.medicamentotomar == null) {
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        }
    });


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
                            text: item.nome + ' - ' + item.cpf_cnpj + ' (' + item.tipo_pessoas_id != 2 ? "Autorizado" : "Responsável" + ')',
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


    let checkStatusTypePerson = function (value) {
        return
    }


    $('#buttonAtualizarHealthInformations').on('click', function () {
        // var id = $('.numeroResponsavel').get(0).id;

        $.ajax({
            async: true,
            url: '/healthInformations/1',
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