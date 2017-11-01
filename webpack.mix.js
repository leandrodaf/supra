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
