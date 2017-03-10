
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./owl.carousel.min');

/**
 * Main navigation mega dropdown
 */
jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})

$(document).ready(function() {

    /**
     * Setup Owl carousel for Brands widget
     */
    $("#owl-brands").owlCarousel({
        autoPlay: 3000,
        items: 6,
        itemsDesktop: [1199, 6],
        itemsDesktopSmall: [1024, 5],
        itemsTablet: [768,4],
        itemsMobile: [479,1],
    }); // end of #owl-brands

}); // end of ready statement