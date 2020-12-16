/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

import vSelect from 'vue-select';

// Install Vuex
Vue.use(Vuex)
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'chart.js/dist/Chart.css';
import 'chart.js/dist/Chart.js';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-list', require('./components/User/List.vue').default);
Vue.component('post-list', require('./components/Post/List.vue').default);
Vue.component('todo-list', require('./components/Todo/List.vue').default);
Vue.component('v-select', vSelect);

/** Vuex Storage */
export const store = new Vuex.Store({
    state: {
        userId: '',
        users: []
    },

    mutations: {
        updateUserId(state, userId) {
            state.userId = userId;
        },
        updateUsers(state, users) {
            state.users = users;
        },
    },

    getters: {
        userId: state => state.userId,
        users: state => state.users,
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$apiUrl = 'https://jsonplaceholder.typicode.com/';

new Vue({
    el: '#app',
    store,
    data: {
        // apiUrl: 'https://jsonplaceholder.typicode.com/',
    },
});
