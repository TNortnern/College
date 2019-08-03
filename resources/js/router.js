import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Students from './components/Students';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Logout from './components/Logout.vue';
import Instructors from './components/Instructors.vue';
import Vue from 'vue';
Vue.use(VueRouter);
let routes = [{
        path: '/',
        component: Home

    },
    {
        path: '/students',
        component: Students
    },

    {
        path: '/register',
        component: Register
    },

    {
        path: '/login',
        component: Login
    },

    {
        path: 'logout',
        component: Logout
    },
    {
        path: '/instructors',
        component: Instructors
    }


];


export default new VueRouter({
    routes,
    mode: 'history',
    hash: false,
    linkActiveClass: 'is-active-link'
});
