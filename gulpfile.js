// var elixir = require('laravel-elixir');

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

// elixir(function(mix) {
//     mix.sass('app.scss');
// });

var gulp = require('gulp'),
    gp_concat = require('gulp-concat'),
    gp_rename = require('gulp-rename');

gulp.task('app-js', function(){
    return gulp.src(['resources/ngJs/*.js'])
        .pipe(gp_concat('app.js'))
        .pipe(gulp.dest('public/'))
});

gulp.task('default', ['app-js'], function(){});