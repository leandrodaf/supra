"use strict";

$(document).ready(function () {

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

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '5%' // optional
    });

    $('#criarPessoa').validator();

});
