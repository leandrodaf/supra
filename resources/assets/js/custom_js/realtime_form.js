"use strict";
$(document).ready(function () {
    $(".content .icheck-element").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '15%' // optional
    });
    $("#one_way").on("ifChecked", function () {
        $("#single-stop").show();
        $("#nonsingle-stop").hide();
        $("#return_date").attr('disabled', true);
        $('.trip-type').find('i').addClass('ti-arrow-up').removeClass('ti-exchange-vertical');
    });
    $("#round_trip").on("ifChecked", function () {
        $("#single-stop").show();
        $("#nonsingle-stop").hide();
        $("#return_date").attr('disabled', false);
        $('.trip-type').find('i').addClass('ti-exchange-vertical').removeClass('ti-arrow-up');
    });
    $("#multi_stops").on("ifChecked", function () {
        $("#single-stop").hide();
        $("#nonsingle-stop").show();
        $('.trip-type').find('i').addClass('ti-arrow-up').removeClass('ti-exchange-vertical');
    });

// date picker
    jQuery(function () {
        $('#departure_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            minDate: 0,
            onShow: function (ct) {
                this.setOptions({
                    maxDate: $('#return_date').val() ? $('#return_date').val() : false
                })
            },
            timepicker: false
        });
        $('#return_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            onShow: function (ct) {
                this.setOptions({
                    minDate: $('#departure_date').val() ? $('#departure_date').val() : false
                })
            },
            timepicker: false
        });
        $('.departure_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            timepicker: false
        });
        // hotel form
        $('#checkin_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            onShow: function (ct) {
                this.setOptions({
                    maxDate: $('#checkout_date').val() ? $('#checkout_date').val() : false
                })
            },
            timepicker: false
        });
        $('#checkout_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            onShow: function (ct) {
                this.setOptions({
                    minDate: $('#checkin_date').val() ? $('#checkin_date').val() : false
                })
            },
            timepicker: false
        });
    });

    // touchspin initialisation
    $("input[name='adult_count']").TouchSpin({
        initval: 1,
        min: 1,
        max: 9,
        mousewheel: false
    });
    $("input[name='child_count']").TouchSpin({
        initval: 0,
        min: 0,
        max: 9,
        mousewheel: false
    });
    $("input[name='infant_count']").TouchSpin({
        initval: 0,
        min: 0,
        max: 4,
        mousewheel: false
    });

    // adding mutistop flights
    var i = 1;
    $('#add-flight').on('click', function () {
        if (i < 5) {
            var xs_element = "<div class='trip-type visible-xs'> <i class='fa ti-arrow-right icon'></i> </div>";
            var from_city = "<div class='col-sm-4 col-xs-6'> <div class='form-group'> <label class='control-label'>From <input type='text' class='form-control' placeholder='Origin City'> </label> </div> </div>";
            var icon_indi = "<div class='col-sm-1 hidden-xs'> <div class='trip-type-multi'> <i class='fa ti-arrow-right icon'></i> </div> </div>";
            var to_city = "<div class='col-sm-4 col-xs-6'> <div class='form-group'> <label class='control-label'>To <input type='text' class='form-control' placeholder='Destination City'> </label> </div> </div>";
            var dep_date = "<div class='col-sm-3 col-sm-offset-0 col-xs-12'><span class=''><i class='fa fa-fw ti-minus remove-flight'></i></span> <label class='m-l-16 m-r-20'>Departure <div class='input-group'> <div class='input-group-addon'> <i class='fa fa-fw ti-calendar'></i></div> <input class='form-control departure_date' placeholder='Select Date'> </div></label> </div>";

            $('#nonsingle-stop').find('.flight-count').append('<div class="row multi-flight-data">' + xs_element + from_city + icon_indi + to_city + dep_date + '</div>');
            i += 1;
        }
        $('.departure_date').datetimepicker({
            timepickerScrollbar: 'false',
            format: 'd/m/Y',
            timepicker: false
        });
    });
    $('body').on('click', '.remove-flight', function (e) {
        e.preventDefault();
        i--;
        $(this).closest(".multi-flight-data").remove();
    });

// gmaps picker
    var search_placemap1 = new GMaps({
        div: '#map',
        lat: 43.654438,
        lng: -79.380699,
        zoom: 14
    });
    var latlng1;
    var cord = [];

    // autofill/ suggestions
    var input1 = document.getElementById('pick_up');
    var options1 = {
        types: ['establishment']
    };
    var autocomplete1 = new google.maps.places.Autocomplete(input1, options1);
    var input2 = document.getElementById('drop_down');
    var options2 = {
        types: ['establishment']
    };
    var autocomplete2 = new google.maps.places.Autocomplete(input2, options2);

    function points_locate(e) {
        cord=[];
        search_placemap1.removeMarkers();
        e.preventDefault();
        $(".route_point").each(function () {
            GMaps.geocode({
                address: $(this).val().trim(),
                callback: function (results, status) {
                    if (status == 'OK') {
                        latlng1 = results[0].geometry.location;
                        search_placemap1.setCenter(latlng1.lat(), latlng1.lng());
                        search_placemap1.setZoom(12);
//                                search_placemap1.fitZoom(10);
                        search_placemap1.addMarker({
                            lat: latlng1.lat(),
                            lng: latlng1.lng()
                        });
                        cord.push(latlng1);
                    }
                    if(cord.length>=2){
                        search_placemap1.travelRoute({
                            origin: [cord[0].lat(), cord[0].lng()],
                            destination: [cord[1].lat(), cord[1].lng()],
                            travelMode: 'driving',
                            step: function (e) {
                                $('#instructions').append('<li>' + e.instructions + '</li>').find('li:eq(' + e.step_number + ')').delay(250 * e.step_number).fadeIn(200, function () {
                                    search_placemap1.setCenter(e.end_location.lat(), e.end_location.lng());
                                    search_placemap1.drawPolyline({
                                        path: e.path,
                                        strokeColor: '#62A1F6',
                                        strokeOpacity: 0.9,
                                        strokeWeight: 6
                                    });
                                });
                            }
                        });
                    }
                }
            });
        });
    }

    $('.route_point').on("keypress", function (e) {
        if (e.keyCode == 13) {
            points_locate(e);
        }
    });
    
});