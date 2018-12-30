
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import vSelect from 'vue-select';
Vue.component('v-select', vSelect);

Vue.component('v-select-precios', require('./components/v-select-precios.vue'));

const app = new Vue({
    el: '#app'

     

});
