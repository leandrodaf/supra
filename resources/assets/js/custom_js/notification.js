"use strict";

$(document).ready(function () {
//    Notification feature

    $('#notifictionMessage').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['horizontalRule'],
            ['removeformat'],
        ],
        lang: 'pt_br',
        removeformatPasted: true,
        autogrow: true
    });

    $("#exibitionDate").datepicker({
        viewMode: "months",
        autoclose: true,
        daysOfWeekDisabled: [0, 6],
        todayHighlight: true,
        language: 'pt-BR'
    });

    if ($('meta[name="notification-title"]').attr('content').length > 0) {
        $('#notificationModal').modal().show();
    }
});
