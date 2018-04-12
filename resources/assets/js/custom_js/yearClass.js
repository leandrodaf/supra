"use strict";

$(document).ready(function () {
    $('.datepicker').datepicker({
        orientation: 'left bottom',
        autoclose: true,
        todayHighlight: true,
        locale: 'pt-BR',
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        daysOfWeekDisabled: [0, 6]
    }).on('changeDate', function (e) {
        $('#callAlterForm').attr('action', '/call/' + e.format());
        $('#date_callUpdate').val(e.format());
        $('#date_call').val(e.format());
        getCall(e.format());
    });


    let getCall = function (data) {

        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                idClass: $('meta[name="id-class"]').attr('content')
            },
            url: "/call/existCall/" + data,
            cache: true,
            success: function success(data) {

                if (data.length == 0) {
                    $('#makeCallButton').removeAttr('disabled', 'disabled');
                    $('#alteredCallButton').attr('disabled', 'disabled');
                } else {
                    $('#makeCallButton').attr('disabled', 'disabled');
                    $('#alteredCallButton').removeAttr('disabled', 'disabled');
                    $('#tableAlterCall  tbody').empty();
                }


                for (var k in data) {

                    let presenceChecked = data[k].pivot.presence == '1' ? 'checked="checked"' : '';
                    let presenceNotChecked = data[k].pivot.presence == '0' ? 'checked="checked"' : '';

                    let row = '' +
                        '   <tr>\n' +
                        '       <th scope="row">' + data[k].nome_aluno + '</th>\n' +
                        '       <td>\n' +
                        '           <label class="radio-inline">\n' +
                        '               <input type="radio" value="1" name="aluno[' + data[k].id + '][presence]" ' + presenceChecked + '>\n' +
                        '               Presença\n' +
                        '           </label>\n' +
                        '       </td>\n' +
                        '       <td>\n' +
                        '           <label class="radio-inline">\n' +
                        '               <input type="radio" value="0" name="aluno[' + data[k].id + '][presence]" ' + presenceNotChecked + '>\n' +
                        '               Falta\n' +
                        '           </label>\n' +
                        '       </td>\n' +
                        '   </tr>';

                    $('#tableAlterCall  tbody').append(row);
                }

            },
            beforeSend: function beforeSend(data) {
            },
            complete: function complete(data) {
            },
            error: function (error) {
            }
        });
    };


    $('#yearclass').validator();

    $('#yearClass').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: 'class/getBasicData',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'classroom_id', name: 'classroom_id'},
            {data: 'startTime', name: 'id'},
            {data: 'activeTime', name: 'activeTime'},
            {data: 'materia', name: 'materia'},
            {data: 'professor', name: 'professor'},
            {data: 'link', name: 'link', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        }
    });


    $('#classroom').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione uma sala',
        language: 'pt-BR',
        ajax: {
            url: '/classrooms/getAll',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nome_sala + ' - ' + item.capacidade +' Alunos',
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


    $("#activeTime").datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true,
        language: 'pt-BR'
    });

    var minutesOfDay = function (m) {
        return m.minutes() + m.hours() * 60;
    };


    $('.startTime').clockpicker({
        autoclose: true
    }).find('input').change(function () {

        var startTime = moment(this.value, 'HH:mm');
        var endTime = moment($('#endTime').val(), 'HH:mm');

        if (minutesOfDay(startTime) != minutesOfDay(endTime)) {
            if (minutesOfDay(startTime) > minutesOfDay(endTime)) {
                $('.inicio').addClass('has-error');

            } else {
                $('.inicio').removeClass('has-error');
                $('.fim').removeClass('has-error');
            }
        } else {
            $('.inicio').addClass('has-error');
        }

        if (minutesOfDay(startTime) > minutesOfDay(endTime)) {
            $('.inicio').addClass('has-error');
        } else {
            $('.inicio').removeClass('has-error');
            $('.fim').removeClass('has-error');
        }
    });

    $('.endTime').clockpicker({
        autoclose: true
    }).find('input').change(function () {
        var endTime = moment(this.value, 'HH:mm');
        var startTime = moment($('#startTime').val(), 'HH:mm');

        if (minutesOfDay(startTime) != minutesOfDay(endTime)) {
            if (minutesOfDay(endTime) < minutesOfDay(startTime)) {
                $('.fim').addClass('has-error');
            } else {
                $('.fim').removeClass('has-error');
                $('.inicio').removeClass('has-error');
            }
        } else {
            $('.inicio').addClass('has-error');
        }
    });


    $('#professor').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um professor',
        language: 'pt-BR',
        ajax: {
            url: '/pessoas/getAllTeatcher',
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

    $('#professor').on("select2:select", function (e) {
        let prof = $('#professor');

        if (!(typeof prof.val() == "undefined") && prof.val() != '') {
            $('#schoolsubjects').removeAttr('disabled', 'disabled');

            loadsubjects(prof.val());

        } else {
            $('#schoolsubjects').attr('disabled', 'disabled');
        }
    });


    let loadsubjects = function (id) {
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/pessoas/teatcherSchoolSubjects/" + id,
            cache: true,
            success: function success(data) {
                for (var k in data) {
                    $('#schoolsubjects')
                        .append('<option value="' + data[k].id + '">' + data[k].nome + '</option>')
                }
            },
            beforeSend: function beforeSend(data) {
            },
            complete: function complete(data) {
            }
        });
    };


    $('#professor').on("select2:unselecting instead", function (e) {
        $('#schoolsubjects')
            .empty()
            .append('<option>Selecione uma matéria</option>')
            .attr("selected", "selected")
            .attr('disabled', 'disabled');
    });


//    Gerenciamento de sala


    $('#aluno').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Selecione um aluno',
        language: 'pt-BR',
        ajax: {
            url: '/alunos/getAllAlunosClass/' + $('meta[name="id-class"]').attr('content'),
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


    $('#aluno').on("select2:select", function (e) {
        let prof = $('#aluno');

        if (!(typeof prof.val() == "undefined") && prof.val() != '') {
            $('#incluirAluno').removeAttr('disabled', 'disabled');

        } else {
            $('#incluirAluno').attr('disabled', 'disabled');
        }
    });

    $('#aluno').on("select2:unselecting instead", function (e) {
        $('#incluirAluno')
            .attr('disabled', 'disabled');
    });

    $('#incluirAluno').click(function () {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/class/syncAluno/" + $('meta[name="id-class"]').attr('content'),
            data: {aluno: $("#aluno :selected").val()},
            success: function (data) {
                loadAlunos();
            },
            beforeSend: function (before) {
            },
            complete: function (complete) {
            },
            error: function (error) {
            }
        });
    });

    let validationColorLabel = function (media) {
        if (media >= 70) {
            return 'bg-green';
        } else if (media < 70 && media > 50) {
            return 'bg-yellow';
        } else if (media <= 50) {
            return 'bg-red';
        }
    };


    let validationColorprogress = function (media) {
        if (media >= 70) {
            return 'progress-bar-success';
        } else if (media < 70 && media > 50) {
            return 'progress-bar-warning';
        } else if (media <= 50) {
            return 'progress-bar-danger';
        }
    };

    $(window).on("load", function () {

        let id = $('meta[name="id-class"]').attr('content');

        if (!(typeof id == "undefined") && id != '') {
            $.ajax({
                async: true,
                type: "GET",
                dataType: "json",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "/class/synchronizedStudents/" + $('meta[name="id-class"]').attr('content'),
                cache: true,
                success: function success(data) {

                    let rowEmpaty = '    <td colspan="5"><div class="alert alert-info">\n' +
                        '                    <strong>Atenção!</strong> Essa turma ainda não tem alunos cadastrados!.\n' +
                        '                </div></td>';

                    if (data.alunos.length == 0) {
                        $('#contentAlunos tbody').append(rowEmpaty);
                    }
                    for (var k in data.alunos) {
                        let row = ' <tr>\n' +
                            '            <td>' + data.alunos[k].nome_aluno + '</td>\n' +
                            '            <td>\n' +
                            '                <div class="progress progress-xs">\n' +
                            '                    <div class="progress-bar ' + validationColorprogress(data.alunos[k].media) + '" style="width: ' + data.alunos[k].media + '%"></div>\n' +
                            '                </div>\n' +
                            '            </td>\n' +
                            '            <td><span class="badge bg-red ' + validationColorLabel(data.alunos[k].media) + '">' + data.alunos[k].media + '</span></td>' +
                            '            <td style="text-align: center;" data-toggle="tooltip" data-placement="right" title="Desvincular aluno">' +
                            '                <i class="fa fa-plug" data-id="' + data.alunos[k].id + '"  style="color: #cb2027; cursor: pointer;"  data-toggle="modal" data-target="#unsync" data-aluno-id="' + data.alunos[k].id + '"></i>' +
                            '            </td>' +
                            '        </tr>';

                        $('#contentAlunos tbody')
                            .append(row);
                    }
                },
                beforeSend: function beforeSend(data) {
                    $('#loadingAlunos').show()
                },
                complete: function complete(data) {
                    $('#loadingAlunos').hide();
                }
            });
        }


    });

    let loadAlunos = function () {
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/class/synchronizedStudents/" + $('meta[name="id-class"]').attr('content'),
            cache: true,
            success: function success(data) {
                $('#contentAlunos tbody').empty();
                for (var k in data.alunos) {
                    let row = ' <tr>\n' +
                        '            <td>' + data.alunos[k].nome_aluno + '</td>\n' +
                        '            <td>' + data.school_subject[0].nome + '</td>\n' +
                        '            <td>\n' +
                        '                <div class="progress progress-xs">\n' +
                        '                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>\n' +
                        '                </div>\n' +
                        '            </td>\n' +
                        '            <td><span class="badge bg-red ' + validationColorLabel(data.alunos[k].media) + '">' + data.alunos[k].media + '%</span></td>' +
                        '            <td style="text-align: center;" data-toggle="tooltip" data-placement="right" title="Desvincular aluno">' +
                        '                <i class="fa fa-plug" data-id="' + data.alunos[k].id + '"  style="color: #cb2027; cursor: pointer;"  data-toggle="modal" data-target="#unsync" data-aluno-id="' + data.alunos[k].id + '"></i>' +
                        '            </td>' +
                        '        </tr>';

                    $('#contentAlunos tbody').append(row);
                }
            },
            beforeSend: function beforeSend(data) {
                $('#loadingAlunos').show()
            },
            complete: function complete(data) {
                $('#loadingAlunos').hide();
            }
        });
    };

    $('[data-toggle="tooltip"]').tooltip();


    $('#unsync').on('show.bs.modal', function (e) {
        var alunoId = $(e.relatedTarget).data('aluno-id');
        $(e.currentTarget).find('#unsyncButton').val(alunoId);
    });


    $('#unsyncButton').click(function () {
        detachStudents(this.value);
    });

    let detachStudents = function (id) {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/class/syncAluno",
            data: {
                idAluno: id,
                idClass: $('meta[name="id-class"]').attr('content')
            },
            success: function (data) {
                $('#unsync').modal('hide');
                $('#alertDelete').removeClass('fa-refresh fa-spin');
                $('#alertDelete').addClass('fa-exclamation');
            },
            beforeSend: function (before) {
                $('#alertDelete').removeClass('fa-exclamation');
                $('#alertDelete').addClass('fa-refresh fa-spin');
            },
            complete: function (complete) {
                loadAlunos();
            },
            error: function (error) {
                $('#alertDelete').removeClass('fa-refresh fa-spin');
                $('#alertDelete').addClass('fa-exclamation');
            }
        });


    };

});
