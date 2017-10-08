"use strict";
$(document).ready(function () {
    // header

    $('.option-search input').on('focus', function () {
        $('.header-object .search-wrapper').addClass('search-wrapper-focus');
    }).on('blur', function () {
        $('.header-object .search-wrapper').removeClass('search-wrapper-focus');
    });

    // sales, visits and load sparkline chart
    // flip
    $(".flip").flip({
        trigger: 'hover'
    });
    function spark_visits() {
        $("#visitsspark-chart").sparkline([209, 210, 209, 210, 210, 211, 212, 210, 210, 211, 213, 212, 211, 210, 212, 211, 210, 212], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#ff6666',
            fillColor: '#FEEFEF',
            tooltipSuffix: ' Hits'
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
        $('#loadspark-chart').sparkline(lpoints, {
            width: '100%',
            height: '55',
            fillColor: '#E5F0FB',
            lineColor: '#6699cc',
            tooltipSuffix: ' visitors'
        });
        setTimeout(spark_loader, 600);
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
    // tab-1
    $('#toggle_real').lc_switch();

    /* server load  */
    var data_1 = [],
        totalPoints_1 = 70;

    function getRandomData_1() {
        if (data_1.length > 0)
            data_1 = data_1.slice(1);
        // do a random walk
        while (data_1.length < totalPoints_1) {
            var prev_1 = data_1.length > 0 ? data_1[data_1.length - 1] : 50;
            var y = prev_1 + Math.random() * 10 - 5;
            if (y < 25)
                y = 30;
            if (y > 100)
                y = 90;
            data_1.push(y);
        }
        // zip the generated y values with the x values
        var res_1 = [];
        for (var i = 0; i < data_1.length; ++i)
            res_1.push([i, data_1[i]])
        return res_1;
    }

    // setup control widget
    var updateInterval_1 = 1000;

    // setup plot
    var options_1 = {
        colors: ["linear-gradient(70deg, #36A0F1 0, #b097cf 100%)"],

        series: {
            shadowSize: 0,
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.3
                    }, {
                        opacity: 0.3
                    }]
                }
            }
        },
        yaxis: {
            min: 0,
            max: 120
        },
        xaxis: {
            show: false
        },
        grid: {
            backgroundColor: '#fff',
            borderWidth: 1,
            borderColor: '#fff'
        }
    };

    var plot_1 = $.plot($("#live-chart"), [getRandomData_1()], options_1);

    function update_1() {
        plot_1.setData([getRandomData_1()]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot_1.draw();
        if ($("#toggle_real").prop("checked")) {
            setTimeout(update_1, updateInterval_1);
        }
    }

    update_1();

    $('#toggle_real').on('lcs-statuschange', function () {
        update_1();
    });
    //tab-1 ends

    //tab-2

    //start line chart


    var random_value = function () {
        return Math.round(((Math.random() * 75) + 30))
    };

    function chartdata() {
        var lineChartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            legend: {
                display: false
            },
            datasets: [{
                label: 'Sales',
                backgroundColor: 'rgba(48, 164, 255, .2)',
                borderColor: 'rgba(48, 164, 255, 1)',
                borderWidth: '1',
                pointRadius: '2',
                pointBackgroundColor: 'rgba(48, 164, 255, 1)',

                data: [random_value(), random_value(), random_value(), random_value(), random_value(), random_value(), random_value(), random_value(),
                    random_value(), random_value(), random_value(), random_value()
                ]

            }, {
                label: 'Profit',
                backgroundColor: "rgba(211, 211, 211, .1)",
                borderColor: "rgba(211, 211, 211, 1)",
                borderWidth: '1',
                pointRadius: '2',
                pointBackgroundColor: "rgba(211, 211, 211, 1)",

                data: [random_value(), random_value(), random_value(), random_value(), random_value(), random_value(), random_value(), random_value(),
                    random_value(), random_value(), random_value(), random_value()
                ]
            }]

        };
        return lineChartData;
    }


    var selector1 = '#dashboard-chart1';

    $(selector1).attr('width', $(selector1).parent().width());
    var myLine = new Chart($("#dashboard-chart1"), {
        type: 'line',
        data: chartdata(),
        options: {
            title: {
                display: false,
                text: 'Line Chart'
            }
        }
    });


    var counter = 0;

    $('.redraw-cart').on('click', function () {
        myLine.destroy();
        var selector1 = '#dashboard-chart1';
        $(selector1).attr('width', $(selector1).parent().width());
        myLine = new Chart($("#dashboard-chart1"), {
            type: 'line',
            data: chartdata(),
            options: {
                title: {
                    display: false,
                    text: 'Line Chart'
                }
            }
        });
        counter -= 180;
        $('.redraw-cart').css('transform', 'rotate(' + counter + 'deg)');
    });
    //end line chart

    // swiper

    var swiper = new Swiper('.swiper_news', {
        centeredSlides: true,
        autoplay: 5500,
        speed: 1050,
        loop: true,
        autoplayDisableOnInteraction: false
    });

    $(".wrapper").on("resize", function () {
        setTimeout(function () {
            swiper.update();
        }, 400);
    });

    // swiper ends


    // real time flot chart

    var gen_val = [],
        totalPoints = 60;
    var updateInterval = 500;

    function getRandomData() {

        if (gen_val.length > 0)
            gen_val = gen_val.slice(1);

        // Do a random walk

        while (gen_val.length < totalPoints) {

            var prev = gen_val.length > 0 ? gen_val[gen_val.length - 1] : 25,
                y = (Math.random() * 40) + 10;

            if (y < 0) {
                y = 0;
            } else if (y > 49) {
                y = 49;
            }

            gen_val.push(y);
            $('.real-value span').html(Math.round(y));

            var z = (Math.random() * 5) + 4;
            $('.return-value span').html(Math.round(z));
        }

        // Parsing the generated y values with the x values

        var res = [];
        for (var i = 0; i < gen_val.length; ++i) {
            res.push([i, gen_val[i]])
        }

        return res;
    }

    var plot = $.plot("#realtime-views", [getRandomData()], {
        series: {
            bars: {
                show: true,
                lineWidth: 0,
                barWidth: 0.8,
                fill: 0.35
            },
            shadowSize: 0
        },
        grid: {
            labelMargin: 8,
            hoverable: true,
            clickable: true,
            borderWidth: 0,
            borderColor: '#f5f5f5'
        },
        yaxis: {
            min: 0,
            max: 50,
            ticks: [0, 25, 50],
            tickColor: '#f5f5f5',
            font: {color: '#bdbdbd', size: 12}
        },
        xaxis: {
            show: false
        },
        colors: ['#00bcd4'],
        tooltip: true,
        tooltipOpts: {
            content: "Active User: %y"
        }

    });

    function update() {

        plot.setData([getRandomData()]);
        plot.draw();
        setTimeout(update, updateInterval);
    }

    update();
    // real time chart ends

    /*chart4  Cumulative Line chart start*/
    nv.addGraph(function () {
        var clinechart = nv.models.lineChart()
            .useInteractiveGuideline(true)
            .x(function (d) {
                return d[0]
            })
            .y(function (d) {
                return d[1] / 4
            })
            .color(['#9FD8BB', '#66ccff', '#F49393']).showLegend(true).margin({
                left: 30,
                bottom: 35
            });
        clinechart.xAxis.tickFormat(function (d) {
            return d3.time.format('%b')(new Date(d))
        });
        clinechart.yAxis.tickFormat(d3.format('d'));
        d3.select('.nvd3-chart svg')
            .datum(cumulativeTestData())
            .call(clinechart);
        nv.utils.windowResize(clinechart.update);
        $(".sidebar-toggle").on('click', function () {
            $(".nvd3-chart").find('svg').remove();
            $(".nvd3-chart").html("<svg></svg>");
            nv.addGraph(function () {
                d3.select('.nvd3-chart svg')
                    .datum(cumulativeTestData())
                    .call(clinechart);
                clinechart.update();
                return clinechart;
            });
        });
        clinechart.dispatch.on('stateChange', function (e) {
            nv.log('New State:', JSON.stringify(e));
        });
        clinechart.state.dispatch.on('change', function (state) {
            nv.log('state', JSON.stringify(state));
        });
        return clinechart;
    });

    function cumulativeTestData() {
        return [{
            key: "Clear 1",
            values: [
                [1083297600000, -2.974623048543],
                [1085976000000, -1.7740300785979],
                [1088568000000, 4.4681318138177],
                [1091246400000, 7.0242541001353],
                [1093924800000, 7.5709603667586],
                [1096516800000, 20.612245065736],
                [1099195200000, 21.698065237316],
                [1101790800000, 40.501189458018],
                [1104469200000, 50.464679413194],
                [1107147600000, 48.917421973355],
                [1109566800000, 63.750936549160],
                [1112245200000, 59.072499126460],
                [1114833600000, 43.373158880492],
                [1117512000000, 54.490918947556],
                [1120104000000, 56.661178852079],
                [1122782400000, 73.450103545496],
                [1125460800000, 71.714526354907],
                [1128052800000, 85.221664349607],
                [1130734800000, 77.769261392481],
                [1133326800000, 95.966528716500],
                [1136005200000, 107.59132116397],
                [1138683600000, 127.25740096723],
                [1141102800000, 122.13917498830],
                [1143781200000, 126.53657279774],
                [1146369600000, 132.39300992970],
                [1149048000000, 120.11238242904],
                [1151640000000, 118.41408917750],
                [1154318400000, 107.92918924621],
                [1156996800000, 110.28057249569],
                [1159588800000, 117.20485334692],
                [1162270800000, 141.33556756948],
                [1164862800000, 159.59452727893],
                [1167541200000, 167.09801853304],
                [1170219600000, 185.46849659215],
                [1172638800000, 184.82474099990],
                [1175313600000, 195.63155213887],
                [1177905600000, 207.40597044171],
                [1180584000000, 230.55966698196],
                [1183176000000, 239.55649035292],
                [1185854400000, 241.35915085208],
                [1188532800000, 239.89428956243],
                [1191124800000, 260.47781917715],
                [1193803200000, 276.39457482225],
                [1196398800000, 258.66530682672],
                [1199077200000, 250.98846121893],
                [1201755600000, 226.89902618127],
                [1204261200000, 227.29009273807],
                [1206936000000, 218.66476654350],
                [1209528000000, 232.46605902918],
                [1212206400000, 253.25667081117],
                [1214798400000, 235.82505363925],
                [1217476800000, 229.70112774254],
                [1220155200000, 225.18472705952],
                [1222747200000, 189.13661746552],
                [1225425600000, 149.46533007301],
                [1228021200000, 131.00340772114],
                [1230699600000, 135.18341728866],
                [1233378000000, 109.15296887173],
                [1235797200000, 84.614772549760],
                [1238472000000, 100.60810015326],
                [1241064000000, 141.50134895610],
                [1243742400000, 142.50405083675],
                [1246334400000, 139.81192372672],
                [1249012800000, 177.78205544583],
                [1251691200000, 194.73691933074],
                [1254283200000, 209.00838460225],
                [1256961600000, 198.19855877420],
                [1259557200000, 222.37102417812],
                [1262235600000, 234.24581081250],
                [1264914000000, 228.26087689346],
                [1267333200000, 248.81895126250],
                [1270008000000, 270.57301075186],
                [1272600000000, 292.64604322550],
                [1275278400000, 265.94088520518],
                [1277870400000, 237.82887467569],
                [1280548800000, 265.55973314204],
                [1283227200000, 248.30877330928],
                [1285819200000, 278.14870066912],
                [1288497600000, 292.69260960288],
                [1291093200000, 300.84263809599],
                [1293771600000, 326.17253914628],
                [1296450000000, 337.69335966505],
                [1298869200000, 339.73260965121]
            ]
        }, {
            key: "Clear 2",
            values: [
                [1083297600000, -3.7454058855943],
                [1085976000000, -3.6096667436314],
                [1088568000000, -0.8440003934950],
                [1091246400000, 2.0921565171691],
                [1093924800000, 3.5874194844361],
                [1096516800000, 13.742776534056],
                [1099195200000, 13.212577494462],
                [1101790800000, 24.567562260634],
                [1104469200000, 34.543699343650],
                [1107147600000, 36.438736927704],
                [1109566800000, 46.453174659855],
                [1112245200000, 43.825369235440],
                [1114833600000, 32.036699833653],
                [1117512000000, 41.191928040141],
                [1120104000000, 40.301151852023],
                [1122782400000, 54.922174023466],
                [1125460800000, 49.538009616222],
                [1128052800000, 61.911998981277],
                [1130734800000, 56.139287982733],
                [1133326800000, 71.780099623014],
                [1136005200000, 78.474613851439],
                [1138683600000, 90.069363092366],
                [1141102800000, 87.449910167102],
                [1143781200000, 87.030640692381],
                [1146369600000, 87.053437436941],
                [1149048000000, 76.263029236276],
                [1151640000000, 72.995735254929],
                [1154318400000, 63.349908186291],
                [1156996800000, 66.253474132320],
                [1159588800000, 75.943546587481],
                [1162270800000, 93.889549035453],
                [1164862800000, 106.18074433002],
                [1167541200000, 116.39729488562],
                [1170219600000, 129.09440567885],
                [1172638800000, 123.07049577958],
                [1175313600000, 129.38531055124],
                [1177905600000, 132.05431954171],
                [1180584000000, 148.86060871993],
                [1183176000000, 157.06946698484],
                [1185854400000, 155.12909573880],
                [1188532800000, 155.14737474392],
                [1191124800000, 159.70646945738],
                [1193803200000, 166.44021916278],
                [1196398800000, 159.05963386166],
                [1199077200000, 151.38121182455],
                [1201755600000, 132.02441123108],
                [1204261200000, 121.93110210702],
                [1206936000000, 112.64545460548],
                [1209528000000, 122.17722331147],
                [1212206400000, 133.65410878087],
                [1214798400000, 120.20304048123],
                [1217476800000, 123.06288589052],
                [1220155200000, 125.33598074057],
                [1222747200000, 103.50539786253],
                [1225425600000, 85.917420810943],
                [1228021200000, 71.250132356683],
                [1230699600000, 71.308439405118],
                [1233378000000, 52.287271484242],
                [1235797200000, 30.329193047772],
                [1238472000000, 44.133440571375],
                [1241064000000, 77.654211210456],
                [1243742400000, 73.749802969425],
                [1246334400000, 70.337666717565],
                [1249012800000, 102.69722724876],
                [1251691200000, 117.63589109350],
                [1254283200000, 128.55351774786],
                [1256961600000, 119.21420882198],
                [1259557200000, 139.32979337027],
                [1262235600000, 149.71606246357],
                [1264914000000, 144.42340669795],
                [1267333200000, 161.64446359053],
                [1270008000000, 180.23071774437],
                [1272600000000, 199.09511476051],
                [1275278400000, 180.10778306442],
                [1277870400000, 158.50237284410],
                [1280548800000, 177.57353623850],
                [1283227200000, 162.91091118751],
                [1285819200000, 183.41053361910],
                [1288497600000, 194.03065670573],
                [1291093200000, 201.23297214328],
                [1293771600000, 222.60154078445],
                [1296450000000, 233.35556801977],
                [1298869200000, 231.22452435045]
            ]
        }, {
            key: "Clear 3",
            values: [
                [1083297600000, 0.77078283705125],
                [1085976000000, 1.8356366650335],
                [1088568000000, 5.3121322073127],
                [1091246400000, 4.9320975829662],
                [1093924800000, 3.9835408823225],
                [1096516800000, 6.8694685316805],
                [1099195200000, 8.4854877428545],
                [1101790800000, 15.933627197384],
                [1104469200000, 15.920980069544],
                [1107147600000, 12.478685045651],
                [1109566800000, 17.297761889305],
                [1112245200000, 15.247129891020],
                [1114833600000, 11.336459046839],
                [1117512000000, 13.298990907415],
                [1120104000000, 16.360027000056],
                [1122782400000, 18.527929522030],
                [1125460800000, 22.176516738685],
                [1128052800000, 23.309665368330],
                [1130734800000, 21.629973409748],
                [1133326800000, 24.186429093486],
                [1136005200000, 29.116707312531],
                [1138683600000, 37.188037874864],
                [1141102800000, 34.689264821198],
                [1143781200000, 39.505932105359],
                [1146369600000, 45.339572492759],
                [1149048000000, 43.849353192764],
                [1151640000000, 45.418353922571],
                [1154318400000, 44.579281059919],
                [1156996800000, 44.027098363370],
                [1159588800000, 41.261306759439],
                [1162270800000, 47.446018534027],
                [1164862800000, 53.413782948909],
                [1167541200000, 50.700723647419],
                [1170219600000, 56.374090913296],
                [1172638800000, 61.754245220322],
                [1175313600000, 66.246241587629],
                [1177905600000, 75.351650899999],
                [1180584000000, 81.699058262032],
                [1183176000000, 82.487023368081],
                [1185854400000, 86.230055113277],
                [1188532800000, 84.746914818507],
                [1191124800000, 100.77134971977],
                [1193803200000, 109.95435565947],
                [1196398800000, 99.605672965057],
                [1199077200000, 99.607249394382],
                [1201755600000, 94.874614950188],
                [1204261200000, 105.35899063105],
                [1206936000000, 106.01931193802],
                [1209528000000, 110.28883571771],
                [1212206400000, 119.60256203030],
                [1214798400000, 115.62201315802],
                [1217476800000, 106.63824185202],
                [1220155200000, 99.848746318951],
                [1222747200000, 85.631219602987],
                [1225425600000, 63.547909262067],
                [1228021200000, 59.753275364457],
                [1230699600000, 63.874977883542],
                [1233378000000, 56.865697387488],
                [1235797200000, 54.285579501988],
                [1238472000000, 56.474659581885],
                [1241064000000, 63.847137745644],
                [1243742400000, 68.754247867325],
                [1246334400000, 69.474257009155],
                [1249012800000, 75.084828197067],
                [1251691200000, 77.101028237237],
                [1254283200000, 80.454866854387],
                [1256961600000, 78.984349952220],
                [1259557200000, 83.041230807854],
                [1262235600000, 84.529748348935],
                [1264914000000, 83.837470195508],
                [1267333200000, 87.174487671969],
                [1270008000000, 90.342293007487],
                [1272600000000, 93.550928464991],
                [1275278400000, 85.833102140765],
                [1277870400000, 79.326501831592],
                [1280548800000, 87.986196903537],
                [1283227200000, 85.397862121771],
                [1285819200000, 94.738167050020],
                [1288497600000, 98.661952897151],
                [1291093200000, 99.609665952708],
                [1293771600000, 103.57099836183],
                [1296450000000, 104.04353411322],
                [1298869200000, 108.21382792587]
            ]
        }
        ];
    }

    // nvd3 chart ends here

    //auto timeline update panel

    if ($('.timeline-update').length > 0) {
        $('.timeline-update').newsTicker({
            row_height: 117,
            max_rows: 4,
            speed: 2000,
            direction: 'up',
            duration: 3500,
            autostart: 1,
            pauseOnHover: 1
        });
    }

    //auto timeline update panel ends

    // dynamic chat

    $(".conversation-list").slimscroll({
        height: "340px",
        size: '5px',
        allowPageScroll: true,
        opacity: 0.2,
        start: 'bottom'
    });

    $("form#main_input_box").submit(function (event) {
        var conversation_list = $(".conversation-list");
        var timenow = moment().format("h:mm a");
        event.preventDefault();
        var scrollTo_int = conversation_list.prop('scrollHeight') + 'px';
        conversation_list.append('<li class="clearfix odd m-t-10 conversers1"><div class="conversation-text"><div class="ctext-wrap"><p class="text-left">' + $("#custom_textbox").val() + '<i class="text-right">' + timenow + '</i></p></div></div></li>');
        $("#custom_textbox").val('');

        var dynamic_value = ["Oh! Cool", "How do you Do", "Hope! you are having good time", "Really!", "That's, Awesome"];
        // reply
        var delay = 3500;
        setTimeout(function () {
            conversation_list.append('<li class="clearfix m-t-10 conversers2"><div class="conversation-text"><div class="ctext-wrap"><p class="pull-left reply">Wilton is typing<div class="spinner pull-right"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></p></div></div></li>');
            conversation_list.slimscroll({scrollTo: scrollTo_int});
        }, 1000);
        setTimeout(function () {
            $(".reply").html(dynamic_value[Math.floor(Math.random() * 5)] + '<i>' + timenow + '</i>').removeClass("reply");
            $(".spinner").remove();
            $(".conversation-list").slimscroll({scrollTo: scrollTo_int});
        }, 3500);

        conversation_list.slimscroll({scrollTo: scrollTo_int});
    });

    // dynamic chat ends


});
