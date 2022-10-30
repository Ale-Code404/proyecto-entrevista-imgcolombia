import store from '../store';

import { createRouter, createWebHistory } from 'vue-router';
import { purchaseRoutes } from './purchases';
import { fromJSON } from 'postcss';

const NotFound = () =>  import('./../components/errors/NotFound.vue');
const Login = () => import('./../components/auth/Login.vue');
const Registro = () =>  import('./../components/auth/Register.vue');
const Home = () => import('./../components/Home.vue');

const routes = [
    {
        name: 'Root',
        path: '/',
        redirect: '/login',
        meta: { requireAuth: false }
    },
    {
        name: 'Home',
        path: '/home',
        component: Home,
        meta: { requireAuth: true }
    },
    {
        name: 'Login',
        path: '/login',
        component: Login,
        meta: { requireAuth: false }
    },
    {
        name: 'Register',
        path: '/register',
        component: Registro,
        meta: { requireAuth: false }
    },
    {
        name: 'NotFound',
        path: '/:pathMatch(.*)*',
        component: NotFound,
        meta: { requireAuth: false }
    },

    ...purchaseRoutes
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach(async (to) => {
    const documentTitle = (to.meta.title ?? import.meta.env.VITE_APP_TITLE);
    document.title = documentTitle;

    const requireAuthTo = (to.meta.requireAuth ?? true);
    const isLogged = store.getters['auth/hasToken'];

    if(isLogged && to.name === 'Login'){
      return { name: 'Home' }
    }

    if(requireAuthTo && !isLogged) {
        return { name: 'Login' }
    }
});

export default router;
