require('./bootstrap');
import VueApexCharts from 'vue-apexcharts'

window.Vue = require('vue');

// -- Register all components
Vue.component('home', require('./components/Home.vue'));
// --

// -- Register Plugin
Vue.use(VueApexCharts);
// --

new Vue({
    el: '#milo-app'
});

