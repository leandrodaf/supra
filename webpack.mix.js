let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//source path configuration
var resourcesAssets = 'resources/assets/';
var vendors = resourcesAssets + 'vendors/';
var srcCss = resourcesAssets + 'css/';
var srcJs = resourcesAssets + 'js/';

//destination path configuration
var dest = 'public/';
var destFonts = dest + 'fonts/';
var destCss = dest + 'css/';
var destJs = dest + 'js/';
var destImg = dest + 'img/';
var destVendors = dest + 'vendors/';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendors resources.
 |
 */
var paths = {
    'animate': vendors + 'animate.css/',
    'fileUpload': vendors + 'blueimp-file-upload/',
    'imgLoad': vendors + 'blueimp-load-image/',
    'bootstrap': vendors + 'bootstrap/dist/',
    'blueimpgallery': vendors + 'blueimp-gallery-with-desc/',
    'blueimpcanvas': vendors + 'blueimp-canvas-to-blob/',
    'blueimptmpl': vendors + 'blueimp-tmpl/',
    'touchspin': vendors + 'bootstrap-touchspin/dist/',
    'wysihtml5': vendors + 'bootstrap3-wysihtml5-bower/dist/',
    'daterangepicker': vendors + 'bootstrap-daterangepicker/',
    'magnify': vendors + 'bootstrap-magnify/',
    'maxlength': vendors + 'bootstrap-maxlength/src/',
    'multiselect': vendors + 'bootstrap-multiselect/dist/',
    'switch': vendors + 'bootstrap-switch/dist/',
    'jvectormap': vendors + 'bower-jvectormap/',
    'buttons': vendors + 'Buttons/',
    'chartjs': vendors + 'Chart.js/dist/',
    'clockface': vendors + 'clockface.js/',
    'fontawesome': vendors + 'font-awesome/',
    'flotchart': vendors + 'flotchart/',
    'flotspline': vendors + 'flot-spline/js/',
    'flottooltip': vendors + 'flot.tooltip/js/',
    'countUp': vendors + 'countUp.js/dist/',
    'dataTables': vendors + 'datatables/media',
    'fancybox': vendors + 'fancybox/',
    'gmaps': vendors + 'gmaps/',
    'jquery': vendors + 'jquery/',
    'inputmask': vendors + 'inputmask/dist/',
    'knob': vendors + 'jquery-knob/js/',
    'select2': vendors + 'select2/dist/',
    'selectize': vendors + 'selectize/dist/',
    'datetimepicker': vendors + 'eonasdan-bootstrap-datetimepicker/build/',
    'fullcalendar': vendors + 'fullcalendar/dist/',
    'summernote': vendors + 'summernote/dist/',
    'icheck': vendors + 'iCheck/',
    'jasnyBootstrap': vendors + 'jasny-bootstrap/dist/',
    'toastr': vendors + 'toastr/',
    'bootstrapValidator': vendors + 'bootstrapvalidator/dist/',
    'select2BootstrapTheme': vendors + 'select2-bootstrap-theme/dist/',
    'c3': vendors + '/c3/',
    'jqueryui': vendors + 'jquery-ui/',
    'colorpicker': vendors + 'mjolnic-bootstrap-colorpicker/dist/',
    'moment': vendors + 'moment/',
    'nestable': vendors + 'nestable/',
    'trumbowyg': vendors + 'trumbowyg/dist/',
    'transitionize': vendors + 'transitionize/dist',
    'twtrBootstrapWizard': vendors + 'twitter-bootstrap-wizard/',
    'underscore': vendors + 'underscore/',
    'xeditable': vendors + 'x-editable/dist/',
    'nestablelist': vendors + 'nestable-list/',
    'datatables': vendors + 'datatables.net/',
    'datatablesbs': vendors + 'datatables.net-bs/',
    'datatablesbutton': vendors + 'datatables.net-buttons/',
    'datatablesbsbuttons': vendors + 'datatables.net-buttons-bs/',
    'datatablescolreorder': vendors + 'datatables.net-colreorder/',
    'datatablescolreorderbs': vendors + 'datatables.net-colreorder-bs/',
    'datatablesresponsive': vendors + 'datatables.net-responsive/',
    'datatablesrowreorder': vendors + 'datatables.net-rowreorder/',
    'datatablesrowreorderbs': vendors + 'datatables.net-rowreorder-bs/',
    'datatablesscroll': vendors + 'datatables.net-scroller/',
    'datatablesscrollbs': vendors + 'datatables.net-scroller-bs/',
    'animatechart': vendors + 'animatechart/',
    'datepicker': vendors + 'bootstrap-datepicker/dist/',
    'jqvmap': vendors + 'jqvmap/',
    'jquerymockjax': vendors + 'jquery-mockjax/dist/',
    'pickadate': vendors + 'pickadate/lib/',
    'hover': vendors + 'hover/css/',
    'd3': vendors + 'd3/',
    'd3v4': vendors + 'd3v4/',
    'wow': vendors + 'wow/dist/',
    'metisMenu': vendors + 'metisMenu/dist/',
    'countupcircle': vendors + 'CoutUpCircle/',
    'nvd3': vendors + 'nvd3/',
    'bootstrapfileinput': vendors + 'bootstrap-fileinput/',
    'clockpicker': vendors + 'clockpicker/dist/',
    'chartist': vendors + 'chartist/dist/',
    'datedropper': vendors + 'datedropper/',
    'timedropper': vendors + 'timedropper/',
    'jquerydaterangepicker': vendors + 'jquery-date-range-picker/dist/',
    'toolbar': vendors + 'toolbar/',
    'selectric': vendors + 'jquery-selectric/public/',
    'circliful': vendors + 'circliful/',
    'granim': vendors + 'granIm.js/dist/',
    'datetime': vendors + 'datetimepicker/',
    'dropify': vendors + 'dropify/dist/',
    'gridforms': vendors + 'gridforms/gridforms/',
    'pnotify': vendors + 'pnotify/dist/',
    'awesomebootstrapcheckbox': vendors + 'awesome-bootstrap-checkbox/',
    'airdatepicker': vendors + 'air-datepicker/dist/',
    'prettycheckable': vendors + 'prettyCheckable/',
    'bootstrapcalendar': vendors + 'bootstrap-calendar/',
    'jquerylabel': vendors + 'jquery-labelauty/source/',
    'dimple': vendors + 'dimple/dist/',
    'imagehover': vendors + 'imagehover/css/',
    'editable': vendors + 'editable/',
    'amcharts': vendors + 'amcharts/dist/',
    'bootstraptable': vendors + 'bootstrap-table/dist/',
    "tableExportjqueryplugin": vendors + "tableExport.jquery.plugin/",
    'markjs': vendors + 'mark.js/dist/',
    'datatablesmarkjs': vendors + 'datatables.mark.js/dist/',
    'gridstack': vendors + 'gridstack/dist/',
    'lodash': vendors + 'lodash/dist/',
    'laddabootstrap': vendors + 'ladda-bootstrap/dist/',
    'sweetalert2': vendors + 'sweetalert2/dist/',
    'insignia': vendors + 'insignia/dist/',
    'leaflet': vendors + 'leaflet/dist/',
    'simplelineicons': vendors + 'simple-line-icons/',
    'cssgram': vendors + 'cssgram/source/',
    'weathericons': vendors + 'weather-icons/',
    'newsticker': vendors + 'jquery-advanced-news-ticker/',
    'themify': vendors + 'themify-icons/',
    'swiper': vendors + 'swiper/dist/',
    'ihover': vendors + 'ihover/',
    'jquerynicescroll': vendors + 'jquery.nicescroll/',
    'flip': vendors + 'flip/dist/',
    'metrojs': vendors + 'metrojs/release/MetroJs.Full/',
    'screenfull': vendors + 'screenfull.js/dist/',
    'lcswitch': vendors + 'LC-switch/',
    'card': vendors + 'card/dist/',
    'wenk': vendors + 'wenk/dist/'

};


// Copy fonts straight to public
mix.copy(paths.bootstrap + 'fonts', destFonts);
mix.copy(paths.bootstrap + 'fonts/glyphicons-halflings-regular.ttf', destFonts + 'bootstrap');
mix.copy(paths.bootstrap + 'fonts/glyphicons-halflings-regular.woff', destFonts + 'bootstrap');
mix.copy(paths.bootstrap + 'fonts/glyphicons-halflings-regular.woff2', destFonts + 'bootstrap');
mix.copy(paths.fontawesome + 'fonts', destFonts);
mix.copy(paths.themify + 'fonts', destFonts);

//COPY CSS,JS AND IMAGES TO PUBLIC
mix.copy(srcCss, destCss);
mix.copy(resourcesAssets + 'img', destImg);
mix.copy(srcJs, destJs);
mix.copy(resourcesAssets + 'data', dest + 'chart_data');

//wenk
mix.copy(paths.wenk + 'wenk.min.css', destVendors + 'wenk');

// card
mix.copy(paths.card + 'jquery.card.js', destVendors + 'card');

// onoffswitch
mix.copy(paths.lcswitch + 'lc_switch.css', destVendors + 'lcswitch/css');
mix.copy(paths.lcswitch + 'lc_switch.min.js', destVendors + 'lcswitch/js');


//screenfull js
mix.copy(paths.screenfull + 'screenfull.min.js', destVendors + 'screenfull/js');

// metrojs
mix.copy(paths.metrojs + 'MetroJs.min.js', destVendors + 'metrojs/js');
mix.copy(paths.metrojs + 'MetroJs.min.css', destVendors + 'metrojs/css');

//swiper
mix.copy(paths.swiper + 'css/swiper.min.css', destVendors + 'swiper/css');
mix.copy(paths.swiper + 'js/swiper.min.js', destVendors + 'swiper/js');

// weather icon
mix.copy(paths.weathericons + 'css/weather-icons.min.css', destVendors + 'weathericon/css');
mix.copy(paths.weathericons + 'font', destVendors + 'weathericon/font');

//advanced news ticker
mix.copy(paths.newsticker + 'js/newsTicker.js', destVendors + 'advanced_newsTicker/js');
mix.copy(paths.newsticker + 'css/newsticker.css', destVendors + 'advanced_newsTicker/css');

//chartist
mix.copy(paths.chartist + 'chartist.min.css', destVendors + 'chartist/css');
mix.copy(paths.chartist + 'chartist.min.js', destVendors + 'chartist/js');

// flip
mix.copy(paths.flip + 'jquery.flip.min.js', destVendors + 'flip/js');

// ihover
mix.copy(paths.ihover + 'src/ihover.css', destVendors + 'ihover/css');

//themify icons
mix.copy(paths.themify + 'css/themify-icons.css', destVendors + 'themify/css');
mix.copy(paths.themify + 'fonts', destVendors + 'themify/fonts');

//gridstack
mix.copy(paths.gridstack + 'gridstack.min.css', destVendors + 'gridstack/css');
mix.copy(paths.gridstack + 'gridstack.js', destVendors + 'gridstack/js');

// laddabootstrap
mix.copy(paths.laddabootstrap + 'ladda-themeless.min.css', destVendors + 'laddabootstrap/css');
mix.copy(paths.laddabootstrap + 'spin.min.js', destVendors + 'laddabootstrap/js');
mix.copy(paths.laddabootstrap + 'ladda.min.js', destVendors + 'laddabootstrap/js');

//leaflet
mix.copy(paths.leaflet + 'leaflet.css', destVendors + 'leaflet/css');
mix.copy(paths.leaflet + 'images', destVendors + 'leaflet/css/images');
mix.copy(paths.leaflet + 'leaflet-src.js', destVendors + 'leaflet/js');

//lodash
mix.copy(paths.lodash + 'lodash.min.js', destVendors + 'lodash/js');

// dimple
mix.copy(paths.dimple + 'dimple.latest.min.js', destVendors + 'dimple/js');

// amcharts
mix.copy(paths.amcharts + 'amcharts/plugins/export/export.css', destVendors + 'amcharts/css');
mix.copy(paths.amcharts + 'amcharts/amcharts.js', destVendors + 'amcharts/js');
mix.copy(paths.amcharts + 'amcharts/serial.js', destVendors + 'amcharts/js');
mix.copy(paths.amcharts + 'amcharts/plugins/export/export.min.js', destVendors + 'amcharts/js');
mix.copy(paths.amcharts + 'amcharts/themes/light.js', destVendors + 'amcharts/js');

// insignia
mix.copy(paths.insignia + 'insignia.css', destVendors + 'insignia/css');
mix.copy(paths.insignia + 'insignia.js', destVendors + 'insignia/js');

//gridforms
mix.copy(paths.gridforms + 'gridforms.css', destVendors + 'gridforms/css');
mix.copy(paths.gridforms + 'gridforms.js', destVendors + 'gridforms/js');

//cssgram
mix.copy(paths.cssgram + 'css', destVendors + 'cssgram/css');

//jquery date range picker
mix.copy(paths.jquerydaterangepicker + 'daterangepicker.min.css', destVendors + 'jquerydaterangepicker/css');
mix.copy(paths.jquerydaterangepicker + 'jquery.daterangepicker.min.js', destVendors + 'jquerydaterangepicker/js');

//pnotify
// pnotify css
mix.copy(paths.pnotify + 'pnotify.css', destVendors + 'pnotify/css');
mix.copy(paths.pnotify + 'pnotify.brighttheme.css', destVendors + 'pnotify/css');
mix.copy(paths.pnotify + 'pnotify.buttons.css', destVendors + 'pnotify/css');
mix.copy(paths.pnotify + 'pnotify.mobile.css', destVendors + 'pnotify/css');
mix.copy(paths.pnotify + 'pnotify.history.css', destVendors + 'pnotify/css');

// pnotify js
mix.copy(paths.pnotify + 'pnotify.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.animate.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.buttons.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.confirm.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.nonblock.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.mobile.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.desktop.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.history.js', destVendors + 'pnotify/js');
mix.copy(paths.pnotify + 'pnotify.callbacks.js', destVendors + 'pnotify/js');

//granim
mix.copy(paths.granim + 'granim.min.js', destVendors + 'granim/js');

//jquery-labelauty
mix.copy(paths.jquerylabel + 'jquery-labelauty.js', destVendors + 'jquerylabel/js');
mix.copy(paths.jquerylabel + 'jquery-labelauty.css', destVendors + 'jquerylabel/css');
mix.copy(paths.jquerylabel + 'images', destVendors + 'jquerylabel/css/images');


//circliful
mix.copy(paths.circliful + 'css/jquery.circliful.css', destVendors + 'circliful/css');
mix.copy(paths.circliful + 'js/jquery.circliful.min.js', destVendors + 'circliful/js');

//dropify
mix.copy(paths.dropify + 'css/dropify.css', destVendors + 'dropify/css');
mix.copy(paths.dropify + 'js/dropify.js', destVendors + 'dropify/js');
mix.copy(paths.dropify + 'fonts', destVendors + 'dropify/fonts');

// Sweet Alert
mix.copy(paths.sweetalert2 + 'sweetalert2.min.css', destVendors + 'sweetalert2/css');
mix.copy(paths.sweetalert2 + 'sweetalert2.min.js', destVendors + 'sweetalert2/js');

// toolbar
mix.copy(paths.toolbar + 'jquery.toolbar.css', destVendors + 'toolbar/css');
mix.copy(paths.toolbar + 'jquery.toolbar.min.js', destVendors + 'toolbar/js');

// air datepicker
mix.copy(paths.airdatepicker + 'css/datepicker.min.css', destVendors + 'airdatepicker/css');
mix.copy(paths.airdatepicker + 'js/datepicker.min.js', destVendors + 'airdatepicker/js');
mix.copy(paths.airdatepicker + 'js/i18n/datepicker.en.js', destVendors + 'airdatepicker/js');

// selectric
mix.copy(paths.selectric + 'selectric.css', destVendors + 'selectric/css');
mix.copy(paths.selectric + 'jquery.selectric.min.js', destVendors + 'selectric/js');

// awesomebootstrapcheckbox
mix.copy(paths.awesomebootstrapcheckbox + 'awesome-bootstrap-checkbox.css', destVendors + 'awesomebootstrapcheckbox/css');

// datedropper
mix.copy(paths.datedropper + 'datedropper.css', destVendors + 'datedropper');
mix.copy(paths.datedropper + 'datedropper.js', destVendors + 'datedropper');
mix.copy(paths.datedropper + 'dd-icon', destVendors + 'datedropper/dd-icon');

// timedropper
mix.copy(paths.timedropper + 'timedropper.css', destVendors + 'timedropper/css');
mix.copy(paths.timedropper + 'timedropper.js', destVendors + 'timedropper/js');

//imagehover
mix.copy(paths.imagehover + 'imagehover.min.css', destVendors + 'imagehover/css');

//mark.js
mix.copy(paths.markjs + 'jquery.mark.js', destVendors + 'markjs/');

//datatables.mark.js
mix.copy(paths.datatablesmarkjs + 'datatables.mark.min.js', destVendors + 'datatablesmark.js/js');
mix.copy(paths.datatablesmarkjs + 'datatables.mark.min.css', destVendors + 'datatablesmark.js/css');

//nvd3
mix.copy(paths.nvd3 + 'build/nv.d3.min.css', destVendors + 'nvd3/css');
mix.copy(paths.nvd3 + 'build/nv.d3.min.js', destVendors + 'nvd3/js');

//pretty Checkable
mix.copy(paths.prettycheckable + 'dist/prettyCheckable.css', destVendors + 'prettycheckable/css');
mix.copy(paths.prettycheckable + 'dist/prettyCheckable.min.js', destVendors + 'prettycheckable/js');
mix.copy(paths.prettycheckable + 'img/sprites-sfa68604977.png', destVendors + 'prettycheckable/img');

// bootstrap-calendar
mix.copy(paths.bootstrapcalendar + 'css/calendar.min.css', destVendors + 'bootstrap-calendar/css');
mix.copy(paths.bootstrapcalendar + 'js/calendar.min.js', destVendors + 'bootstrap-calendar/js');
mix.copy(paths.bootstrapcalendar + 'js/language', destVendors + 'bootstrap-calendar/js/language');
mix.copy(paths.bootstrapcalendar + 'tmpls', destVendors + 'bootstrap-calendar/tmpls');
mix.copy(paths.bootstrapcalendar + 'img', destVendors + 'bootstrap-calendar/img');

//editable-table
mix.copy(paths.editable + 'mindmup-editabletable.js', destVendors + 'editable-table/js');

//bootstrap-table
mix.copy(paths.bootstraptable + 'bootstrap-table.min.css', destVendors + 'bootstrap-table/css');
mix.copy(paths.bootstraptable + 'bootstrap-table.min.js', destVendors + 'bootstrap-table/js');

// underscore
mix.copy(paths.underscore + 'underscore-min.js', destVendors + 'underscore/js');

//clockpicker
mix.copy(paths.clockpicker + 'bootstrap-clockpicker.min.css', destVendors + 'clockpicker/css');
mix.copy(paths.clockpicker + 'bootstrap-clockpicker.min.js', destVendors + 'clockpicker/js');

// daterange picker
mix.copy(paths.daterangepicker + 'daterangepicker.js', destVendors + 'daterangepicker/js');
mix.copy(paths.daterangepicker + 'daterangepicker.css', destVendors + 'daterangepicker/css');

// metis menu
mix.copy(srcJs + 'metisMenu.js', destJs);

// jquery file upload
mix.copy(paths.fileUpload + 'css/jquery.fileupload.css', destVendors + 'blueimp-file-upload/css');
mix.copy(paths.fileUpload + 'css/jquery.fileupload-ui.css', destVendors + 'blueimp-file-upload/css');
mix.copy(paths.fileUpload + 'css/jquery.fileupload-noscript.css', destVendors + 'blueimp-file-upload/css');
mix.copy(paths.fileUpload + '/css/jquery.fileupload-ui-noscript.css', destVendors + 'blueimp-file-upload/css');
mix.copy(paths.fileUpload + 'js/vendor/jquery.ui.widget.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.iframe-transport.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-process.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-image.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-audio.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-video.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-validate.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'js/jquery.fileupload-ui.js', destVendors + 'blueimp-file-upload/js');
mix.copy(paths.fileUpload + 'img/loading.gif', destVendors + 'blueimp-file-upload/img');
mix.copy(paths.fileUpload + 'img/loading.gif', dest + 'img');

// blueimp-tmpl
mix.copy(paths.blueimptmpl + 'js/tmpl.min.js', destVendors + 'blueimp-tmpl/js');

// blueimp-load-image
mix.copy(paths.imgLoad + 'js/load-image.all.min.js', destVendors + 'blueimploadimage/js');
mix.copy(paths.imgLoad + 'js/load-image.js', destVendors + 'blueimploadimage/js');

// blueimp-canvas-to-blob
mix.copy(paths.blueimpcanvas + 'js/canvas-to-blob.min.js', destVendors + 'blueimp-canvas-to-blob/js');

// blueimp-gallery-with-desc
mix.copy(paths.blueimpgallery + 'css/blueimp-gallery.min.css', destVendors + 'blueimp-gallery-with-desc/css');
mix.copy(paths.blueimpgallery + 'js/jquery.blueimp-gallery.min.js', destVendors + 'blueimp-gallery-with-desc/js');

//fancybox
mix.copy(paths.fancybox + 'source', destVendors + 'fancybox');
mix.copy(paths.fancybox + 'lib/jquery.mousewheel.pack.js', destVendors + 'fancybox');

//jasny-bootstrap
mix.copy(paths.jasnyBootstrap + 'css/jasny-bootstrap.css', destVendors + 'jasny-bootstrap/css');
mix.copy(paths.jasnyBootstrap + 'js/jasny-bootstrap.js', destVendors + 'jasny-bootstrap/js');

// bootstrap3-wysihtml5-bower
mix.copy(paths.wysihtml5 + 'bootstrap3-wysihtml5.min.css', destVendors + 'bootstrap3-wysihtml5-bower/css');
mix.copy(paths.wysihtml5 + 'bootstrap3-wysihtml5.all.min.js', destVendors + 'bootstrap3-wysihtml5-bower/js');
mix.copy(paths.wysihtml5 + 'bootstrap3-wysihtml5.min.js', destVendors + 'bootstrap3-wysihtml5-bower/js');

// summer note
mix.copy(paths.summernote + 'summernote.css', destVendors + 'summernote');
mix.copy(paths.summernote + 'summernote.min.js', destVendors + 'summernote');

// datetime
mix.copy(paths.datetime + 'jquery.datetimepicker.css', destVendors + 'datetime/css');
mix.copy(paths.datetime + 'build/jquery.datetimepicker.full.min.js', destVendors + 'datetime/js');

// bootstrap-fileinput
mix.copy(paths.bootstrapfileinput + 'css/fileinput.min.css', destVendors + 'bootstrap-fileinput/css/');
mix.copy(paths.bootstrapfileinput + 'js/fileinput.min.js', destVendors + 'bootstrap-fileinput/js/');
mix.copy(paths.bootstrapfileinput + 'img/loading.gif', destVendors + 'bootstrap-fileinput/img');

// trumbowyg
mix.copy(paths.trumbowyg + 'ui/trumbowyg.min.css', destVendors + 'trumbowyg/css');
mix.copy(paths.trumbowyg + 'trumbowyg.js', destVendors + 'trumbowyg/js');
mix.copy(paths.trumbowyg + 'ui/icons.svg', destVendors + 'trumbowyg/js/ui');

// bootstrapvalidator
mix.copy(paths.bootstrapValidator + 'css/bootstrapValidator.min.css', destVendors + 'bootstrapvalidator/css');
mix.copy(paths.bootstrapValidator + 'js/bootstrapValidator.min.js', destVendors + 'bootstrapvalidator/js');

//select2
mix.copy(paths.select2 + 'css/select2.min.css', destVendors + 'select2/css');
mix.copy(paths.select2 + 'js/select2.js', destVendors + 'select2/js');
mix.copy(paths.select2BootstrapTheme + 'select2-bootstrap.css', destVendors + 'select2/css');

//selectize
mix.copy(paths.selectize + 'css/selectize.css', destVendors + 'selectize/css');
mix.copy(paths.selectize + 'css/selectize.bootstrap3.css', destVendors + 'selectize/css');
mix.copy(paths.selectize + 'js/selectize.min.js', destVendors + 'selectize/js');
mix.copy(paths.selectize + 'js/standalone/selectize.min.js', destVendors + 'selectize/js/standalone');

//icheck
mix.copy(paths.icheck + 'icheck.js', destVendors + 'iCheck/js');
mix.copy(paths.icheck + 'skins/', destVendors + 'iCheck/css');

//hover
mix.copy(paths.hover + 'hover-min.css', destVendors + 'hover/css');

// countUp js
mix.copy(paths.countUp + 'countUp.js', destVendors + 'countUp.js/js');

//countupcircle
mix.copy(paths.countupcircle + 'jquery.countupcircle.js', destVendors + 'countupcircle/js');

// moment
mix.copy(paths.moment + 'min/moment.min.js', destVendors + 'moment/js');

// bootstrap-datetimepicker
mix.copy(paths.datetimepicker + 'css/bootstrap-datetimepicker.min.css', destVendors + 'datetimepicker/css');
mix.copy(paths.datetimepicker + 'js/bootstrap-datetimepicker.min.js', destVendors + 'datetimepicker/js');

// clockface
mix.copy(paths.clockface + 'css/clockface.css', destVendors + 'clockface/css');
mix.copy(paths.clockface + 'js/clockface.js', destVendors + 'clockface/js');

// Buttons
mix.copy(paths.buttons + 'css/buttons.css', destVendors + 'Buttons/css');
mix.copy(paths.buttons + 'js/buttons.js', destVendors + 'Buttons/js');

// bootstrap color picker
mix.copy(paths.colorpicker + 'css/bootstrap-colorpicker.min.css', destVendors + 'colorpicker/css');
mix.copy(paths.colorpicker + 'js/bootstrap-colorpicker.min.js', destVendors + 'colorpicker/js');
mix.copy(paths.colorpicker + 'img/bootstrap-colorpicker', destVendors + 'colorpicker/img/bootstrap-colorpicker');

// toastr
mix.copy(paths.toastr + 'toastr.min.css', destVendors + 'toastr/css');
mix.copy(paths.toastr + 'toastr.min.js', destVendors + 'toastr/js');

// bootstrap touchspin
mix.copy(paths.touchspin + 'jquery.bootstrap-touchspin.css', destVendors + 'bootstrap-touchspin/css');
mix.copy(paths.touchspin + 'jquery.bootstrap-touchspin.js', destVendors + 'bootstrap-touchspin/js');

// bootstrap multiselect
mix.copy(paths.multiselect + 'css/bootstrap-multiselect.css', destVendors + 'bootstrap-multiselect/css');
mix.copy(paths.multiselect + 'js/bootstrap-multiselect.js', destVendors + 'bootstrap-multiselect/js');

// bootstrap switch
mix.copy(paths.switch+'css/bootstrap3/bootstrap-switch.css', destVendors + 'bootstrap-switch/css');
mix.copy(paths.switch+'js/bootstrap-switch.js', destVendors + 'bootstrap-switch/js');

// animate
mix.copy(paths.animate + 'animate.min.css', destVendors + 'animate');

// knob
mix.copy(paths.knob + 'jquery.knob.js', destVendors + 'jquery-knob/js');

// datatables
mix.copy(paths.datatables + 'js/jquery.dataTables.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbs + 'js/dataTables.bootstrap.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbs + 'css/dataTables.bootstrap.css', destVendors + 'datatables/css');
mix.copy(paths.datatablesbutton + 'js/buttons.print.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbutton + 'js/dataTables.buttons.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbsbuttons + 'css/buttons.bootstrap.css', destVendors + 'datatables/css');
mix.copy(paths.datatablesbsbuttons + 'js/buttons.bootstrap.js', destVendors + 'datatables/js');
mix.copy(paths.datatablescolreorder + 'js/dataTables.colReorder.js', destVendors + 'datatables/js');
mix.copy(paths.datatablescolreorderbs + 'css/colReorder.bootstrap.css', destVendors + 'datatables/css');
mix.copy(paths.datatablesresponsive + 'js/dataTables.responsive.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesrowreorder + 'js/dataTables.rowReorder.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbutton + 'js/buttons.html5.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbutton + 'js/buttons.colVis.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesbutton + 'js/buttons.print.min.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesrowreorderbs + 'css/rowReorder.bootstrap.css', destVendors + 'datatables/css');
mix.copy(paths.datatablesscroll + 'js/dataTables.scroller.js', destVendors + 'datatables/js');
mix.copy(paths.datatablesscrollbs + 'css/scroller.bootstrap.css', destVendors + 'datatables/css');

// flot charts
mix.copy(paths.flotchart + 'jquery.flot.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.stack.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.crosshair.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.time.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.selection.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.symbol.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.resize.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.categories.js', destVendors + 'flotchart/js');
mix.copy(paths.flotchart + 'jquery.flot.pie.js', destVendors + 'flotchart/js');
mix.copy(paths.flottooltip + 'jquery.flot.tooltip.js', destVendors + 'flot.tooltip/js');
mix.copy(paths.flotspline + 'jquery.flot.spline.min.js', destVendors + 'flotspline/js');

// Chart.js
mix.copy(paths.chartjs + 'Chart.js', destVendors + 'chartjs/js');

// fullcalendar
mix.copy(paths.fullcalendar + 'fullcalendar.css', destVendors + 'fullcalendar/css');
mix.copy(paths.fullcalendar + 'fullcalendar.print.css', destVendors + 'fullcalendar/css');
mix.copy(paths.fullcalendar + 'fullcalendar.min.js', destVendors + 'fullcalendar/js');

// bootstrap-datepicker
mix.copy(paths.datepicker + 'js/bootstrap-datepicker.js', destVendors + 'bootstrap-datepicker/js');
mix.copy(paths.datepicker + 'css/bootstrap-datepicker.css', destVendors + 'bootstrap-datepicker/css');

// gmaps
mix.copy(paths.gmaps + 'gmaps.min.js', destVendors + 'gmaps/js');


//  bower-jvectormap
mix.copy(paths.jvectormap + 'jquery-jvectormap-1.2.2.css', destVendors + 'bower-jvectormap/css');
mix.copy(paths.jvectormap + 'jquery-jvectormap-1.2.2.min.js', destVendors + 'bower-jvectormap/js');
mix.copy(paths.jvectormap + 'jquery-jvectormap-world-mill-en.js', destVendors + 'bower-jvectormap/js');

//jvector map
mix.copy(paths.jqvmap + 'dist/jquery.vmap.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/jqvmap.css', destVendors + 'jqvmap/css');
mix.copy(paths.jqvmap + 'dist/maps/jquery.vmap.world.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/jquery.vmap.usa.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/jquery.vmap.europe.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/jquery.vmap.germany.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/jquery.vmap.russia.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/continents/jquery.vmap.asia.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/continents/jquery.vmap.north-america.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/continents/jquery.vmap.south-america.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'dist/maps/continents/jquery.vmap.australia.js', destVendors + 'jqvmap/js');
mix.copy(paths.jqvmap + 'examples/js/jquery.vmap.sampledata.js', destVendors + 'jqvmap/js');

//c3 charts
mix.copy(paths.c3 + 'c3.min.css', destVendors + 'c3');
mix.copy(paths.c3 + 'c3.min.js', destVendors + 'c3');
mix.copy(paths.d3 + 'd3.min.js', destVendors + 'd3');
mix.copy(paths.d3v4 + 'd3.min.js', destVendors + 'd3v4');


// bootstrap-maxlength
mix.copy(paths.maxlength + 'bootstrap-maxlength.js', destVendors + 'bootstrap-maxlength/js');

//imgmagnify
mix.copy(paths.magnify + 'css/bootstrap-magnify.min.css', destVendors + 'bootstrap-magnify/css');
mix.copy(paths.magnify + 'js/bootstrap-magnify.js', destVendors + 'bootstrap-magnify/js');

// session timeout page
mix.copy(srcJs + 'jquery.sessionTimeout.min.js', destJs);

// x-editable
mix.copy(paths.xeditable + 'bootstrap3-editable/css/bootstrap-editable.css', destVendors + 'x-editable/css');
mix.copy(paths.xeditable + 'bootstrap3-editable/js/bootstrap-editable.js', destVendors + 'x-editable/js');
mix.copy(paths.xeditable + 'bootstrap3-editable/img', destVendors + 'x-editable/img');

mix.copy(paths.xeditable + 'inputs-ext/typeaheadjs/lib/typeahead.js', destVendors + 'x-editable/js');
mix.copy(paths.xeditable + 'inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css', destVendors + 'x-editable/css');
mix.copy(paths.xeditable + 'inputs-ext/typeaheadjs/typeaheadjs.js', destVendors + 'x-editable/js');
mix.copy(paths.xeditable + 'inputs-ext/address/address.js', destVendors + 'x-editable/js');

// jquery-mockjax
mix.copy(paths.jquerymockjax + 'jquery.mockjax.js', destVendors + 'jquery-mockjax/js');

//jquery input-mask
mix.copy(paths.inputmask, destVendors + 'inputmask');

//tableExport.jquery.plugin
mix.copy(paths.tableExportjqueryplugin + 'tableExport.min.js', destVendors + 'tableExport/');

//nestable list page
mix.copy(paths.nestablelist + 'jquery.nestable.js', destVendors + 'nestable-list/jquery.nestable.js');

//simple-line-icons
mix.copy(paths.simplelineicons + 'css/simple-line-icons.css', destVendors + 'simple-line-icons/css/simple-line-icons.css');
mix.copy(paths.simplelineicons + 'fonts', destVendors + 'simple-line-icons/fonts');

//form wizard page
mix.copy(paths.twtrBootstrapWizard + 'jquery.bootstrap.wizard.js', destVendors + 'bootstrapwizard/js');
mix.copy(paths.twtrBootstrapWizard + 'bootstrap/js/bootstrap.min.js', destVendors + 'bootstrapwizard/js');

// wow
mix.copy(paths.wow + 'wow.min.js', destVendors + 'wow/js');

//  default layout page
mix.copy(paths.jqueryui + 'jquery-ui.min.js', destJs);

//sass compilation
mix.standaloneSass(resourcesAssets + 'sass/bootstrap/bootstrap.scss', 'public/css');
mix.standaloneSass(resourcesAssets + 'sass/buttons/buttons.scss', 'public/css/buttons_sass.css');
mix.standaloneSass(resourcesAssets + 'sass/custom.scss', 'public/css');
// mix.standaloneSass(resourcesAssets + 'sass/custom_white.scss', 'public/css/custom.css');


// Custom Styles


// Custom Styles
//black color scheme
mix.styles(
    [
        'public/css/bootstrap.css',
        resourcesAssets + 'css/font-awesome.min.css',
        resourcesAssets + 'vendors/themify-icons/css/themify-icons.css',
        resourcesAssets + 'css/custom_css/metisMenu.css',
        resourcesAssets + 'vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'
    ], destCss + 'app.css');


// all global js files into app.js
mix.scripts(
    [
        resourcesAssets + 'js/jquery.min.js',
        resourcesAssets + 'vendors/jquery-ui/jquery-ui.min.js',
        resourcesAssets + 'js/bootstrap.min.js',
        resourcesAssets + 'js/custom_js/leftmenu.js',
        resourcesAssets + 'vendors/jquery.nicescroll/jquery.nicescroll.min.js',
        resourcesAssets + 'js/metisMenu.js',
        resourcesAssets + 'js/custom_js/rightside_bar.js',
        resourcesAssets + 'vendors/bootstrap-switch/dist/js/bootstrap-switch.min.js'
    ], destJs + 'app.js');
