import Vuex from 'vuex'
import Vue from 'vue';

import * as actions from './actions'
import * as getters from './getters'
import * as mutations from './mutations'

/* import modules */
import room from './modules/room'
import roomtype from './modules/roomtype'
import roomrate from './modules/roomrate'
import amenities from './modules/amenities'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  getters,
  mutations,
  actions,
  modules: {
    room, roomtype, roomrate, amenities
  },
});







