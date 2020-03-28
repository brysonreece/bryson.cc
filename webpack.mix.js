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
   .options({
       processCssUrls: false
   })
   .tailwind()
   .version();

mix.browserSync({
    files: [
        {
            match: ["resources/**/*"],
            fn: function(event, file) {
                command.get('php cleaver', (error, stdout, stderr) => {
                    console.log(error ? stderr : stdout);
                });
            }
        }
    ]
});