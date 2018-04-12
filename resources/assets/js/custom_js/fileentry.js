"use strict";

$(document).ready(function () {
    $('#alunos-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'file/getBasicData',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'original_filename', name: 'original_filename'},
            {data: 'extension', name: 'extension'},
            {data: 'created_at', name: 'created_at'},
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
});