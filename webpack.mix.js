let mix = require('laravel-mix'),
    build = require('./cleaver.build.js'),
    command = require('node-cmd');

require('mix-tailwindcss');

mix.disableNotifications();

mix.webpackConfig({
    plugins: [
        build.cleaver
    ]
});

mix.setPublicPath('./')
   .js('resources/js/app.js', 'dist/js')
   .sass('resources/sass/app.scss', 'dist/css')
   .copy('resources/files', 'dist/files')
   .copy('LICENSE.md', 'dist/files')
   .copy('resources/img', 'dist/img')
   .options({
       processCssUrls: false
   })
   .tailwind()
   .version();
