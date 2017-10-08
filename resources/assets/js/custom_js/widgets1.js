"use strict";
$(document).ready(function () {
    var options = {
        useEasing: true,
        useGrouping: true,
        decimal: '.',
        prefix: '',
        suffix: ''
    };
    new CountUp("widget_count1", 0, 3752, 0, 2.5, options).start();
    new CountUp("widget_count2", 0, 35, 0, 2.5, options).start();
    new CountUp("widget_count3", 0, 3251, 0, 2.5, options).start();
    new CountUp("widget_count4", 0, 1002, 0, 2.5, options).start();
    // flip
    $(".flip").flip({
        trigger: 'hover'
    });

// Draw a sparkline for the #sparkline element
    $('#sparkline').sparkline([2, 4, 5, 2, 1, 3, 4], {
        type: "bar",
        height: "50px",
        barWidth: "8px;",
        barSpace: "3px",
        barcolour: "#6699cc",
        tooltipSuffix: " Visitors"
    });
    $(".piechart").sparkline([3, 4, 6, 3, 5], {
        type: 'pie',
        width: '50px',
        height: '50px',
        sliceColors: ['#6699cc', '#66cc99', '#66ccff', '#f0ad4e']
    });

    function spark_loader2() {
        var lpoints = [];
        for (var i = 0; i < 20; i++) {
            var load = 5 + parseInt(Math.random() * 90 - 5);
            if (load < 25) {
                load = 25;
            }
            if (load > 100) {
                load = 90;
            }
            lpoints.push(load);
        }
        $('.linechart').sparkline(lpoints, {
            type: 'line',
            height: "50px",
            width: "80px;",
            lineColor: '#6699cc',
            fillColor: 'rgba(66,139,202,0.5)'
        });
        setTimeout(spark_loader2, 1800);
    }

    spark_loader2();

    function discrete_loader() {
        var lpoints = [];
        for (var i = 0; i < 20; i++) {
            var load = 2 + parseInt(Math.random() * 90 - 3);
            if (load < 25) {
                load = 25;
            }
            if (load > 100) {
                load = 90;
            }
            lpoints.push(load);
        }
        $(".discretechart").sparkline(lpoints, {
            type: 'bar',
            height: "50px",
            barWidth: "6px;",
            lineColor: '#428bca'
        });
        var vpoints = [];
        for (var i_1 = 0; i_1 < 20; i_1++) {
            var load1 = 20 + parseInt(Math.random() * 90 - 8);
            if (load1 < 25) {
                load1 = 25;
            }
            if (load1 > 100) {
                load1 = 90;
            }
            vpoints.push(load1);
        }
        $('.discretechart').sparkline(vpoints,
            {
                composite: true,
                fillColor: false,
                spotColor: '#f0ad4e',
                lineColor: '#ff6666'
            });
        setTimeout(discrete_loader, 1800);
    }

    discrete_loader();


    //circle slide chart
    $("#test-circle").circliful({
        animation: 1,
        animationStep: 2,
        foregroundBorderWidth: 8,
        fontColor: '#fff',
        backgroundColor: "none",
        fillColor: '#2F3B48',
        foregroundColor: '#66cc99',
        percent: 75,
        showPercent: 1,
        target: 0
    });
    $("#test-circle1").circliful({
        animationStep: 1,
        foregroundBorderWidth: 12,
        backgroundBorderWidth: 17,
        foregroundColor: '#66ccff',
        pointSize: 12,
        backgroundColor: '#ddd',
        percent: 72
    });
    $("#test-circle3").circliful({
        animationStep: 1,
        foregroundBorderWidth: 5,
        percent: 72,
        pointSize: 30,
        backgroundColor: '#ddd',
        pointColor: '#66ccff',
        noPercentageSign: true,
        fontColor: '#fff'
    });
    //animations code
    $("#for").mouseenter(function () {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#for').addClass('animated rollIn').one(animationEnd, function () {
            $(this).removeClass('animated rollIn');
        });
    });
    $("#fls").mouseenter(function () {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#fls').addClass('animated flash').one(animationEnd, function () {
            $(this).removeClass('animated flash');
        });
    });
    $("#flp").mouseenter(function () {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#flp').addClass('animated swing').one(animationEnd, function () {
            $(this).removeClass('animated swing');
        });
    });
    $("#zo").mouseleave(function () {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#zo').addClass('animated zoomOut').one(animationEnd, function () {
            $(this).removeClass('animated zoomOut');
        });
    });
    $("#ziu").mouseenter(function () {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#ziu').addClass('animated zoomInUp').one(animationEnd, function () {
            $(this).removeClass('animated zoomInUp');
        });
    });
    $("#bright").on("input", function () {
        $(".demo").css("background-color", "rgba(0,0,0," + $("#bright").val() / 100 + ")");
    });




    // sales, visits and load sparkline chart
    function spark_visits() {
        $("#visitsspark-chart").sparkline([209, 210, 209, 210, 210, 211, 212, 210, 210, 211, 213, 212, 211, 210, 212, 211, 210, 212], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#ff6666',
            fillColor: '#FEEFEF',
            tooltipSuffix: ' Visits'
        });
    }

    spark_visits();

    function spark_sales() {
        var barParentdiv = $('#salesspark-chart').closest('div');
        var barCount = [111, 121, 131, 121, 131, 101, 91, 141, 131, 111, 111, 121, 111, 111, 101, 121, 111, 111];
        var barSpacing = 2;
        $("#salesspark-chart").sparkline(barCount, {
            type: 'bar',
            width: '100%',
            barWidth: (barParentdiv.width() - (barCount.length * barSpacing)) / barCount.length,
            height: '55',
            barSpacing: barSpacing,
            barColor: '#FFE5C0',
            tooltipSuffix: ' Sales'
        });
    }

    spark_sales();
    var lpoints = [11, 21, 31, 21, 31, 1, 91, 41, 31, 11, 11, 21, 11, 11, 11, 21, 11, 11, 12, 31, 21, 13];

    function spark_loader() {
        var load = 5 + parseInt(Math.random() * 90 - 5);
        if (load < 25) {
            load = 25;
        }
        if (load > 100) {
            load = 90;
        }
        lpoints.shift();
        lpoints.push(load);
        $('#loadspark-chart1').sparkline(lpoints, {
            width: '100%',
            height: '55',
            fillColor: '#E5F0FB',
            lineColor: '#6699cc',
            tooltipSuffix: ' % of Load on Server'
        });
        setTimeout(spark_loader, 1800);
    }

    spark_loader();

    $("#subscribers-chart").sparkline([3, 4, 6, 3, 5], {
        type: 'pie',
        width: '55',
        height: '55',
        sliceColors: ['#6699cc', '#66cc99', '#f0ad4e', '#66ccff', '#66cc99']
    });

    $(window).on('resize', function () {
        spark_visits();
        spark_sales();
    });

});