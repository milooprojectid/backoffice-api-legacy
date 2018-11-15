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
            path: '/source',
            name: 'source',
            component: Source,
            beforeEnter: checkAuth
        },
        {
            path: '/link',
            name: 'link',
            component: Link,
            beforeEnter: checkAuth
        },
        {
            path: '/raw',
            name: 'raw',
            component: Raw,
            beforeEnter: checkAuth
        },
        {
            path: '/corpus',
            name: 'corpus',
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
