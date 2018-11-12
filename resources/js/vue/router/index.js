import Router from 'vue-router';
import Home from '../pages/Home';
import Login from '../pages/Login';

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        }
    ],
})
