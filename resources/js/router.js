import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Students from './components/Students';
import Login from './components/Login.vue';
import Vue from 'vue';
Vue.use(VueRouter);
let routes = [

    {
        path: '/',
        component: Home

    },
    {
        path: '/students',
        component: Students
    },

    {
        path: '/login',
        component: Login
    }



];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active-link'
});
