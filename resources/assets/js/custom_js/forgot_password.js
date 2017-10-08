'use strict';
$(document).ready(function () {
//=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
//=================end of Preloader===========//

    $("#forgot_password").bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    });

    var input_field = $("input[name=email]");

    $('button[type="submit"]').on('click', function (e) {
        e.preventDefault();

        if (input_field.val() != "") {
            $(".enter_email").addClass("hidden");
            $(".check_email").removeClass("hidden");
            $('#email, .signup-signin').addClass('hidden');
            $('.submit-btn').addClass('animated fadeInUp');
            $('button[type="submit"]').html("Reset Password")
                .removeClass("btn-primary btn-block")
                .addClass("btn-success").on('click', function () {
                window.location.href = 'reset_password.html';
            });
        } else {
            var error_msg = "<p>Sorry, Enter Your Registered email</p>";
            $(".enter_email").addClass("err-text animated fadeInUp").html(error_msg);
        }

    });

    $("#email").on('keypress focus', function () {
        var element = 'Enter your Registered email';
        $(".enter_email").removeClass("text-danger animated fadeInUp").html(element);
    });


});