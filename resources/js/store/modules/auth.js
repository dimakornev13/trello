import router from '@/router'

const state = {
    token: localStorage.getItem('token') || '',
    user: {}
}
/**************************************************************************/
const getters = {
    isLogged: state => !!state.token
}
/**************************************************************************/

const actions = {
    login({commit, dispatch}, user) {
        return new Promise((resolve, reject) => {
            axios.post('/login', user).then((response) => {
                commit('setToken', response.data.access_token);
                dispatch('loadUser');
            }).catch((e) => reject(e))
        });
    },

    logout({commit}) {
        return new Promise((resolve, reject) => {
            axios.post('/logout').then((response) => {
                commit('logout');
                router.push('/');
            }).catch((e) => reject(e.response))
        });
    },

    loadUser({commit}) {
        axios.get('/api/user').then((response) => {
            commit('setUser', response.data);
            router.push('/dashboards')
        })
    },

    setUser({commit}, user) {
        commit('setUser', user)
    },

    setToken({commit}, token) {
        commit('setToken', token)
    }
};
/**************************************************************************/

const mutations = {
    setUser(state, user) {
        state.user = Object.assign({}, user)
    },

    setToken(state, token) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
        localStorage.setItem('token', token);
        state.token = token
    },

    logout(state) {
        localStorage.removeItem('token')
        delete axios.defaults.headers.common['Authorization'];
        state.token = ''
    }
}
/**************************************************************************/

export default {
    // namespaced: true,
    state,
    getters,
    actions,
    mutations
}
