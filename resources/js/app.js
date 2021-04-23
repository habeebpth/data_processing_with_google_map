require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/app'
import Home from './views/home'
import dataWithInfobox from './views/dataWithInfobox';
import filterWithGender from './views/filterWithGender';
import filterWithNames from './views/filterWithNames';
import filterWithLocations from './views/filterWithLocations';
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/data-with-infobox',
            name: 'google-map-with-infobox',
            component: dataWithInfobox
        },
        {
            path: '/filter-with-gender',
            name: 'filter-with-gender',
            component: filterWithGender
        },
        {
            path: '/filter-with-names',
            name: 'filter-with-names',
            component: filterWithNames
        },
        {
            path: '/filter-with-locations',
            name: 'filter-with-locations',
            component: filterWithLocations
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
