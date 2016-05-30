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

    mix.imagemin('./resources/assets/images', 'public/images/');

    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.copy('bower_components/bootstrap/dist/css/bootstrap.css'
        , 'resources/assets/css/');

    mix.copy(['bower_components/html5shiv/dist/html5shiv.min.js',
        'bower_components/respond/dest/respond.min.js',
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/js-cookie/src/js.cookie.js',
        'bower_components/dropzone/dist/min/dropzone.min.js',
        'bower_components/qrcode.js/qrcode.js',
        'bower_components/PrintArea/demo/jquery.PrintArea.js',
        'bower_components/bootstrap/dist/js/bootstrap.js'
    ], 'resources/assets/js/');

    mix.copy('resources/assets/uploads', 'public/uploads');


    mix.scripts(['html5shiv.min.js', 'respond.min.js'], 'public/js/ie.js')
        .scripts(['jquery.min.js', 'js.cookie.js'], 'public/js/jq.js')
        .scripts('jweixin-1.0.0.js', 'public/js/wechat.js')
        .scripts('statistic.js', 'public/js/statistic.js');



    // welcome page
    mix.styles(['welcome.css'], 'public/css/welcome.css');

    mix.scripts(['dropzone.min.js', 'qrcode.js', 'jquery.PrintArea.js'], 'public/js/vendor-welcome.js')
        .scripts('welcome.js', 'public/js/welcome.js');

    mix.version(['css/welcome.css', 'js/vendor-welcome.js', 'js/welcome.js']);


    // arwork page
    mix.scripts('artwork.js', 'public/js/artwork.js');


    // artworklist page
    mix.styles(['bootstrap.css'], 'public/css/vendor-artworklist.css');

    mix.scripts(['qrcode.js'], 'public/js/vendor-artworklist.js')
       .scripts('artworklist.js', 'public/js/artworklist.js');




    mix.version(['js/ie.js', 'js/jq.js', 'js/wechat.js', 'js/statistic.js',
        'css/welcome.css', 'js/vendor-welcome.js', 'js/welcome.js',
        'js/artwork.js',
        'css/vendor-artworklist.css', 'js/vendor-artworklist.js', 'js/artworklist.js'
    ]);


});

