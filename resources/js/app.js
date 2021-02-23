import _ from 'lodash';
import Vue from 'vue';
import VueTailwind from 'vue-tailwind';
import Vue2SimpleDatatable from 'vue2-simple-datatable';
import components from './tailwindcss';
require('./bootstrap');

// Register Vue
window.Vue = require('vue').default;

Object.defineProperty(Vue.prototype, '$_', { value: _ });

// Register Vue Plugins
Vue.use(VueTailwind, components);

// Create Instance
// eslint-disable-next-line no-unused-vars
const app = new Vue({
  el: '#app',
});
