<template>
    <Navbar></Navbar>
    <router-view></router-view>
</template>

<script>
import Navbar from "./components/Navbar.vue";
export default{
  name: 'App',
  components:{
    Navbar,
  }
}
</script>

<style>
/* Add your app-wide styles here */
</style>

