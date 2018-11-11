require('./bootstrap');
window.Vue = require('vue');

// -- Register all components
Vue.component('home', require('./components/Home.vue'));
// --

new Vue({
    el: '#milo-app'
});
