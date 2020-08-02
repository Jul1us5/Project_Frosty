/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

// var slides = $('.slide');
// var flag = 0;

// slides.first().before(slides.last());

// setInterval(show, 4000);

// function show() {
//     slides = $('.slide');
//     var activeSlide = $('.active');

//     slides.last().after(slides.first());

//     activeSlide.removeClass('.active').next('.slide').addClass('active');

//     if(flag==0) {
//         $('.box').css({'-webkit-clip-path':'polygon(0% 100%, 100% 100%, 100% 90%,85% 95%, 5% 88%, 7% 6%, 90% 5%, 85% 100%, 100% 95%, 100% 0%, 0% 0%, 0% 100%)'});
//         flag=1;
//     } else {
//         $('.box').css({'-webkit-clip-path':"polygon(0% 100%, 100% 100%, 100% 80%, 93% 85%, 8% 95%, 10% 6%, 89% 2%, 93% 95%, 100% 90%, 100% 0%, 0% 0%, 0% 100%)"});
//         flag=0;
//     }
// }