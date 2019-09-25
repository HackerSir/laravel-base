const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

let buildJsPath = 'public/build-js';
let buildCssPath = 'public/build-css';

mix.js('resources/js/app.js', buildJsPath)
    .version();
mix.sass('resources/sass/app.scss', buildCssPath)
    .version();

mix.js('resources/js/search-form.js', buildJsPath).version();
