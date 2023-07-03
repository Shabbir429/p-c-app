import { createRouter, createWebHistory } from 'vue-router';
import Navbar from "./components/Navbar.vue";
import Addnew from "./components/Addnew.vue";
import Dilemma from "./pages/Dilemma.vue";
import Dashboard from "./pages/Dashboard.vue";
import {createApp} from 'vue';


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      name: 'Dashboard',
      path: '/dashboard',
      component: Dashboard,
    },
    {
      name: 'Nvbar',
      path: '/navbar',
      component: Navbar,
    },
    {
      name: 'Addnew',
      path: '/addnew',
      component: Addnew,
    },
    {
      name: 'Dilemma',
      path: '/dilemma',
      component: Dilemma,
    },
  ],
});

export default router;
