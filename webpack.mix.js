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

mix.js('resources/js/app.js', 'public/js/')
    .js('resources/js/layout/popup.js', 'public/js/').react()
    .js('resources/js/shop.js', 'public/js/').react()
    .js('resources/js/cart.js', 'public/js/').react()
    .js('resources/js/slider.js', 'public/js/').react()
    .js('resources/js/catalog.js', 'public/js/').react()
    .extract(['react']).version();

mix.js('resources/js/layout/admin.js', 'public/js/').react().extract(['react']).version();

mix.sass('resources/sass/app.sass', 'public/css')
    .options({
        processCssUrls: false
    }).version();
mix.sass('resources/sass/admin/app.sass', 'public/css/admin.css').version();

mix.copyDirectory('resources/js/vendors', 'public/js/vendors').version();
mix.copyDirectory('resources/images', 'public/images');
