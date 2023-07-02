/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import router from './router';


//if you want app by vue by this vue app
import App  from '../views/layouts/app.vue';
createApp(App).use(router).mount('#app');


// app.use(router).mount('#app');
