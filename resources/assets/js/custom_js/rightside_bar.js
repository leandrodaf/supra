"use strict";
(function (window) {
    // Is Modernizr defined on the global scope
    var Modernizr = typeof Modernizr !== "undefined" ? Modernizr : false,
        // whether or not is a touch device
        isTouchDevice = Modernizr ? Modernizr.touch : !!('ontouchstart' in window || 'onmsgesturechange' in window),
        // Are we expecting a touch or a click?
        buttonPressedEvent = (isTouchDevice) ? 'touch' : 'click',
        clearui = function () {
            this.init();
        };
    // Initialization method
    clearui.prototype.init = function () {
        this.isTouchDevice = isTouchDevice;
        this.buttonPressedEvent = buttonPressedEvent;
    };
    clearui.prototype.getViewportHeight = function () {
        var docElement = document.documentElement,
            client = docElement.clientHeight,
            inner = window.innerHeight;
        if (client < inner)
            return inner;
        else
            return client;
    };
    clearui.prototype.getViewportWidth = function () {
        var docElement = document.documentElement,
            client = docElement.clientWidth,
            inner = window.innerWidth;
        if (client < inner)
            return inner;
        else
            return client;
    };
    // Creates a clear object.
    window.clearui = new clearui();
})(window);
(function ($) {
    var $navBar = $('nav.navbar'),
        $body = $('body'),
        $menu = $('#menu');

    function getHeight(el) {
        return el.outerHeight();
    }

    function init() {
        var isFixedNav = $navBar.hasClass('navbar-fixed-top');
        var bodyPadTop = isFixedNav ? $navBar.outerHeight(true) : 0;
        $body.css('padding-top', bodyPadTop);
    }

    clearui.navBar = function () {
        var resizeTimer;
        init();
        $(window).on('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(init(), 250);
        });
    };
    return clearui;
})(jQuery);
(function ($, clearui) {
    var $body = $('body'),
        $rightToggle = $('.toggle-right');
    clearui.clearAnimatePanel = function () {
        if ($('#right').length) {
            $rightToggle.on("click", function (e) {
                switch (true) {
                    // Close right panel
                    case $body.hasClass("sidebar-right-opened"): {
                        $body.removeClass("sidebar-right-opened");
                        if ($body.hasClass("boxed")) {
                            $('#right').css('right', '-270px');
                        }
                        break;
                    }
                    default :
                        // Open right panel
                    {
                        // Open right panel
                        $body.addClass("sidebar-right-opened");
                        adjust_boxright();
                        $('.navbar-nav>.dropdown').removeClass("open");
                    }
                }
                e.preventDefault();
            });
        } else {
            $rightToggle.addClass('hidden');
        }
    };
    return clearui;
})(jQuery, clearui || {});
$(window).on('resize', function () {
    adjust_boxright();
});
function adjust_boxright() {
    if ($('body').hasClass('boxed') && $("body").hasClass("sidebar-right-opened")) {
        var window_w = $(window).width();
        var body_w = $('body').width();
        var margin_right = (window_w - body_w) / 2;
        $('#right').css('right', margin_right);
    }
}
(function ($) {
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        clearui.navBar();
        clearui.clearAnimatePanel();
    });
})(jQuery);
// =================nice scroll below 560px for nav dropdown===========//
function fix_dropdown() {
    if ($(window).height() <= 560) {
        $(".navbar .dropdown .dropdown-menu.dropdown-messages").addClass("nice_dropdown").niceScroll({
            cursorcolor: "rgba(0,0,0,0)",
            cursorborder: "none"
        });
    } else {
        $(".navbar .dropdown .dropdown-menu.dropdown-messages").removeClass("nice_dropdown");
    }
}
fix_dropdown();
$(window).on("resize", fix_dropdown);
// =================nice scroll below 560px for nav dropdown ends===========//

// ===========rightside bar hide on blur ========
$(document).click(function (e) {
    var container = $("#right,.dropdown-toggle.toggle-right");
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $('body').removeClass("sidebar-right-opened");
        if ($("body").hasClass("boxed")) {
            $('#right').css('right', '-270px');
        }
    }
});
// ===========rightside bar hide on blur ends ========

$('.navbar-nav>.dropdown').on('click', function () {
    $('body').removeClass("sidebar-right-opened");
    if ($("body").hasClass("boxed")) {
        $('#right').css('right', '-270px');
    }
});

//slim scroll for right side bar
$('#right-slim').slimscroll({
    height: '100vh',
    size: '3px',
    color: '#6699cc',
    opacity: .4
});
// style switcher(skin color picker) js
function change_skin(cls) {
    $("body").removeClass("skin-default skin-mint skin-grape skin-lavender skin-pink skin-sunflower").addClass(cls);
    $('#skin').attr('href', 'css/custom_css/skins/' + cls + '.css');
}
$('#slim_t3').find('.setting-color label').on('click', function(){
    $('#slim_t3').find('.setting-color label').removeClass('active-color');
    $(this).addClass('active-color');
});
// style switcher(skin color picker) js end
$(document).ready(function () {
    $("#slim_t3").find(" [name='my-checkbox']").bootstrapSwitch("size", 'mini');

//=================Preloader===========//

    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
//=================end of Preloader===========//
});