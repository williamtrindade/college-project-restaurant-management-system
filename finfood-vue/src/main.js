import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import { library } from '@fortawesome/fontawesome-svg-core'
import {
	faUserSecret,
	faSignOutAlt,
	faEdit,
	faTrash,
	faUsers,
	faPlus
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

library.add(
	faUserSecret,
	faSignOutAlt,
	faEdit,
	faTrash,
	faUsers,
	faPlus
);

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('v-select', vSelect)
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
