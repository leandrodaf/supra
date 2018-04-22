import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js';
import VueFormWizard from 'vue-form-wizard';
import VueMask from 'v-mask'
import PictureInput from 'vue-picture-input'
import vSelect from 'vue-select'

window.$ = window.jQuery = require('jquery');
global.$ = global.jQuery = require('jquery');

require('bootstrap3');
var $ = require('jquery');
select2 = require('select2');
window.Vue = require('vue');

Vue.component('v-select', vSelect);
Vue.component('gradeAlunos', require('./components/gradeAlunos.vue'));
Vue.component('modalAlunoDesvincular', require('./components/modalDesvincular'));
Vue.component('infoBox', require('./components/infoBox'));
Vue.component('infoClass', require('./components/InfoClass'));
Vue.component('yearClass', require('./components/yearClass'));
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));
Vue.component('quadradeco', require('./components/quadradeco'));
Vue.component('infoNotifciation', require('./components/InfoNotifications'));
Vue.component('matricula', require('./components/matricula'));
Vue.component('boxDefault', require('./components/boxDefault'));
Vue.component('picture-input', PictureInput);

Vue.use(VueAxios, axios);
Vue.use(VueChartkick, {adapter: Chart});
Vue.use(VueFormWizard);
Vue.use(VueMask);

axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const app = new Vue({
    el: '#app'
});

