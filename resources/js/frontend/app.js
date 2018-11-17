import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import VueApexCharts from 'vue-apexcharts';
import Notification from 'vue-notification';

import router from './router';
import http from './utils/http';
import store from './store';

Vue.use(VueRouter);
Vue.use(VueApexCharts);
Vue.use(Notification);
Vue.use(VueAxios, http);

import App from './MiloBackoffice';
export default new Vue({
    el: '#milo-app',
    router,
    store,
    components:{
        App
    }
});
