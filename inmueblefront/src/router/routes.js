import Login from '../pages/Login'
import Registro from "pages/Registro";
import History from "pages/History";
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: 'login', component: Login },
      { path: 'registro', component: Registro,meta: {requiresAuth: true} },
      { path: 'history', component: History,meta: {requiresAuth: true} },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
