"use strict";
$(document).ready(function() {

    $('#fullscreen-toggle').on('click',function () {
            screenfull.toggle($('#main-chart')[0]);
    });

    // sales chart starts
    nv.addGraph(function () {
        var linechart = nv.models.lineChart()
        // .useInteractiveGuideline(true)
            .showYAxis(false)
            .showXAxis(true);
        linechart.xAxis
            .tickFormat(d3.format(',r'));

        linechart.yAxis
            .tickFormat(d3.format('.1f'));

        var myData = sinAndCos();
        linechart.forceY([0, 10]);
        d3.select('#sales-chart svg')
            .datum(myData)
            .call(linechart);
        nv.utils.windowResize(function () {
            linechart.update();
        });
        $(window).on("scroll", function(){
            linechart.tooltip.hideDelay(100);
        });
        $(".sidebar-toggle").on('click', function () {
            $("#sales-chart").find('svg').remove();
            $("#sales-chart").html("<svg></svg>");
            d3.select('#sales-chart svg')
                .datum(myData)
                .call(linechart);
            linechart.update();
        });
        return linechart;

    });

    function sinAndCos() {
        var sin = [],
            sin2 = [],
            cos = [];
        for (var i = 0; i < 121; i++) {

            sin.push({x: eval(i / 10), y: Math.cos(i / 9) + 7.5});
            sin2.push({x: eval(i / 10), y: Math.cos(i / 14) + 5});
            cos.push({x: eval(i / 10), y: Math.cos(i / 10) + 4});
        }
        return [{
            values: sin,
            key: 'Orders',
            color: '#4285F4',
            area: true
        }, {
            values: sin2,
            key: 'Sales',
            color: '#81ADF8',
            area: true
        }, {
            values: cos,
            key: 'Support',
            color: '#BCD3F9',
            area: true
        }];
    }

    // sales chart end


    // sparkline charts of visits sales etc..

    function spark_user() {
        $("#user-chart").sparkline([209, 210, 209, 210, 210, 211, 212, 210, 210, 211, 213, 212, 211, 210, 212, 211, 210, 212], {
            type: 'line',
            width: '100%',
            height: '33',
            lineColor: '#6699CC',
            fillColor: '#D2E9FF',
            tooltipSuffix: ' Users',
            highlightLineColor: 'rgba(0,0,0,0)'
        });
    }

    spark_user();

    function spark_revenue() {
        var barParentdiv = $('#mr-chart').closest('.panel');
        var barCount = [91, 121, 131, 121, 131, 101, 91, 141, 131, 111, 111, 121, 111, 111, 101, 121, 111, 111, 121, 131, 121, 131, 121];
        var barSpacing = 2;
        $("#mr-chart").sparkline(barCount, {
            type: 'bar',
            width: '100%',
            barWidth: (barParentdiv.width() - (barCount.length * barSpacing)) / barCount.length,
            height: '30',
            barSpacing: barSpacing,
            barColor: '#FFE5C0',
            tooltipSuffix: ' Sales'
        });
    }

    spark_revenue();

    function spark_subscribe() {
        $("#subscriber-chart").sparkline([209, 210, 209, 210, 210, 211, 212, 211, 210, 211, 209, 211, 213, 210, 212, 214, 211, 210, 212], {
            type: 'line',
            width: '100%',
            height: '33',
            lineColor: '#ff6666',
            fillColor: '#FEEFEF',
            tooltipSuffix: ' Subscribers',
            highlightLineColor: 'rgba(0,0,0,0)'
        });
    }

    spark_subscribe();

    $(window).on('resize', function () {
        spark_user();
        spark_revenue();
        spark_subscribe();
    });
    $("[data-toggle='offcanvas']").on('click', function (e) {
        spark_user();
        spark_revenue();
        spark_subscribe();
    });

    // profile changer

    var profile_index = 0;
    var profile_arr = [
        {
            cover_img: "./img/profile-cover.jpg",
            profile_name: "Clinton Leo",
            profile_pic: "./img/profile-pic.jpg",
            desig: "Designer,<br class='hidden-xs'>Team Lead."
        },
        {
            cover_img: "./img/pages/slider1.jpg",
            profile_name: "Tony",
            profile_pic: "./img/authors/avatar.jpg",
            desig: "Developer,<br class='hidden-xs'>Team Lead."
        },
        {
            cover_img: "./img/pages/slider2.jpg",
            profile_name: "Jenny Kerry",
            profile_pic: "./img/authors/avatar1.jpg",
            desig: "Editor,<br class='hidden-xs'>Manager."
        },
        {
            cover_img: "./img/pages/slider3.jpg",
            profile_name: "Marlee",
            profile_pic: "./img/authors/avatar2.jpg",
            desig: "Tester,<br class='hidden-xs'>Trainee."
        }
    ];
    $(".change_pic").on("click", function () {
        if ($(this).hasClass("next_pic")) {
            profile_index++;
        } else {
            profile_index--;
        }
        profile_index = profile_index % profile_arr.length;
        if (profile_index == -1) {
            profile_index = profile_arr.length - 1;
        }
        $(".cover-image").css("background-image", "url(" + profile_arr[profile_index].cover_img + ")");
        $(".profile-name").text(profile_arr[profile_index].profile_name);
        $(".profile-pic").css("background-image", "url(" + profile_arr[profile_index].profile_pic + ")");
        $(".designation h5").html(profile_arr[profile_index].desig);
    });

    // profile changer end

    // Animated knob
    // cpu load

    $('.cpu-laod').val(0).trigger('change').delay(2000);
    var myKnob_1 = $(".cpu-laod").knob({
        'min': 0,
        'max': 100,
        'readOnly': true,
        'format': function (value) {
            return value + ' %';
        }
    });
    var tmr_1 = self.setInterval(function () {
        myDelay_1()
    }, 450);
    var m_1 = 0;

    function myDelay_1() {
        m_1 += 10;
        switch (m_1) {
            case 60:
                window.clearInterval(tmr_1);
                break;
        }
        $('.cpu-laod').val(m_1).trigger('change');
    }

    // disc space

    $('.disc-space').val(0).trigger('change').delay(1000);
    var myKnob_2 = $(".disc-space").knob({
        'min': 0,
        'max': 100,
        'readOnly': true,
        'format': function (value) {
            return value + ' %';
        }
    });
    var tmr_2 = self.setInterval(function () {
        myDelay_2()
    }, 450);
    var m_2 = 0;

    function myDelay_2() {
        m_2 += 15;
        switch (m_2) {
            case 75:
                window.clearInterval(tmr_2);
                break;
        }
        $('.disc-space').val(m_2).trigger('change');
    }

    // Animated knob ends

    $(".live-tile, .flip-list").not(".exclude").liveTile();

    // swiper ends

});
