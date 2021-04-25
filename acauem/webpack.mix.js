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

mix

    .styles('resources/views/templetes/homeCss/bootstrap/bootstrap.css', 'public/homeCss/bootstrap.css')
    .styles('resources/views/templetes/homeCss/fontawesome-free/css/all.css', 'public/homeCss/fontawesome.css')
    .styles('resources/views/templetes/homeCss/clean-blog/clean-blog.css', 'public/homeCss/clean-blog.css')

    .styles('resources/views/templetes/timelineCss/styleTimeline.css', 'public/timelineCss/styleTimeline.css')

    .scripts('resources/views/templetes/homeJs/clean-blog/clean-blog.js', 'public/homeJs/clean-blog.js')
    .scripts('resources/views/templetes/homeJs/bootstrap/bootstrap.bundle.js', 'public/homeJs/bootstrap.bundle.js')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/homeJs/jquery.js');