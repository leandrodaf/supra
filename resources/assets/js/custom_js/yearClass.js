"use strict";

$(document).ready(function () {


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

        console.log(minutesOfDay(startTime) != minutesOfDay(endTime));

        if (minutesOfDay(startTime) != minutesOfDay(endTime)) {
            if (minutesOfDay(endTime) < minutesOfDay(startTime)) {
                $('.fim').addClass('has-error');
                console.log("Erro no campo Final")
            } else {
                $('.fim').removeClass('has-error');
                $('.inicio').removeClass('has-error');
            }
        } else {
            $('.inicio').addClass('has-error');
        }
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
