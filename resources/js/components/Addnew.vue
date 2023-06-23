<template>
    <router-link to="/dashboard">
        <svg style="margin:60px; color:black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </router-link>
        <textarea class="textbox" placeholder="Description.." rows="8" cols="100" autofocus/>
        <button @click="savedata">Save</button>
</template>

<script>
import axios from "axios";
export default{
    name:"Addnew",
    mounted(){
        console.log('Addnew')
    },
    mathods:{
        savedata(){
            axios.get('/api/save')
            .then(response => {
                this.$router.push('/dashboard');
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>
.textbox{
    border: 5px solid;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
}
button{
    border: 2px solid;
    position: absolute;
    top: 70%;
    left: 80%;
    width:120px;
    height:50px;
    background:lightblue;
}
</style>