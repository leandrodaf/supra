"use strict";
$(document).ready(function() {
    //=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
    //=================end of Preloader===========//
    var textfield = $("input[name=user]");
    $('button[type="submit"]').on('click', function(e) {
        e.preventDefault();
        //little validation just to check username
        if (textfield.val() != "") {
            //$("body").scrollTo("#output");
            $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back Addison").removeClass(' alert-danger');
            $("input").css({
                "height":"0",
                "padding":"0",
                "margin":"0",
                "opacity":"0"
            });
            //change button text
            $('.user-name').html('Unlocked');
            $('button[type="submit"]').html("CONTINUE")
                .addClass("btn-submit").on('click', function(){
                window.location.href = 'index.html';
            });

            //show avatar
            $(".avatar").css({
                "background-image": "url('img/authors/avatar1.jpg')"
            });
        } else {
            //profile pic error animation
            $(".avatar").addClass('error_anim');
            setTimeout(function() {
                $(".avatar").removeClass('error_anim');
            }, 400);
        }
    });
});
