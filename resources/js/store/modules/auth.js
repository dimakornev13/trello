import Vue from 'vue'
import VuePusher from 'vue-pusher'
import router from '../../router'

const state = {
    token: null,
    user: null
};
/*****************************************************/
const getters = {
    authenticated(state) {
        return state.user !== null && state.token !== null
    }
};
/*****************************************************/
const actions = {
    async login({dispatch}, form) {
        let response = await axios.post('/login', form);

        return dispatch('loadUser', response.data.access_token)
    },

    async loadUser({commit, state}, token) {
        if (token)
            commit('SET_TOKEN', token);

        if (!state.token)
            return;

        try {
            let response = await axios.get('/api/user');

            commit('SET_USER', response.data);

            Vue.use(VuePusher, {
                api_key: process.env.MIX_PUSHER_APP_KEY,
                options: {
                    wsHost: window.location.hostname,
                    wsPort: 6001,
                    wssPort: 6001,
                    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                    forceTLS: false,
                    disableStats: true,
                    authEndpoint: '/api/broadcasting/auth',
                    auth: {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    },

                }
            })

            return router.push({name: 'dashboards'})
        } catch (error) {
            commit('SET_TOKEN', null);
            commit('SET_USER', null)
        }
    }
};
/*****************************************************/
const mutations = {
    SET_TOKEN(state, token) {
        state.token = token
    },

    SET_USER(state, user) {
        state.user = user
    }
};
/*****************************************************/

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
