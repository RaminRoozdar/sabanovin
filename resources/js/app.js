/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.$.fn.dataTable = require('datatables.net-bs4');
window.owlCarousel = require('owl.carousel');
window.select2 = require('select2');
window.mask = require('jquery-mask-plugin');

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.component('table-component', require('./components/TableComponent'));

const app = new Vue({
    el: '#app',
});
$(document).ready(function() {

    $('.select2').select2({
        language: "fa",
        dir: "rtl"
    });

    $('.select3').select2({
        language: "fa",
        dir: "rtl"
    });

    $('.price').mask('#.##0', {reverse: true});
    $('.price1').mask('#.##0', {reverse: true});

    $(".postTag").select2({
        tags: true,
        tokenSeparators: [',', ' '],
        language: "fa",
        dir: "rtl"
    })
    $('.owl-product').owlCarousel({
        rtl:true,
        loop:true,
        time:1500,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $('.owl-costumer').owlCarousel({
        rtl:true,
        loop:true,
        time:3000,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    $('.owl-carousel').owlCarousel({
        rtl:true,
        loop:true,
        time:3000,
        nav:true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });


});
