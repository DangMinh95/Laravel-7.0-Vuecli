import axios from "axios";

const login = {
  state: {
    token: {},
    dataRegister: {}
  },
  getters: {
    token(state) {
      return state.token;
    },
    dataRegister(state) {
      return state.dataRegister;
    }
  },
  mutations: {
    login(state, token) {
      state.token = token;
    },
    register(state, dataRegister) {
      state.dataRegister = dataRegister;
    }
  },
  actions: {
    loginAction({ commit }, data) {
      return axios
        .post("api/login", {
          name: data.name,
          password: data.pass,
        })
        .then(function (response) {
          commit('login', response.data);
        })
        .catch(function (error) {
          commit('login', error.response.data);
        });
    },
    registerAction({ commit }, data) {
      return axios
        .post("api/register", {
          name: data.name,
          password: data.pass,
        })
        .then(function (response) {
          commit('register', response.data);
        })
        .catch(function (error) {
          commit('register', error.response.data);
        });
    },
  },
};

export default login;
