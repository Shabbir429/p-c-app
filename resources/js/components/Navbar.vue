<template>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="/dashboard">{{title}}</a> -->
            <router-link class="navbar-brand" to="/dashboard">{{title}}</router-link>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Pons & Cons App</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard">Dilemmas</a>
                        </li>
                        <li v-if="!user" class="nav-item">
                            <a href="/register" class="nav-link">Register</a>
                        </li>
                        <li v-if="!user" class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li v-if="user" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>&nbsp;&nbsp;{{ user.name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" @click="logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from "axios";
    export default{
        name: "Navbar",
        components:{
            
        },
        data() {   
            return {
            user: null,
            title:"Dashboard",
            };
        },
        mounted() {
            this.fetchUser();
        },
        methods: {
            fetchUser() {
            axios.get('/api/signin')
                .then(response => {
                this.user = response.data;
                // console.log(this.user);
                })
                .catch(error => {
                console.log(error);
                });
            },
            logout() {
            axios.post('/logout')
                .then(response => {
                this.user =null,
                console.log(this.user);
                window.location.href = '/login';
                })
                .catch(error => {
                console.log(error);
                });
            },
        }
    };
</script>
<style scoped>
.user{
    display:inline-flex !important;
}
</style>