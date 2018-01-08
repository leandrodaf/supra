"use strict";

$(document).ready(function () {

    if ($(".validatecpf").length) {
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
    }


    $('#estado').select2({
        width: '100%'
    });

    $('#nacionalidade').select2({
        width: '100%'
    });
    $('#estadoCivil').select2({
        width: '100%'
    });
    $('#sexo').select2({
        width: '100%'
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

    $("#cep").mask("99999-999", {placeholder: "_____-___"});
    $("#rg").mask("99.999.999-99", {placeholder: "__.___.___-_"});
    $("#cpf_cnpj").mask("999.999.999-99", {placeholder: "___.___.___-__"});

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

});
