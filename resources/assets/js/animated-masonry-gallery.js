"use strict";
$(window).on('load', function() {

    var button = 'all';
    var $container = $('#gallery-content-center');
    $container.isotope({ itemSelector: 'img' });
    $('.fancybox').fancybox();

    $("#filter-all").on('click', function() {
        $container.isotope({ filter: '.all' });
        $("#gallery-header-center-left-title").html('All Galleries');
        button = 'all';
    });
    $("#filter-studio").on('click', function() {
        $container.isotope({ filter: '.studio' });
        $("#gallery-header-center-left-title").html('Studio Gallery');
        button = 'studio';
    });
    $("#filter-landscape").on('click', function() {
        $container.isotope({ filter: '.landscape' });
        $("#gallery-header-center-left-title").html('Landscape Gallery');
        button = 'landscape';
    });
    $(".sidebar-toggle").on('click', function() {
        $container.isotope({ filter: '.' + button });
    });
});
