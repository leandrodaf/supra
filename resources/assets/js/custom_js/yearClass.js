"use strict";

$(document).ready(function () {
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
                            text: 'Sala: ' + item.nome_sala + 'Capacidade: ' + item.capacidade,
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
            url: '/alunos/availableAlunos',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: 'Sala: ' + item.nome_sala + 'Capacidade: ' + item.capacidade,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


});
