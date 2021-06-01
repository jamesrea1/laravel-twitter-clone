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

mix.js("resources/js/app.js","public/js")
    .sourceMaps()   
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
    ])
    .browserSync({
        proxy: null, //'laravel-twitter-clone.test:8080',
        port: 3000,
        host: 'localhost',
    });

if (mix.inProduction()) {
    //mix.version();
    //mix.disableNotifications();
}

mix.webpackConfig({
    stats: {
        hash: true,
        version: true,
        timings: true,
        children: true,
        errors: true,
        errorDetails: true,
        warnings: true,
        chunks: true,
        modules: false,
        reasons: true,
        source: true,
        publicPath: true,
    }
});
