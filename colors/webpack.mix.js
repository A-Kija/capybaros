let mix = require('laravel-mix');

mix
.sass('resourses/css/main.scss', 'public')
.js('resourses/js/main.js', 'public');