import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';


window.$ = window.jQuery = require('jquery');

require('bootstrap3');
var $ = require('jquery');


select2 = require('select2');
window.Vue = require('vue');
// 'node_modules/bootstrap3/dist/js/bootstrap.min.js',

Vue.component('gradeAlunos', require('./components/gradeAlunos.vue'));
Vue.component('modalAlunoDesvincular', require('./components/modalDesvincular'));

Vue.use(VueAxios, axios);


const app = new Vue({
    el: '#app'
});

