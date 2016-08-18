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
var gulp = require('gulp');
var clean = require('./semantic/tasks/clean');
var build = require('./semantic/tasks/build');
var rmfile = require('./clean.js');

gulp.task('clean', 'Clean dist folder', clean);
gulp.task('build', 'Builds all files from source', ['clean'], build);
gulp.task('rmfile', "Remove all files which not minified", ['build'], rmfile);

gulp.task('default', ['rmfile'], function () {
    console.log('All done.')
});
