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
                type: "GET",
                dataType: "json",
                url: "/alunos/getInfoUser/" + id.id,
                cache: true,
                success: function (data) {
                    $('#nomedynamic').text(data.nome);
                    $('#cpfdynamic').text(data.cpf_cnpj);
                    $('#sexodynamic').text(data.sexo);
                    $('#rgdynamic').text(data.rg);
                    $('#nascimentodynamic').text(data.dataNascimento);

                    if (data.status == 1) {
                        $('#statusdynamic').text("Ativo");
                    } else {
                        $('#statusdynamic').text("Inativo");
                    }

                    $('#nacionalidadedynamic').text(data.nacionalidade);
                    $('#estadoCivildynamic').text(data.estadoCivil);

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


        var carregaDadosMedicos = function (data) {
            var id = $('.dadosMedicos').get(0).id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/dadosMedicos/" + id,
                cache: true,
                success: function (data) {
                    if (data.errors) {
                        $('#errorsDadosMedicos').show();
                    } else {
                        $('.dadosMedicos').show();
                        $('#sarampo').text(data.sarampo ? "Sim" : "Não");
                        $('#rubeola').text(data.rubeola ? "Sim" : "Não");
                        $('#catapora').text(data.catapora ? "Sim" : "Não");
                        $('#escarlatina').text(data.escarlatina ? "Sim" : "Não");
                        $('#outradoenca').text(data.outradoenca);
                        $('#bronquite').text(data.bronquite ? "Sim" : "Não");
                        $('#faltadear').text(data.faltadear ? "Sim" : "Não");
                        $('#diabete').text(data.diabete ? "Sim" : "Não");
                        $('#refluxo').text(data.refluxo ? "Sim" : "Não");
                        $('#convulsao').text(data.convulsao ? "Sim" : "Não");
                        $('#medicamentotomar').text(data.medicamentotomar);
                        $('#alergia').text(data.alergia ? "Sim" : "Não");
                        $('#sintomasalergia').text(data.sintomasalergia);

                        $('#visao').text(data.visao ? "Sim" : "Não");
                        $('#fala').text(data.fala ? "Sim" : "Não");
                        $('#audicao').text(data.audicao ? "Sim" : "Não");
                        $('#edfisica').text(data.edfisica ? "Sim" : "Não");
                        $('#outradeficienciax').text(data.outradeficienciax);
                    }

                },
                beforeSend: function () {
                    $('#loadingDadosMedicos').show();
                },
                complete: function () {
                    $('#loadingDadosMedicos').hide();
                }
            });
        };

        if($('.dadosMedicos').length){

            $('.dadosMedicos').on(carregaDadosMedicos());

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

    }
);