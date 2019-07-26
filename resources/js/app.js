import router from './router.js';
require('./bootstrap');

window.Vue = require('vue');



const app = new Vue({
    el: '#app',
    router: router
});
