const state = {
    amenities:[]
  }
  
  const mutations = {
    SET_DATA(state, payload) { 
      state.amenities = payload;
    },
    UPDATE_DATA(state, {amenities, payload}) {
      Object.assign(amenities, payload);
    },
    ADD_DATA(state, payload) {
      state.amenities.unshift(payload);
    },
    REMOVE_DATA(state, index) {
      state.amenities.splice(index,1);
    }
  }
  const getters = {
    getAmenities(state) {
      return state.amenities;
    },
  }
  
  const actions = {
    async fetch({commit}) {
     await axios.get('/api/amenities')
      .then(response => {
        commit('SET_DATA',response.data)
      })
      .catch(error => {
        console.log(error);
      });
    },
    getById({commit},id) {
      return axios.get('/api/amenities/' + id)
        .then(response => {
          commit('SET_DATA',response.data)
      })
    },
   
    update({state, commit}, payload) {
      axios.patch('/api/amenities/' + payload.id)
      .then(response => {
        console.log('Success')      
      }).catch(error => {
        console.log(error)
      })
    },
    create({commit},payload) {
       return axios
        .post('/api/amenities', payload)
        .then(response => {
          commit('ADD_DATA', response.data)
        })
        .catch(error => {
          console.log(error)
        });
    },
    delete({state,commit},payload) {
     const index = state.amenities.indexOf(payload);
      axios.delete('/api/amenities/' + payload.id)
      commit('REMOVE_DATA',index);
    },
    commit_data({commit},payload) {
      commit('ADD_DATA', payload)
    }
  }
  
  export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
  }
  
  
  