"use strict";

$(document).ready(function () {

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
                    console.log(data);

                    let inicio = formatDate(new Date(data.start_date));
                    let fim = formatDate(new Date(data.end_date));


                    $('#activitiesInfoModal #title').text(data.title);
                    $('#activitiesInfoModal #dates').text(inicio + ' há ' + fim);


                    $('#listAlunos tbody')
                        .empty();

                    for (var k in data.aluno) {

                        let row = '<tr><td>' + data.aluno[k].nome_aluno + '</td> <td><span class="badge ' + validationColorLabel(data.aluno[k].pivot.media) + '">' + data.aluno[k].pivot.media + '%' + '</span></td> <td class="text-center"><i class="fa fa-trash"></i></td></tr>';

                        $('#listAlunos tbody')
                            .append(row);
                    }

                    //Append docs
                    $('#listDocs tbody')
                        .empty();

                    for (var k in data.fileentry) {

                        let row = '<tr><td>' + data.fileentry[k].original_filename + '</td> <td>' + formatDate(new Date(data.fileentry[k].created_at)) + '</td> <td>' + '.' + data.fileentry[k].extension + '</td> </tr>';
                        $('#listDocs tbody')
                            .append(row);
                    }

                },
                beforeSend: function beforeSend(data) {
                },
                complete: function complete(data) {
                },
                error: function (error) {
                    console.log(error)
                }


            });
        }


        $('#activitiesInfoModal').on('show.bs.modal', function (e) {
            var activitieId = $(e.relatedTarget).data('id');

            loadActivities(activitieId);

        });

    }
);
