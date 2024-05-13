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
import ProjectsLayoutVue from '@/Layouts/ProjectsLayout.vue'
import EditView from '@/views/Dashboard/EditProjectView.vue'

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
        },
        {
          path: '/projects',
          name: 'projects',
          component: ProjectsLayoutVue
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
          props: true,
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
        },
        {
          path: 'editar/:id',
          name: 'editar',
          component: EditView,
          props: true
        },
        {
          path: 'notificacion/:id',

        }
      ]
    },
  ]
})

router.beforeEach(async (to, from, next) => {
  // Verificar si la ruta requiere autenticación y el token de autenticación está presente
  if (to.meta.requiresAuth && !localStorage.getItem('AUTH_TOKEN')) {
    next({ name: 'login' })
  } else {
    // Obtener información del usuario desde el backend
    try {
      const userInfo = await getUserInfo()
      // Verificar si el usuario tiene el id correcto para acceder a la vista de proyectos
      if (to.name === 'projects' && userInfo.id !== 2) {
        next({ name: 'dashboard' }) // Redirigir a otra ruta si el usuario no tiene permiso
      } else {
        next() // Continuar navegando si el usuario tiene permiso
      }
    } catch (error) {
      console.error('Error al obtener la información del usuario:', error)
      next() // Continuar navegando si hay un error al obtener la información del usuario
    }
  }
})

export default router
