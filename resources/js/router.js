import VueRouter from 'vue-router';
import Test from './components/ExampleComponent.vue';
import Students from './components/Students';
import Vue from 'vue';
Vue.use(VueRouter);
let routes = [

    {
        path: '/',
        component: Test

    },
    {
        path: '/students',
        component: Students
    },



];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active-link'
});
