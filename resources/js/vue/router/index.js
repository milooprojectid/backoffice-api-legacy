import Router from 'vue-router';
import store from '../store';

// Pages
import Home from '../hoc/pages/Home';
import Login from '../hoc/pages/Login';
import Notfound from '../hoc/pages/NotFound';

const checkAuth = (to, from, next) => {
    if (!store.getters.getToken) return next('/login');
    return next()
};

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home,
            beforeEnter: checkAuth
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            beforeEnter(to, from, next) {
                if (store.getters.getToken) return next('/home')
                return next();
            }
        },
        {
            path: '*',
            component: Notfound
        }
    ],
})
