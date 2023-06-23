<template>
  <div id="app">
    <Navbar></Navbar>
    <!-- <Dashboard></Dashboard> -->
    <!-- <Addnew></Addnew> -->
    <router-view></router-view>
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
// import Dashboard from "./pages/Dashboard.vue";
// import Addnew from "./components/Addnew.vue";
export default{
  name: 'App',
  components:{
    Navbar,
    // Dashboard,
    // Addnew
  }
}
</script>

<style>
/* Add your app-wide styles here */
</style>

