import {createRouter, createWebHistory} from "vue-router";
import store from "../store";
import router from "./index";

const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import('../components/pages/home-page.vue'),
        meta: { requiresAuth: false }
    },
    {
        path: '/product-details',
        name: 'product-details',
        component: () => import('../components/pages/product-details.vue'),
        meta: { requiresAuth: false }
    },
    {
        path: '/cart',
        name: 'cart',
        component: () => import('../components/pages/cart.vue'),
        meta: { requiresAuth: false }
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../components/pages/login.vue'),
        meta: { requiresAuth: false }
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: () => import('../components/pages/checkout.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/:catchAll(.*)',
        name: '404',
        component: () => import('../components/pages/404.vue'),
        meta: { requiresAuth: false }
    }
]

const activeRouter = createRouter({
    history: createWebHistory(),
    routes
})



export default activeRouter;
