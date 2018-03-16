"use strict";

$(document).ready(function () {

    $('#media').priceFormat({
        prefix: '',
        thousandsSeparator: '',
        clearPrefix: true
    });

    $('#activitieAluno').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um aluno',
        language: 'pt-BR',
        ajax: {
            url: '/class/getAlunos?id=' + $('meta[name="id-class"]').attr('content'),
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nome_aluno,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#activitiesClass').validator();

    $(".date").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('.date').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });

    let formatDate = function (date) {
        var dataFormatada = ("0" + date.getDate()).substr(-2) + "/"
            + ("0" + (date.getMonth() + 1)).substr(-2) + "/" + date.getFullYear();

        return dataFormatada;
    };

    let validationColorLabel = function (media) {
        if (media >= 70) {
            return 'bg-green';
        } else if (media < 70 && media > 50) {
            return 'bg-yellow';
        } else if (media <= 50) {
            return 'bg-red';
        }
    };

    let loadActivities = function (id) {

        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/activitie/" + id,
            cache: true,
            success: function success(data) {
                let inicio = formatDate(new Date(data.start_date));
                let fim = formatDate(new Date(data.end_date));

                $('#activitiesInfoModal #title').text(data.title);
                $('#activitiesInfoModal #dates').text(inicio + ' há ' + fim);
                $('#removeActivities').removeAttr("data-activitie");

                $('#listAlunos tbody').empty();

                for (var k in data.aluno) {
                    let row = '<tr><td>' + data.aluno[k].nome_aluno + '</td> <td><span class="badge ' + validationColorLabel(data.aluno[k].pivot.media) + '">' + data.aluno[k].pivot.media + '%' + '</span></td> <td class="text-center"><a class="unsyncAluno" href="#test"><i class="fa fa-trash"></i></a> </td></tr>';
                    $('#listAlunos tbody').append(row);
                }

                //Append docs
                $('#listDocs tbody').empty();

                for (var k in data.fileentry) {

                    let row = '<tr><td>' + data.fileentry[k].original_filename + '</td> <td style="text-align: center">' + formatDate(new Date(data.fileentry[k].created_at)) + '</td> <td style="text-align: center">' + '.' + data.fileentry[k].extension + '</td><td style="text-align: center"><a href="/disk/file?file=' + data.fileentry[k].filename + '" ><i class="fa fa-download"></i></td> </tr>';
                    $('#listDocs tbody').append(row);
                }

            },
            beforeSend: function beforeSend(data) {
                $('#listAluno').show();
            },
            complete: function complete(data) {
                $('#listAluno').hide();
            },
            error: function (error) {

            }

        });
    };


    let setValueIdActivities = function (id) {
        $('#removeActivities').data("data-activitie", id);
    };


    $('#activitiesInfoModal').on('show.bs.modal', function (e) {
        var activitieId = $(e.relatedTarget).data('id');
        loadActivities(activitieId);
        $('#removeActivities').val(activitieId);
    });


    $('#removeActivities').click(function () {
        $('#activitiesInfoModal').modal("hide");
        $('#deleteActivities').modal("show");
    });

    $('#deleteActivitiesButton').click(function () {
        $.ajax({
            async: true,
            type: "DELETE",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/activitie/" + $('#removeActivities').val(),
            cache: true,
            success: function success(data) {
                console.log(data);
                $('#deleteActivities').modal('hide');
                $('#alertDeleteActivities').removeClass('fa-refresh fa-spin');
                $('#alertDeleteActivities').addClass('fa-exclamation');
            },
            beforeSend: function beforeSend(data) {
                $('#alertDeleteActivities').removeClass('fa-exclamation');
                $('#alertDeleteActivities').addClass('fa-refresh fa-spin');
            },
            complete: function complete(data) {
                $('[data-id="' + $('#removeActivities').val() + '"]').slideUp().remove();
            },
            error: function (error) {
                console.log(error);

                $('#alertDeleteActivities').removeClass('fa-refresh fa-spin');
                $('#alertDeleteActivities').addClass('fa-exclamation');
            }
        });
    });

    $('#activitieAluno').on("select2:select", function (e) {
        let aluno = $('#activitieAluno');

        if (!(typeof aluno.val() == "undefined") && aluno.val() != '') {
            $('#media').removeAttr('disabled', 'disabled');
            $('#incluirAlunoActivitie').removeAttr('disabled', 'disabled');
        } else {
            $('#media').attr('disabled', 'disabled');
            $('#incluirAlunoActivitie').attr('disabled', 'disabled');

        }
    });

    $('#activitieAluno').on("select2:unselecting instead", function (e) {
        $('#media').attr('disabled', 'disabled');
        $('#media').val('');
        $('#incluirAlunoActivitie').attr('disabled', 'disabled');
    });


    $('#incluirAlunoActivitie').click(function () {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/activitie/" + $('#removeActivities').val() + '/pessoa',
            data: {
                idAluno: $("#activitieAluno :selected").val(),
                average: $('#media').val()
            },
            success: function (data) {
                loadActivities($('#removeActivities').val());
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


    $( ".unsyncAluno" ).click(function(){
        console.log("teste");
    })
});
