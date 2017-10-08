"use strict";
$(document).ready(function () {
    //=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
    //=================end of Preloader===========//

    $('.reset_validator').bootstrapValidator({
        fields: {
            password: {
                validators: {

                    notEmpty: {
                        message: 'Enter new password'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm your new password'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password is not matching the above one'
                    }
                }
            }
        }
    });

});