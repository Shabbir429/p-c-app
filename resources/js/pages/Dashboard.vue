<template>
    <router-link to="/home">
        <svg style="margin:60px; color:black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </router-link>
    <div class="title">
        {{list.title}}
    </div>
    <img @click="Addnew" class="edit" width="100" height="100" src="https://img.icons8.com/external-others-inmotus-design/100/external-Edit-virtual-keyboard-others-inmotus-design.png" alt="external-Edit-virtual-keyboard-others-inmotus-design"/>
    <!-- <router-view></router-view> -->
</template>

<script>
import axios from "axios";
    export default{
        name: "Dashboard",
        components:{
        },
        data() {   
            return {
            title:"Dashboard",
            list:{},
            };
        },
        mounted() {
            this.gettitle();
        },
        methods: {
            Addnew() {
                this.$router.push('/addnew');
            },
            gettitle(){
                axios.get("/api/getlist")
                .then((response) => {
                this.list = response.data;
                })
                .catch((error) => {
                console.log(error);
                });
            },
        },
    };
</script>

<style scoped>
.edit{
    float: right;
    margin-top: 62vh;
    margin-right: 5px;
    size:200px;
    /*background:linear-gradient(to top, blue , lightblue);*/
    
}
.title{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    width:163vh; 
    height:3.5em;   
    position: absolute;
    left: 11%;
    margin-top:-40px;
    height:50px; 
}
    
</style>