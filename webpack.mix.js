const mix = require('laravel-mix');
const path = require('path');
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

mix.js('resources/backend/main.js', 'dist/').vue()
    .sass('resources/backend/styles/style.scss', 'public/css/backend')
    // .postCss('resources/scss/app.scss', 'public/css', [
    //     //
    // ]);


mix.alias({
    '@': path.join(__dirname, 'resources/backend')
});