import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        redirect: '/main'
    },
    {
        path: '/login',
        meta: { isPublic: true },
        component: () => import('../views/login/Login.vue'),
        children: [
            {
                path: '/login',
                redirect: '/login/signin'
            },
            {
                path: '/login/signin',
                component: () => import('../views/login/signin/Signin.vue'),
            },
        ],
    },
    {
        path: '/main',
        meta: { isPublic: false },
        component: () => import('../views/main/Main.vue'),
        children: [
            {
                path: '/main',
                redirect: '/main/task'
            },
            {
                path: '/main/task',
                component: () => import('../views/main/task/AllTask.vue'),
            },
            {
                path: '/main/task/create',
                component: () => import('../views/main/task/CreateTask.vue'),
            },
            {
                path: '/main/task/read',
                component: () => import('../views/main/task/ReadTask.vue'),
            },
            {
                path: '/main/task/update',
                component: () => import('../views/main/task/UpdateTask.vue'),
            },
            {
                path: '/main/user',
                component: () => import('../views/main/user/AllUser.vue'),
            },
            {
                path: '/main/user/create',
                component: () => import('../views/main/user/CreateUser.vue'),
            },
            {
                path: '/main/user/read',
                component: () => import('../views/main/user/ReadUser.vue'),
            },
            {
                path: '/main/user/update',
                component: () => import('../views/main/user/UpdateUser.vue'),
            },
        ],
    },
    {
        path: '*',
        component: () => import('../views/404.vue'),
    },
]

const router = new VueRouter({
    mode: 'hash',
    base: process.env.BASE_URL,
    routes
})

export default router
