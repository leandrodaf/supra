"use strict";

$(document).ready(function () {

    $('#pessoa').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um funcionário',
        "language": "pt-BR",
        ajax: {
            async: true,
            url: '/pessoas/funcionario',
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


    $('#roles').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um funcionário',
        "language": "pt-BR"
    });

    $('#passwordchose').password({
        shortPass: 'A senha é muito curta',
        badPass: 'Fraca! Tente combinar letras e números',
        goodPass: 'Médio! tente usar caracteres especiais',
        strongPass: 'Senha forte',
        containsUsername: 'A senha contém o nome de usuário',
        enterPass: 'Digite sua senha',
        showPercent: false,
        showText: true,
        animate: true,
        animateSpeed: 'fast',
        username: false,
        usernamePartialMatch: true,
        minimumLength: 4
    });


    var form = $("#resetSenha").validate({
        rules: {
            passwordchose: "required",
            minlength: 4,
            password_again: {
                equalTo: "#passwordchose"
            }
        },
        messages: {
            password_again: {
                required: "Campo obrigatório",
                equalTo: "As senhas não coincidem"
            }
        }
    });

    $('#resetSenha').validator();


    $('#btnReset').click(function () {

        let senha = $('#passwordchose').val();

        if (form.valid() && senha.length > 0) {


            $.ajax({
                async: true,
                url: '/management/resetSenha/' + $('meta[name="id-user"]').attr('content'),
                type: 'POST',
                data: $('#resetSenha').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                success: function (data) {

                    $('#modal-senha').modal('hide');
                    $('#resetSenha')[0].reset();
                },
                beforeSend: function (before) {
                },
                complete: function (complete) {
                },
                error: function (error) {
                }
            });


        } else {
            return false;
        }
    });


});
