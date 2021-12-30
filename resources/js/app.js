require('./bootstrap');

import Vue from 'vue'

Vue.component('sport', require('./components/Sport.vue').default);
Vue.component('vnav', require('./components/partials/Vnav.vue').default);
Vue.component('vheader', require('./components/partials/Vheader.vue').default);

const app = new Vue({
    el: '#app',
});

const vheader = new Vue({
    el: '#vheader',
});
