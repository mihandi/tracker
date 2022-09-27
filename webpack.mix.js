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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/theme/bootstrap.min.js', 'public/js')
    .js('resources/js/theme/jquery.easing.min.js', 'public/js')
    .js('resources/js/theme/jquery.magnific-popup.js', 'public/js')
    .js('resources/js/theme/jquery.min.js', 'public/js')
    .js('resources/js/theme/popper.min.js', 'public/js')
    .js('resources/js/theme/scripts.js', 'public/js')
    .js('resources/js/theme/swiper.min.js', 'public/js')
    .js('resources/js/theme/validator.min.js', 'public/js')
    .vue()
    .css('resources/css/theme/bootstrap.css', 'public/css')
    .css('resources/css/theme/magnific-popup.css', 'public/css')
    .css('resources/css/theme/styles.css', 'public/css')
    .css('resources/css/theme/swiper.css', 'public/css')
    // .css('resources/css/calendar/main.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')

