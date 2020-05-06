const state = {};
/*****************************************************/
const getters = {};
/*****************************************************/
const actions = {
    async addComment({dispatch}, comment) {
        let response = await axios.post('/api/comments/' + comment.task_id, comment)

        return dispatch('task/showTask', comment.task_id, {root: true})
    },

    async deleteComment({dispatch}, comment) {
        let response = await axios.delete('/api/comments/' + comment.id)

        return dispatch('task/showTask', comment.task_id, {root: true})
    }
};
/*****************************************************/
const mutations = {};
/*****************************************************/

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
