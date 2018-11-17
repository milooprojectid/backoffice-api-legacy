import Router from 'vue-router';
import store from '../store';

// Pages
import Home from '../hoc/pages/Home';
import Source from '../hoc/pages/Source';
import Link from '../hoc/pages/Link';
import Raw from '../hoc/pages/Raw';
import Corpus from '../hoc/pages/Corpus';
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
            path: '/',
            redirect: '/home'
        },
        {
            path: '/home',
            name: 'home',
            component: Home,
            beforeEnter: checkAuth
        },
        {
            path: '/sources',
            name: 'sources',
            component: Source,
            beforeEnter: checkAuth
        },
        {
            path: '/links',
            name: 'links',
            component: Link,
            beforeEnter: checkAuth
        },
        {
            path: '/raws',
            name: 'raws',
            component: Raw,
            beforeEnter: checkAuth
        },
        {
            path: '/corpuses',
            name: 'corpuses',
            component: Corpus,
            beforeEnter: checkAuth
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            beforeEnter(to, from, next) {
                if (store.getters.getToken) return next('/home');
                return next();
            }
        },
        {
            path: '*',
            component: Notfound
        }
    ],
})
