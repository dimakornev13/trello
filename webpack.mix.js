const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': __dirname + '/resources/js'
        },
    },
});

mix.js('resources/js/main.js', 'public/js')
    .sass('resources/sass/stylesheets.scss', 'public/css');

mix.copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css');
