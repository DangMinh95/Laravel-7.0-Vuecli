import Vue from "vue";
import Vuex from "vuex";
import LoginModule from "./modules/login";
import CommonModule from "./modules/header"
Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    login: LoginModule,
    header: CommonModule
  },
});
