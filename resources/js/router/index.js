import {createRouter, createWebHistory} from 'vue-router';

import notFound from '../components/notFound.vue';
import habitsIndex from '../components/habits/index.vue';
import habitCreate from '../components/habits/create.vue';
import habitUpdate from '../components/habits/update.vue';
import habitView from '../components/habits/view.vue';
import siteIndex from '../components/site/index.vue';

const routes = [
    {
        path:'/',
        component: siteIndex
    },
    {
        path:'/habits/',
        component: habitsIndex
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
        path:'/habit/view/:id',
        component: habitView,
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
