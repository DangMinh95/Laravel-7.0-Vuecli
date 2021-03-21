import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login.vue'
import First from '../views/First.vue'
// const First = () => import('../views/First.vue')
// const Login = () => import('../views/Login.vue');
Vue.use(VueRouter)

const routes = [
  {
    path: '/login',
    component: Login
  },
  {
    path: '/first',
    component: First
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
