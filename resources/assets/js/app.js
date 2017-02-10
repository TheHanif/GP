
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})