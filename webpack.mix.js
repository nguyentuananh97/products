let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .babel(['resources/assets/sass/settings.css'
	],'public/css/settings.css')
   .babel(['resources/assets/sass/font-style.css'
	],'public/css/font-style.css')
   .babel(['resources/assets/sass/css-style.css'
	],'public/css/css-style.css')
   .babel(['resources/assets/js/custom.js'
	],'public/js/custom.js')
   .babel(['resources/assets/js/instafeed.min.js'
	],'public/js/instafeed.min.js')
   .babel(['resources/assets/js/js-index-01.js'
	],'public/js/js-index-01.js')
   .babel(['resources/assets/js/jquery.themepunch.revolution.min.js'
	],'public/js/jquery.themepunch.revolution.min.js')
   .babel(['resources/assets/js/jquery.themepunch.tools.min.js'
	],'public/js/jquery.themepunch.tools.min.js')
   .babel(['resources/assets/js/bootstrap.min.js'
   ],'public/js/bootstrap.min.js')
   .babel(['resources/assets/js/js-product.js'
   ],'public/js/js-product.js')
   .babel(['resources/assets/sass/AdminLTE.css'
   ],'public/css/AdminLTE.css')
   .babel(['resources/assets/sass/main.css'
   ],'public/css/main.css')
   .babel(['resources/assets/sass/util.css'
   ],'public/css/util.css')
   .babel(['resources/assets/js/AdminLTE.js'
      ],'public/js/AdminLTE.js')
   .babel(['resources/assets/js/demo.js'
   ],'public/js/demo.js')
   .babel(['resources/assets/js/fastclick.js'
   ],'public/js/fastclick.js')
   .babel(['resources/assets/js/jquery-2.1.4.min.js'
   ],'public/js/jquery-2.1.4.min.js')
   .babel(['resources/assets/js/slick.min.js'
   ],'public/js/slick.min.js')
   .babel(['resources/assets/js/bootstrap-select.min.js'
   ],'public/js/bootstrap-select.min.js')
   .babel(['resources/assets/js/jquery.plugin.min.js'
   ],'public/js/jquery.plugin.min.js')
   .babel(['resources/assets/js/jquery.countdown.min.js'
   ],'public/js/jquery.countdown.min.js')
   .babel(['resources/assets/js/jquery.magnific-popup.min.js'
   ],'public/js/jquery.magnific-popup.min.js')
   .babel(['resources/assets/js/isotope.pkgd.min.js'
   ],'public/js/isotope.pkgd.min.js')
   .babel(['resources/assets/js/modernizr.min.js'
   ],'public/js/modernizr.min.js')
   .babel(['resources/assets/js/imagesloaded.pkgd.min.js'
   ],'public/js/imagesloaded.pkgd.min.js')
   .babel(['resources/assets/js/jquery.colorbox-min.js'
   ],'public/js/jquery.colorbox-min.js')
   .babel(['resources/assets/sass/slick.css'
   ],'public/css/slick.css')
   .babel(['resources/assets/sass/slick-theme.css'
   ],'public/css/slick-theme.css')
   .babel(['resources/assets/sass/magnific-popup.css'
   ],'public/css/magnific-popup.css')
   .babel(['resources/assets/sass/bootstrap-select.css'
   ],'public/css/bootstrap-select.css')
   .babel(['resources/assets/js/nouislider.js'
   ],'public/js/nouislider.js')
   .babel(['resources/assets/sass/nouislider.css'
   ],'public/css/nouislider.css');
