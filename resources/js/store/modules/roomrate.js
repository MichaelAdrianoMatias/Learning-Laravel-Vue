
const state = {
    roomrates: []
}
const mutations = {
    SET_DATA(state, payload) {
        state.roomrates = payload;
    },
    REMOVE_DATA(state, index) {
        state.roomrates.splice(index,1);
    },
    UPDATE_DATA(state, {roomRate, payload}) {
        Object.assign(roomRate, payload);
    },
    ADD_DATA(state, payload) {
        state.roomrates.unshift(payload);
    },
}
const getters = {
    getRoomRates(state) {
        return state.roomrates;
    },

}
const actions = {
    async fetch({commit}) {
        await axios.get('/api/roomrate')
        .then(response => {
            console.log(response.data);
            commit('SET_DATA',response.data);
        })  
        .catch(error => {
            console.log(error);
        })
    },
    delete({state,commit},payload) {
        const index = state.roomrates.indexOf(payload);
         axios.delete('/api/roomrate/' + payload.id)
        commit('REMOVE_DATA',index);
       },
    getById(payload) {
        axios.get('/api/roomrate' + payload.id)
        .then(() => {
            commit('SET_DATA',response.data.data);
        })
    },
    update({state, commit}, payload) {
        axios.patch('/api/roomrate/' + payload.id)
        .then(response => {
          commit('UPDATE_DATA', response.data)   
        }).catch(error => {
          console.log(error)
        })
      },
      commit_data({commit},mutation, payload) {
        commit(mutation, payload);
      }
}
export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}