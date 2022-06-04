/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;

import Vue from 'vue';
import VueClipboard from 'vue-clipboard2';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('reference-main', require('./components/References/ReferenceMain.vue').default);
Vue.use(VueClipboard);

const app = new Vue({
    el: '#app',
});
