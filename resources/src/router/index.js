import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login.vue'
import First from '../views/First.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/first',
    name: 'First',
    component: First
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
