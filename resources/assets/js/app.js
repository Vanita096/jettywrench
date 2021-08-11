
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-mask-plugin');
require( 'datatables.net-bs4' );


$(document).ready(function() {

    $('.jw-table-linked tbody tr td:not( .unlink )').click(function() {
        var href = $(this).parent().find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });
});

// window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// Vue.component('ingredients-edit-component', require('./components/Edit.vue'));
//
// const app = new Vue({
//     el: '#app'
// });