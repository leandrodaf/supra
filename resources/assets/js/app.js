import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'

window.$ = window.jQuery = require('jquery');

require('bootstrap3');
var $ = require('jquery');


select2 = require('select2');
window.Vue = require('vue');


Vue.component('gradeAlunos', require('./components/gradeAlunos.vue'));
Vue.component('modalAlunoDesvincular', require('./components/modalDesvincular'));
Vue.component('infoBox', require('./components/infoBox'));
Vue.component('infoClass', require('./components/InfoClass'));
Vue.component('yearClass', require('./components/yearClass'));
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));
Vue.component('quadradeco', require('./components/quadradeco.vue'));

Vue.use(VueAxios, axios);
Vue.use(VueChartkick, {adapter: Chart})


// Vue.use(VueChartkick, {adapter: Chart})
const app = new Vue({
    el: '#app'
});

