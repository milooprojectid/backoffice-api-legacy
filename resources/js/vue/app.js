import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router';
import VueApexCharts from 'vue-apexcharts';

Vue.use(VueRouter);
Vue.use(VueApexCharts);

import App from './MiloBackoffice';
export default new Vue({
    el: '#milo-app',
    router,
    components:{
        App
    }
});
