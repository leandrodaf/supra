"use strict";

$(document).ready(function () {
    $('#messageSecretariaTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dash/secretaria/getBasicData',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'exibition', name: 'exibition'},
            {data: 'notification_type_id', name: 'notification_type_id'},
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


    let typeNotification = (type) => {

        switch (type) {
            case 1:
                return 'fa-money';
                break;
            case 2:
                return 'fa-file-text-o';
                break;
            case 3:
                return 'fa-graduation-cap';
                break;
            default:
                return 'fa-money';
        }
    }


    let getCall = function (id) {

        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/notification/" + id,
            cache: true,
            success: function success(data) {
                $('#modal-doc-notifciation .modal-title').text(data.title);
                $('.date-notification').text(new Date(data.exibition).toISOString().substr(0, 10).split('-').reverse().join('/'));
                $('.time-created_at').text(new Date(data.created_at).toISOString().substr(0, 10).split('-').reverse().join('/'));
                $('.href-aluno-info').attr('href', "/alunos/" + data.aluno[0].id);
                $('.href-aluno-info').text(data.aluno[0].nome_aluno);
                $('.timeline-body').html(data.description);
                $('#iconetypenotification').addClass(typeNotification(data.type[0].id));
                $('#title-info').text("- " + data.title);
                $('.data-notification').text(data.description);
            },
            beforeSend: function beforeSend(data) {
            },
            complete: function complete(data) {
            },
            error: function (error) {
            }
        });
    };

    $('#modal-doc-notifciation').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        getCall(id)
    });
});
