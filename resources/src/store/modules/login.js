import axios from "axios";

const login = {
  state: {
    token: {}
  },
  getters: {
    token(state) {
      return state.token;
    }
  },
  mutations: {
    login(state,token){
      state.token = token;
    }
  },
  actions: {
    loginAction({ commit }, dataLogin) {
        return axios
          .post("api/login", {
            name: dataLogin.name,
            password: dataLogin.pass,
          })
          .then(function(response) {
            commit('login',response.data);
          })
          .catch(function(error) {
            commit('login',error.response.data);
          });
    },
  },
};

export default login;
