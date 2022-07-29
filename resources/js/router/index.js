import {createRouter, createWebHistory} from 'vue-router';

import notFound from '../components/notFound.vue';

import habitIndex from '../components/habits/index.vue';

import habitCreate from '../components/habits/create.vue';

import habitUpdate from '../components/habits/update.vue';

const routes = [
    {
        path:'/',
        component: habitIndex
    },
    {
        path:'/habit/create',
        component: habitCreate
    },
    {
        path:'/habit/update/:id',
        component: habitUpdate,
        props: true
    },
    {
        path:'/:pathMatch(.*)*',
        component: notFound
    },
    ];

const router = createRouter({
    history: createWebHistory(process.env.APP_URL),
    routes
})

export default router
