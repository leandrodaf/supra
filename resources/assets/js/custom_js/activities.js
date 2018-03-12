"use strict";

$(document).ready(function () {

    $('#activitiesClass').validator();

    $(".date").mask("99/99/9999", {placeholder: "__/__ /___"});

    $('.date').datepicker({
        autoclose: true,
        locale: 'pt-BR',
        format: 'dd/mm/yyyy'
    });




    let loadActivities = function (id) {

    }


});
