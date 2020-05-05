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
