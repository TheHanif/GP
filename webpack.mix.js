const { mix } = require('laravel-mix');

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

mix
	// Font Awesome fonts
    .copy('node_modules/font-awesome/fonts', 'public/assets/fonts')

    // Owl Carousel
    // .copy('node_modules/owlcarousel/owl-carousel/AjaxLoader.gif', 'public/css')
    // .copy('node_modules/owlcarousel/owl-carousel/grabbing.png', 'public/css')
    // .copy('node_modules/owlcarousel/owl-carousel/*.css', 'resources/assets/css/owl-carousel')
    .copy('node_modules/owlcarousel/owl-carousel/owl.carousel.min.js', 'resources/assets/js/')

	.js(['resources/assets/js/app.js',], 'public/js')

   .sass(
   	'resources/assets/sass/app.scss',
   	'public/css');

// mix.copy('node_modules/vendor/acme.txt', 'public/js/acme.txt');

// npm run dev
// npm run watch
// npm run hot