const state = {
    task: null
};
/*****************************************************/
const getters = {};
/*****************************************************/
const actions = {
    async createTask({commit}, task) {
        let response = axios.post('/api/tasks', task)

        commit('column/ADD_NEW_TASK', task, {root: true})
    },

    async updateTask({commit}, task) {
        let response = axios.post('/api/tasks/' + task.id, task)
    },

    async deleteTask({dispatch}, task) {
        let response = axios.delete('/api/tasks/' + task.id)

        return dispatch('dashboards/loadSingleDashboard', null, {root: true})
    },

    setSingleTask({commit}, taskID) {
        const task = this.state.column.column.tasks.find((task) => task.id === taskID)

        commit('SET_SINGLE_TASK', task)
    }
};
/*****************************************************/
const mutations = {
    SET_SINGLE_TASK(state, task) {
        state.task = task
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
