
const state = {
    roomtype: {}
}
const mutations = {
    SET_DATA(state, payload) {
        state.roomtype = payload;
    },
    REMOVE_DATA(state, index) {
        state.roomtype.splice(index,1);
    },
    UPDATE_DATA(state, {roomType, payload}) {
        Object.assign(roomType, payload);
    },
    ADD_DATA(state, payload) {
        state.rooms.unshift(payload);
    },
}
const getters = {
    getRoomTypes(state) {
        return state.roomtype;
    },
    getRoomTypeById:(state) =>(id) => {
        const roomType = state.room.find((roomType) => {
            return roomType.id === id;
        });
        return roomType ? roomType.name : ''
    }

}
const actions = {
    async fetch({commit}) {
        await axios.get('/api/roomtype')
        .then(response => {
            console.log(response.data.data);
            commit('SET_DATA',response.data.data);
        })
        .catch(error => {
            console.log(error);
        })
    },
    delete({state,commit},payload) {
        const index = state.roomtype.indexOf(payload);
         axios.delete('/api/roomtype/' + payload.id)
         commit('REMOVE_DATA',index);
       },
    getById(payload) {
        axios.get('/api/roomtype' + payload.id)
        .then(() => {
            commit('SET_DATA',response.data.data);
        })
    },
    update({state, commit}, payload) {
        axios.patch('/api/roomtype/' + payload.id)
        .then(response => {
          commit('UPDATE_DATA', response.data)   
        }).catch(error => {
          console.log(error)
        })
      },
      commit_data({commit},mutation,payload) {
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