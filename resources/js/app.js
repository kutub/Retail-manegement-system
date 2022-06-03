require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy';
import VueHtmlToPaper from 'vue-html-to-paper';
import moment from 'moment'

import { library } from '@fortawesome/fontawesome-svg-core';
// internal icons
import { faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle,
    faArrowUp, faAngleRight, faAngleLeft, faAngleDown,
    faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle,
    faArrowUp, faAngleRight, faAngleLeft, faAngleDown,
    faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload);
Vue.component('vue-fontawesome', FontAwesomeIcon);

const options = {
    name: '_blank',
    specs: [
      'fullscreen=yes',
      'titlebar=yes',
      'scrollbars=yes'
    ],
    styles: [
      '/css/app.css',
      '/css/kidlat.css',
    ]
  }

  Vue.use(Buefy, {
    defaultIconComponent: 'vue-fontawesome',
    defaultIconPack: 'fas',
  });
Vue.use(VueHtmlToPaper, options);

Vue.filter('formatDate', function (value, formatType='LL') {
  if (!value) return ''
  return moment(value).format(formatType)
})

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('slugWidget', require('./components/slugWidget.vue').default);
Vue.component('pageSlide', require('./components/pageSlide.vue').default);
Vue.component('customerHistory', require('./components/customerHistory.vue').default);
Vue.component('supplierHistory', require('./components/supplierHistory.vue').default);
Vue.component('customer', require('./components/sales/Customer.vue').default);
Vue.component('customerPayment', require('./components/sales/CustomerPayment.vue').default);
Vue.component('sideNav', require('./components/sideNav.vue').default);
Vue.component('createItemForm', require('./components/products/createItemForm.vue').default);
Vue.component('editItemForm', require('./components/products/editItemForm.vue').default);
Vue.component('salesModule', require('./components/sales/SalesModule.vue').default);
Vue.component('productsModule', require('./components/products/ProductsModule.vue').default);
Vue.component('receiveProducts', require('./components/buy/ReceiveProduct.vue').default);

Vue.component('dashboard', require('./pages/Dashboard.vue').default);


// const app = new Vue({
//     el: '#app',
// });
import store from './store/index';
var app = new Vue({
  el: '#app',
  store,
  data() {
    return {
      customer_id:'',
      isTagline: 1,
      isNote:1,
      isDescription:1,
      taxable: 1,
      disable_loyalty:0,
      override_tax:0,
      file:null,
      date: new Date(),
    }
  },
  methods: {
          
    customerId: function(val){
        this.customer_id = val.id;
      }
    },
});
require('./manage')