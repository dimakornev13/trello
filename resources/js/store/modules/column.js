const state = {
    columns: [],
    column: null
};
/*****************************************************/
const getters = {};
/*****************************************************/
const actions = {
    async createColumn({dispatch}, formData) {
        let response = await axios.post('/api/columns', formData)

        return dispatch('dashboards/loadSingleDashboard', null, {root: true})
    },

    async deleteColumn({dispatch}) {
        let response = await axios.delete('/api/columns/' + this.state.column.column.id);

        return dispatch('dashboards/loadSingleDashboard', null, {root: true})
    },

    async updateColumn({dispatch}, formData) {
        const id = this.state.column.column.id

        let response = await axios.post('/api/columns/' + id, formData);
    },

    async sortColumn({dispatch, commit}, newColumnsSet) {
        commit('SET_COLUMNS', newColumnsSet);

        newColumnsSet = newColumnsSet.map((newColumn) => {
            return newColumn.id
        });

        let response = await axios.post('/api/columns/sort/' + this.state.dashboards.dashboard.id, {set: newColumnsSet});
    },

};
/*****************************************************/
const mutations = {
    SET_COLUMNS(state, payload) {
        state.columns = payload
    },

    SET_SINGLE_COLUMN(state, id) {
        state.column = state.columns.find((d) => d.id === id)
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
