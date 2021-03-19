require('./bootstrap');

import Vue from 'vue';
import {
  BootstrapVue,
  IconsPlugin
} from 'bootstrap-vue';

import App from './vue/app';
import AddDvdForm from './vue/addDvdForm';
import EditDvdForm from './vue/editDvdForm';
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)

Vue.use(IconsPlugin)

const app = new Vue({
  el: '#app',
  components: {
    App,
    AddDvdForm,
    EditDvdForm
  }
});
