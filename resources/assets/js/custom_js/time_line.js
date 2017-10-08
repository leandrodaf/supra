"use strict";
$(document).ready(function () {
    new WOW().init();
    //auto timeline update panel

    if ($('.timeline-update').length > 0) {
        $('.timeline-update').newsTicker({
            row_height: 120,
            max_rows: 3,
            speed: 2000,
            direction: 'up',
            duration: 3500,
            autostart: 1,
            pauseOnHover: 1
        });
    }

    //auto timeline update panel ends
});