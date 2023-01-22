
require('./bootstrap');

// window.Vue = require('vue').default;// this was here
import Vue from 'vue'
import VueRouter from 'vue-router';
import { routes } from './routes';

Vue.use(VueRouter);
Vue.component('employees-componet', require('./components/Index.vue').default); // this coded was here



const router = new VueRouter({
    mode: "history",
    routes: routes
});
// this was here
const app = new Vue({
    el: '#app',
    router,
});
