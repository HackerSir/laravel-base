const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

let buildJsPath = 'public/build-js';
let buildCssPath = 'public/build-css';

mix.js('resources/js/app.js', buildJsPath)
    .postCss('resources/css/app.css', buildCssPath, [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .vue();
