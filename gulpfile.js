var elixir = require('laravel-elixir'),
    gulp = require('gulp');
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
    mix.styles([
        './resources/assets/css/app.css',
    ]);
    mix.scripts([
        './node_modules/angular/angular.min.js',
        './resources/assets/js/app.js'
    ]);
});


