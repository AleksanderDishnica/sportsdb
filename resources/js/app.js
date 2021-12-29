require('./bootstrap');

import Vue from 'vue'

Vue.component('sport', require('./components/Sport.vue').default);

const app = new Vue({
    el: '#app',
});
