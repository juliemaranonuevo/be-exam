import Vue from 'vue';
import router from './router';

require('./bootstrap');


Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
    // el: '#app',
    router
}).$mount('#app')