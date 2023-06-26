import { createRouter, createWebHistory } from 'vue-router';
import Navbar from "./components/Navbar.vue";
import Addnew from "./components/Addnew.vue";
import Dashboard from "./pages/Dashboard.vue";
import {createApp} from 'vue';


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      name: 'Navbar',
      path: '/',
      component: Navbar,
    },
    {
      name: 'Dashboard',
      path: '/dashboard',
      component: Dashboard,
    },
    {
      name: 'Addnew',
      path: '/addnew',
      component: Addnew,
    },
  ],
});

export default router;
