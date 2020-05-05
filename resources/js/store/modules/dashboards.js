import router from '../../router'

const state = {
    dashboards: [],
    dashboard: null
};
/*****************************************************/
const getters = {
    dashboardsExists(state) {
        return state.dashboards.length > 0
    },
};
/*****************************************************/
const actions = {
    async loadDashboards({commit}) {
        let response = await axios.get('/api/dashboards');

        commit('SET_DASHBOARDS', response.data)
    },

    async loadSingleDashboard({commit}, payload) {
        let id = payload !== null && payload.id !== null
            ? payload.id
            : this.state.dashboards.dashboard.id;

        let response = await axios.get('/api/dashboards/' + id);

        commit('SET_SINGLE_DASHBOARD', id);
        commit('column/SET_COLUMNS', response.data, {root: true})
    },

    async createDashboard({dispatch}, formData){
        let response = await axios.post('/api/dashboards', formData);

        return dispatch('loadDashboards')
    },

    async updateDashboard({dispatch}, formData){
        let response = await axios.post(`/api/dashboards/${this.state.dashboards.dashboard.id}`, formData);

        return dispatch('loadDashboards')
    },

    async deleteDashboard({dispatch}){
        let response = await axios.delete(`/api/dashboards/${this.state.dashboards.dashboard.id}`);

        return dispatch('loadDashboards')
    },
};
/*****************************************************/
const mutations = {
    SET_DASHBOARDS(state, payload) {
        state.dashboards = payload
    },

    SET_SINGLE_DASHBOARD(state, id) {
        state.dashboard = state.dashboards.find((d) => d.id === id)

        document.title = state.dashboard.title
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
