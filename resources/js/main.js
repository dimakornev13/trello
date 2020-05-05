require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

require('./store/subscriber');

Vue.config.productionTip = false

store.dispatch('auth/loadUser', localStorage.getItem('token'));

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
