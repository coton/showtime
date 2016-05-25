var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

elixir.config.sourcemaps = true;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // copy bower_components to resources dir
    mix.copy(['bower_components/html5shiv/dist/html5shiv.min.js',
        'bower_components/respond/dest/respond.min.js'
    ], 'resources/assets/js/');

    mix.copy('bower_components/dropzone/dist/min/dropzone.min.css', 'resources/assets/css/');

    mix.copy(['bower_components/jquery/dist/jquery.min.js',
        'bower_components/dropzone/dist/min/dropzone.min.js',
        'bower_components/qrcode.js/qrcode.js',
        'bower_components/PrintArea/demo/jquery.PrintArea.js'
    ], 'resources/assets/js/');


    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.imagemin("./resources/assets/images", "public/images/");



    // merge
    mix.styles(['dropzone.min.css'], 'public/css/vendor.css')
        .styles(['main.css'], 'public/css/main.css');

    mix.scripts(['html5shiv.min.js', 'respond.min.js'], 'public/js/ie.js')
        .scripts(['jquery.min.js', 'dropzone.min.js', 'qrcode.js', 'jquery.PrintArea.js'], 'public/js/vendor.js')
        .scripts('main.js', 'public/js/main.js');


    // hash
    mix.version(["css/vendor.css", "css/main.css", "js/ie.js", "js/vendor.js", "js/main.js"]);
});

