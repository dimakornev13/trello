import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import LoginPage from '../components/LoginPage'
import DashboardsPage from '../components/DashboardsPage'
import SingleDashboard from '../components/SingleDashboard'
import DashboardsDelete from '../components/modal-forms/DashboardsDelete'
import DashboardsUpdate from '../components/modal-forms/DashboardsUpdate'
import DashboardsCreate from '../components/modal-forms/DashboardsCreate'

import store from '../store'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },
    {
        path: '/dashboards',
        name: 'dashboards',
        component: DashboardsPage,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '/dashboards/create',
                name: 'dashboardsCreate',
                component: DashboardsCreate,
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/dashboards/update/:id',
                name: 'dashboardsUpdate',
                component: DashboardsUpdate,
                meta: {
                    requiresAuth: true
                },
            },
            {
                path: '/dashboards/delete/:id',
                name: 'dashboardsDelete',
                component: DashboardsDelete,
                meta: {
                    requiresAuth: true
                },
            },
        ]
    },
    {
        path: '/dashboards/:id',
        name: 'singleDashboard',
        component: SingleDashboard,
        meta: {
            requiresAuth: true
        }
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.state.auth.user)
            return next();

        next({name: 'login'})
    }

    next()
})

export default router
