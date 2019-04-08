require('./bootstrap');
require('vue-toastr/src/vue-toastr.scss');

import Vue from 'vue'

/* import main router globally */
import router from './router/index.js';

/* main store */
import store from './store/store.js';

/* import Main App Component */
import App from './views/App';

/* import Generic Components */
import Box from './components/Box.vue';
import Table from './components/Table.vue';
import Modal from './components/Modal.vue';
import ButtonPrimary from './components/buttons/ButtonPrimary';

/* ===================================== */

/* import plugins globally */
import Toastr from 'vue-toastr';
import VueProgressBar from 'vue-progressbar'
import {Form, HasError, AlertError } from 'vform';

/* ===================================== */

/* Register plugins globally */
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '100px'
})
Vue.use(Toastr, { 
  defaultTimeout: 5000,
  defaultProgressBar: false,
  defaultProgressBarValue: 0,
  defaultType: "success",
  defaultPosition: "toast-bottom-right",
});

/* Register Custom generic Components Globally */
Vue.component('box', Box);
Vue.component('custom-table', Table);
Vue.component('btn-primary', ButtonPrimary);
Vue.component('modal', Modal);

/* Register plugin components globally */
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/* Main App Component */
Vue.component('app', require('./views/App.vue').default)

window.Event = new Vue();

window.Form = Form;

const app = new Vue({
  store,
  router,
}).$mount('#app');

