require('./bootstrap');

var moment = require('moment');

//window.Vue = require('vue'); 83. lekcija
import Vue from 'vue'

Vue.component('quiz-component', require('./components/QuizComponent.vue').default);

const app = new Vue({
    el: '#app',
});
