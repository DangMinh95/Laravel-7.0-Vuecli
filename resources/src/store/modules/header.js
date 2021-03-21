import axios from "axios";

const header = {
  state: {
    logoutConfirm: {}
  },
  getters: {
    logoutConfirm(state) {
      return state.logoutConfirm;
    }
  },
  mutations: {
    logout(state, data) {
      state.logoutConfirm = data;
    }
  },
  actions: {
    logout({ commit }) {
      return axios.
        post('api/logout')
        .then(function (response) {
          commit('logout', response.data);
        })
        .catch(function (error) {
          commit(error);
        });
    }
  }
}

export default header;