import Vuex from 'vuex'
import Vue from 'vue';

import * as actions from './actions'
import * as getters from './getters'
import * as mutations from './mutations'

/* import modules */
import room from './modules/room'
import roomtype from './modules/roomtype'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  getters,
  mutations,
  actions,
  modules: {
    room, roomtype
  },
});






