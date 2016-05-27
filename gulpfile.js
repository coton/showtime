var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

elixir.config.sourcemaps = false;

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
        'bower_components/js-cookie/src/js.cookie.js',
        'bower_components/dropzone/dist/min/dropzone.min.js',
        'bower_components/qrcode.js/qrcode.js',
        'bower_components/PrintArea/demo/jquery.PrintArea.js'
    ], 'resources/assets/js/');


    mix.copy('resources/assets/fonts', 'public/fonts');

    // imagemin
    mix.imagemin('./resources/assets/images', 'public/images/');



    // merge
    mix.styles(['dropzone.min.css'], 'public/css/vendor.css')
        .styles(['main.css'], 'public/css/main.css');

    mix.scripts(['html5shiv.min.js', 'respond.min.js'], 'public/js/ie.js')
        .scripts(['jquery.min.js', 'js.cookie.js'], 'public/js/jq.js')
        .scripts(['dropzone.min.js', 'qrcode.js', 'jquery.PrintArea.js'], 'public/js/vendor.js')
        .scripts('index.js', 'public/js/index.js')
        .scripts('artwork.js', 'public/js/artwork.js')
        .scripts('jweixin-1.0.0.js', 'public/js/wechat.js')
        .scripts('statistic.js', 'public/js/statistic.js');


    // version
    mix.version(['css/vendor.css', 'css/main.css', 'js/ie.js', 'js/jq.js', 'js/vendor.js', 'js/index.js', 'js/artwork.js', 'js/wechat.js', 'js/statistic.js']);

    // uploads
    mix.copy('resources/assets/uploads', 'public/uploads');
});

