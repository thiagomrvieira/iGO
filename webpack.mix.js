const mix = require('laravel-mix')

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
  // General
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
  ])

  // Assets frontoffice
  .postCss('resources/views/frontoffice/assets/css/styles.css', 'public/assets-frontoffice/css/styles.css')
  .js('resources/views/frontoffice/assets/js/scripts.js', 'public/assets-frontoffice/js/scripts.js')
  .copy('resources/views/frontoffice/assets/images',  'public/assets-frontoffice/images')
  .copy('resources/libs',  'public/libs')

  // Assets backoffice partner
  .postCss('resources/views/backoffice-partner/assets/css/styles.css', 'public/assets-backoffice-partner/css/styles.css')
  .js('resources/views/backoffice-partner/assets/js/scripts.js', 'public/assets-backoffice-partner/js/scripts.js')
  .copy('resources/views/backoffice-partner/assets/images',  'public/assets-backoffice-partner/images')
  