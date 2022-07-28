import {createRouter, createWebHistory} from 'vue-router'

import notFound from '../components/notFound.vue'

import habitIndex from '../components/habits/index.vue';

const routes = [
    {
        path:'/',
        component: habitIndex
    },
    {
        path:'/:pathMatch(.*)*',
        component: notFound
    }
    ];

const router = createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes
})

export default router
