"use strict";
$(document).ready(function () {
    var options = {
        useEasing: true,
        useGrouping: true,
        decimal: '.',
        prefix: '',
        suffix: ''
    };
    new CountUp("widget_count1", 0, 2856, 0, 2.5, options).start();
    new CountUp("widget_count2", 0, 7968, 0, 2.5, options).start();
    new CountUp("widget_count3", 0, 3251, 0, 2.5, options).start();
    new CountUp("widget_count4", 0, 4358, 0, 2.5, options).start();

    //sparkline charts

    $("#sparkline2").sparkline([6, 7, 8, 6, 4, 7, 10, 12, 7, 6, 9, 12], {
        type: 'bar',
        width: '100%',
        barWidth: '15%',
        height: '135',
        barColor: '#66ccff',
        negBarColor: '#fff'
    });
    // knob animated code
    $('.knob').val(0).trigger('change').delay(2000);
    var myKnob = $(".knob").knob({
        'min': 0,
        'max': 100,
        'readOnly': true
    });
    var tmr = self.setInterval(function () {
        myDelay()
    }, 450);
    var m = 0;

    function myDelay() {
        m += 10;
        switch (m) {
            case 80:
                window.clearInterval(tmr);
                break;
        }
        $('.knob').val(m).trigger('change');
    }

    // swiper
    function swiper_rotate() {
        var swiper = new Swiper('.swiper_content', {
            centeredSlides: true,
            autoplay: 4500,
            speed: 1050,
            effect: 'fade',
            loop: true,
            autoplayDisableOnInteraction: false
        });
    }

    swiper_rotate();
    $("[data-toggle='offcanvas']").click(function (e) {
        swiper_rotate();
    });
    // swiper ends
    // wow
    if (typeof WOW === "function") {
        new WOW().init();
    }
    // animation
    $(".careers-item").on('mouseenter', function () {
        $(this).find(".hover-rotate").css({"margin-left": "0"}).removeClass("fa-5x");
        $(this).find(".hover-rotate").css({"padding": "10px"}).addClass("fa-3x animated zoomIn");
    }).on('mouseleave', function () {
        $(this).find(".hover-rotate").css("margin", "auto").addClass("fa-5x animated zoomIn");
        $(this).find(".hover-rotate").css("padding", "0px").removeClass("fa-3x animated zoomIn");
    });

});