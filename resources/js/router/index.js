import Vue from 'vue'
import VueRouter from 'vue-router'

/* main container */
import Layout from '../layout/Layout';

import Login from '../views/auth/Login';
import Register from '../views/auth/Register';
import PageNotFound from '../views/auth/PageNotFound';
import Dashboard from '../components/Dashboard.vue';


/* pages routes */
import roomRouter from './modules/room';
import roomTypeRouter from './modules/roomtype';
import roomRateRouter from './modules/roomrate';

Vue.use(VueRouter)

export default new VueRouter({
  mode: 'history',
  scrollBehavior : () => ({ y: 0 }),
  routes: [
    {
      path: '/',
      redirect: '/dashboard',
      component: Layout,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        roomRouter,
        roomTypeRouter,
        roomRateRouter
      ]
    },
    {
      path: '/login',
      component: Login,
      name: 'Login'
    },
    {
      path: '/register',
      component: Register,
      name: 'register'
    },
    {
      path: '*',
      component: PageNotFound,

    }
  ]
});
