require('./bootstrap');
// require('alpinejs');
import VueTailwind from 'vue-tailwind';
import components from './tailwindcss';

// Register Vue
const Vue = require('vue').default;
window.Vue = Vue;

// Register Vue Plugins
Vue.use(VueTailwind, components);
Vue.component('navigation', require('./components/global/Navigation.vue').default);

// Create Instance
// eslint-disable-next-line no-unused-vars
const app = new Vue({
    el: '#app',
});
