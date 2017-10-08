"use strict";
$(document).ready(function () {

// slimmenu initialisation
    $('#navigation').slimmenu({
        resizeWidth: '768',
        collapserTitle: 'Menu',
        animSpeed: 'medium',
        easingEffect: null,
        indentChildren: true,
        expandIcon: '<i class="fa ti-angle-right"></i>',
        collapseIcon: '<i class="fa ti-angle-down"></i>'
    });
    var  collapse_button = $('.collapse-button');
    $(document).click(function (e) {
        var container = $("#navigation,.menu-collapser");
        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0 && $(window).width() <= 768) // ... nor a descendant of the container
        {
            if($('#navigation').css("display")=="block"){
                collapse_button.click();
            }
        }
    });
    collapse_button.on('click',function (){
        if($('#navigation').css("display")=="none"){
            collapse_button.find('.icon-bar:first-child').addClass('rotate45deg');
            collapse_button.find('.icon-bar:nth-child(2)').addClass('display-none');
            collapse_button.find('.icon-bar:last-child').addClass('rotate-45deg');
        }else {
            collapse_button.find('.icon-bar:first-child').removeClass('rotate45deg');
            collapse_button.find('.icon-bar:nth-child(2)').removeClass('display-none');
            collapse_button.find('.icon-bar:last-child').removeClass('rotate-45deg');
        }
    });
});