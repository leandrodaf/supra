let mix = require('laravel-mix');

const node = "node_modules/";

//Fonts
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/fonts');
mix.copyDirectory('node_modules/bootstrap3/dist/fonts', 'public/fonts');


mix.js('resources/assets/js/app.js', 'public/js')
    .extract([
        'vue',
        'jquery',
        'axios',
        'select2'
    ]).version();

mix.autoload({
    'jquery': ['$', 'jQuery'],
    'select2': ['select2'],
    'dt': ['datatables.net']
});

mix.sass('resources/assets/sass/app.scss', 'public/css');

//Módulos da aplicação

// Alunos
mix.js('resources/assets/js/custom_js/alunos.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/pessoas.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/matricula.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/management.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/yearClass.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/activities.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/notification.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/fileentry.js', 'public/js/features/');
mix.js('resources/assets/js/custom_js/dashSecretaria.js', 'public/js/features/');


mix.js('resources/assets/js/plugins/jquery.cpfcnpj.min.js', 'public/js/plugins/jquery.cpfcnpj.min.js');
mix.copy('resources/assets/images/avatarPadrao.jpg', 'public/uploads/');
mix.copy('node_modules/password-strength-meter/dist/passwordstrength.jpg', 'public/css/passwordstrength.jpg');

//Copia arquivos css
mix.copy('resources/assets/css/_all.css', 'public/css/');
mix.copy('resources/assets/css/_all-skins.min.css', 'public/css');
mix.copy('resources/assets/css/AdminLTE.min.css', 'public/css');
mix.js('resources/assets/js/template/app.min.js', 'public/js/template');
mix.js('node_modules/html5shiv/dist/html5shiv.js', 'public/js/template');
mix.js('resources/assets/js/template/respond.min.js', 'public/js/template');

mix.copy('node_modules/trumbowyg/dist/trumbowyg.min.js', 'public/js/plugins');
mix.copy('node_modules/trumbowyg/dist/langs/pt_br.min.js', 'public/js/plugins');
mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/plugins/ui');
mix.copy('node_modules/trumbowyg/dist/ui/trumbowyg.min.css', 'public/css/plugins');


//Mix Plugins style
mix.styles([
    'node_modules/bootstrap3/dist/css/bootstrap.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/icheck/skins/all.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/ionicons/dist/css/ionicons.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/jquery-steps/demo/css/jquery.steps.css',
    'node_modules/password-strength-meter/dist/password.min.css',
    'resources/assets/css/personalizacoes.css',
    'node_modules/clockpicker/dist/bootstrap-clockpicker.min.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
], 'public/css/all.css')
    .version();

//Mix Plugins js
mix.scripts([
    'node_modules/select2/dist/js/i18n/pt-BR.js',
    'node_modules/jquery-steps/build/jquery.steps.js',
    'node_modules/jquery-validation/dist/jquery.validate.js',
    'node_modules/jquery-sortable/source/js/jquery-sortable-min.js',
    'node_modules/jquery-loading/dist/jquery.loading.min.js',
    'node_modules/jquery-price-format/jquery.priceformat.min.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    'node_modules/jquery-maskmoney/dist/jquery.maskMoney.min.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
    'node_modules/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js',
    'node_modules/password-strength-meter/dist/password.min.js',
    'node_modules/clockpicker/dist/bootstrap-clockpicker.min.js',
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js',
    'node_modules/bootstrap-validator/dist/validator.min.js',
    'node_modules/moment/min/moment.min.js',
], 'public/js/all.js')
    .version();
