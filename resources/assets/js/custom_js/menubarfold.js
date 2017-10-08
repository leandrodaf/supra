"use strict";
$(document).ready(function () {
//leftmenu init
    $(function () {
        $('.menu-dropdown>a').off("click").on("click", function (e) {
            e.preventDefault();
        });
    });

    $("#menu").find('ul>.menu-dropdown').hover(function () {
        var sideoffset = $(".sidebar").offset();
        var submenuoffset = $(this).children("ul").offset();
        if (sideoffset.top + $(".sidebar").height() < submenuoffset.top + $(this).children("ul").height()) {
            $(this).children("ul").addClass("sidebarbottom");
        }
    })
});
