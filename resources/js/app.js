require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import routes from './router'

Vue.component('navigation', require('./components/Navigation').default);
const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});