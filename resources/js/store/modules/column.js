const state = {
    columns: []
};
/*****************************************************/
const getters = {};
/*****************************************************/
const actions = {};
/*****************************************************/
const mutations = {
    SET_COLUMNS(state, payload) {
        state.columns = payload
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
