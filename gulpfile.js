var elixir = require('laravel-elixir');

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
    mix.sass('app.scss');

    mix.scripts([ 
      'plugins/jquery.min.js',
    //  'plugins/settings.js',
      'plugins/countries.js',
    //  'plugins/bdate.js',
     'plugins/confetti.js',
      'plugins/progressBar.js',
    'plugins/readmore.js',
    'plugins/custom.js',
      'components/menu.js',
      'components/signup.js'
    ], 'public/js/app.js')
});
