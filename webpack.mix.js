let mix = require('laravel-mix');

const node = "node_modules/";


mix.js('resources/assets/js/app.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}


mix.sass('resources/assets/sass/app.scss', 'public/css');

//Módulos da aplicação

// Alunos
mix.copy('resources/assets/js/custom_js/alunos.js', 'public/js/features/');
mix.copy('resources/assets/js/custom_js/pessoas.js', 'public/js/features/');

//Mix Plugins style
mix.styles([
    'node_modules/bootstrap3/dist/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/ionicons/dist/css/ionicons.css',
    'node_modules/icheck/skins/all.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'resources/assets/css/personalizacoes.css'
], 'public/css/all.css');


//Fonts
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/fonts');


//Mix Plugins js
mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-loading/dist/jquery.loading.min.js',
    'node_modules/bootstrap3/dist/js/bootstrap.js',
    'node_modules/select2/dist/js/select2.full.js',
    'node_modules/select2/dist/js/i18n/pt-BR.js',
    'node_modules/icheck/icheck.js',
    'node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js',
    'node_modules/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js',
    'node_modules/bootstrap-validator/js/validator.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs/js/dataTables.bootstrap.js'
], 'public/js/all.js');
