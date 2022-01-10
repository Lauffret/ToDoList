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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
     })
    .version()
    .browserSync({
        proxy: {
            target: process.env.MIX_APP_URL,
            proxyReq: [
                function(proxyReq) {
                    proxyReq.setHeader('Access-Control-Allow-Origin', '*');
                }
            ]},
        cors: true
    });