"use strict";
$(document).ready(function () {
    $("textarea.editor-cls").wysihtml5();
    $("#summernote").summernote();
    $('.note-link-url').on('keyup', function() {
        if($('.note-link-text').val() != '') {
            $('.note-link-btn').attr('disabled', false).removeClass('disabled');
        }
    });
    $("textarea#split_editor").trumbowyg();
    jQuery.trumbowyg.langs.fr = {
        _dir: "ltr", // This line is optionnal, but usefull to override the `dir` option

        bold: "Gras",
        close: "Fermer"
    };

    if ($(window).width() < 700) {
        $("<br>").insertAfter(".summer_noted .dropdown-menu li .btn-group");
    }

});