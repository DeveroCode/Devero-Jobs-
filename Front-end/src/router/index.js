import { createRouter, createWebHistory } from 'vue-router'
import IndexViewVue from '../Layouts/IndexView.vue'
import StartViewVue from '../Layouts/StartView.vue'
import Dashboard from '../Layouts/DashboardLayout.vue'
import HomeView from '@/views/HomeView.vue'
import Login from '@/views/LoginView.vue'
import Register from '@/views/RegisterView.vue'
import DashboardView from '@/views/DashboardView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: IndexViewVue,
      children: [
        {
          index: true,
          path: '',
          component: HomeView
        }
      ]
    },
    {
      path: '/start',
      name: 'start',
      component: StartViewVue,
      children: [
        {
          path: 'login',
          name: 'login',
          component: Login
        },
        {

          path: 'register',
          name: 'register',
          component: Register

        }
      ]
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard,
      children: [
        {
          index: true,
          path: '',
          component: DashboardView
        }
      ]
    }
  ]
})

export default router
