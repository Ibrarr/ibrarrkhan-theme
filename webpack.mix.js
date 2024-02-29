let mix = require('laravel-mix');

mix.js([
    'assets/js/header.js',
], 'js/header.js');

mix.js([
    'assets/js/testimonials.js',
    'assets/js/work-filter.js',
], 'js/homepage.js');

mix.sass('assets/css/app.scss', 'css/app.css')
    .options({
        processCssUrls: false
    });

mix.setPublicPath('dist');

mix.options({
    postCss: [
        require('autoprefixer')({
            overrideBrowserslist: ['last 3 versions'],
            cascade: false
        })
    ]
});

mix.disableNotifications();