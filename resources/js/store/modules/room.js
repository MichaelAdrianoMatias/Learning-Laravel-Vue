const state = {
  rooms:[]
}

const mutations = {
  SET_DATA(state, payload) { 
    state.rooms = payload;
  },
  UPDATE_DATA(state, {room, newRoom}) {
    Object.assign(room, newRoom);
  },
  ADD_DATA(state, payload) {
    state.rooms.unshift(payload);
  },
  REMOVE_DATA(state, index) {
    state.rooms.splice(index,1);
  }
}
const getters = {
  getRooms(state) {
    return state.rooms;
  },
}

const actions = {
  async fetch({commit}) {
   await axios.get('/api/room')
    .then(response => {
      commit('SET_DATA',response.data.data)
    })
    .catch(error => {
      console.log(error);
    });
  },
  getById({commit},id) {
    return axios.get('/api/room/' + id)
      .then(response => {
        commit('SET_DATA',response.data)
    })
  },
  fetchType({commit}) {
    // axios.get('/')
  },
  update({state, commit}, payload) {
    axios.patch('/api/room/' + payload.id)
    .then(response => {
      console.log('Success')      
    }).catch(error => {
      console.log(error)
    })
  },
  create({commit},payload) {
     return axios
      .post('/api/room', payload)
      .then(response => {
        commit('ADD_DATA', response.data)
      })
      .catch(error => {
        console.log(error)
      });
  },
  delete({state,commit},payload) {
   const index = state.rooms.indexOf(payload);
    axios.delete('/api/room/' + payload.id)
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



































// const room = {
//   namespaced: true,
//   state: {
// 		rooms:[]
//   },
//   mutations: {
//     setRooms(state, payload) { 
//       state.rooms = payload;
//     },
//     update(state, {room, newRoom}) {
//       Object.assign(room, newRoom);
//     },
//     remove(state, index) {
//       state.rooms.splice(index, 1);
//     },
    
//     add(state, task) {
//       state.rooms.push(task);
//     }
//   },
//   getters: {
//     getRooms(state) {
//       return state.rooms;
//     }
//   },

//   actions: {
//     getRooms({commit}) {
//       axios.get('/api/room')
//       .then(response => {
//         commit('setRooms',response.data)
//         console.log(response.data);

//       }).then(response => {
//         console.log(response);
//       })
//       .catch(error => {
//         console.log(error);
//       });
//     },
//     async remove({state, commit}, room) {
//       const index = state.rooms.indexOf(room);
//       return await axios.delete('/api/room/'+ room.id)
//         .then(response => {
//           commit('remove', index);
//           return true;
//         })
//         .catch(error => {
//           console.log(error)
//         });
//     },
//     async save({state,commit}, room) {
//       return await axios.post('/api/room/', room)
//         .then(response => {
//           commit('add', response.data);
//           return true;
//         })
//         .catch(error => {
//           console.log(error)
//         });
//     },
//     async update({state, commit}, newRoom) {
//       const room = state.rooms.indexOf((oldRoom) => {
//         oldRoom.id === newRoom.id
//       });
      
//       if (!room) {
//         return false;
//       }
//       return await axios.patch('/api/room/'+ newRoom.id, newRoom)
//         .then(response => {
//           commit('update',{room, newRoom});
//           return true;
//         })
//         .catch(error => {
//           console.log(error)
//         });
//       },
//     }   
//   }

