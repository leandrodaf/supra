$(document).ready(function () {

    $("#data_message").mask("99/99/9999", {placeholder: "__/__ /___"});
    $("#phone").mask("(99)99999-9999", {placeholder: "()"});

    $('#data_message').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });


    //ajax para deletar
    $('.del').click(function (data,event) {
        event.preventDefalt();
        var id = this;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            url: "/home/destroy/" + data.id,
            cache: true,
            success: function success(data) {
               
                alert("Recado deletado com sucesso!");

            },
            beforeSend: function beforeSend() {
                $('#loadingResponsavel').show();
            },
            complete: function complete() {
                $('#loadingResponsavel').hide();
            }
        });
    });

    //ajax para trazer o dado para o modal
    $('.verMessage').click(function (data, event) {
       event.preventDefault();
        var id = this;
        $.ajax({
            async: true,
            type: "GET",
            dataType: "json",
            url: "/home/getInfoMessage/" + id,
            cache: true,
            success: function success(data) {
                $('#nome').text(data.nome);
                $('#data_message').text(data.data_message);
                // $('#dataNascimentodynamic').text(data.dataNascimento);
                // $('#rgdynamic').text(data.rg);
                // $('#redirectdynamic').attr('href', '/alunos/' + data.id);

            },
            beforeSend: function beforeSend() {
                $('#loadingResponsavel').show();
            },
            complete: function complete() {
                $('#loadingResponsavel').hide();
            }
        });
    });

    $.extend( jQuery.fn.dataTableExt.oSort, {
        "date-br-pre": function ( a ) {
         if (a == null || a == "") {
          return 0;
         }
         var brDatea = a.split('/');
         return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
        },
       
        "date-br-asc": function ( a, b ) {
         return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
       
        "date-br-desc": function ( a, b ) {
         return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
       } );
    $('#recados-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/home/messageGetBasicData',
            columns: [
                { data: 'id', name: 'id', visible: false }, 
                { data: 'nome', name: 'nome' }, 
                { data: 'data_message', name: 'data_message'},
                {data: 'link', name: 'link', orderable: false, searchable: false}
            ],
            

            initComplete: function initComplete() {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty()).on('change', function () {
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

