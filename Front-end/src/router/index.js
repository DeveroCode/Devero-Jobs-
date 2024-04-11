import { createRouter, createWebHistory } from 'vue-router'
import IndexViewVue from '../Layouts/IndexView.vue'
import StartViewVue from '../Layouts/StartView.vue'
import Dashboard from '../Layouts/DashboardLayout.vue'
import HomeView from '@/views/HomeView.vue'
import Login from '@/views/LoginView.vue'
import Register from '@/views/RegisterView.vue'
import DashboardView from '@/views/DashboardView.vue'
import ProjectsView from '@/views/ProjectsView.vue'
import Profile from '@/components/Profile.vue'
import JobViewVue from '@/views/JobView.vue'

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
      meta: { requiresAuth: true },
      children: [
        {
          index: true,
          path: '',
          component: DashboardView
        },
        {
          path: 'proyectos',
          name: 'proyectos',
          component: ProjectsView
        },
        {
          path: 'perfil',
          name: 'perfil',
          component: Profile
        },
        {
          path: 'publicar',
          name: 'publicar',
          component: JobViewVue
        }
      ]
    }
  ]
})

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !localStorage.getItem('AUTH_TOKEN')) {
    next({ name: 'login' });
  } else {
    next();
  }
});

export default router
