import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import dashboards from './modules/dashboards'
import column from './modules/column'
import task from './modules/task'
import comment from './modules/comment'
import history from './modules/history'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
      auth,
      dashboards,
      column,
      task,
      comment,
      history
  }
})
