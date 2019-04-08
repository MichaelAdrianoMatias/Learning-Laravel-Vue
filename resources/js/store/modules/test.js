
    const state = {
        rooms: []
    };
    const mutations = {
        setData(state, rooms) {
            state.rooms = rooms;
        }
    };

    const getters = {
        getRooms(state) {
            return state.rooms;
        }
    };

    const actions = {
        async fetch ({ commit }) {
            await axios.get('/api/room').then(res => {
                commit('setData', res.data);
            });
        },
    };
    export default {
        namespaced: true,
        state,
        mutations,
        getters,
        actions
    };