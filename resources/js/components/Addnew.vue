<template>
    <router-link to="/dashboard">
        <svg style="margin:60px; color:black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </router-link>
        <textarea v-model="listdata.title" class="textbox" placeholder="Description.." rows="8" cols="100" autofocus/>
        <span class="text-danger err" v-show="listErr.title">Discription is Required</span>
        <button type="button" @click="storetitle">Save</button>
</template>

<script>
import axios from "axios";
export default{
    name:"Addnew",
    mounted(){
        // console.log('Addnew')
    },
    data(){
        return{
            listdata:{
                title:"",
            },
            listErr: {
                title: false,
            },
        }
    },
    methods:{
        
        storetitle(){
            this.listdata.title == "" ? (this.listErr.title = true) : (this.listErr.title = false);
            if(this.listdata.title){
                axios.post('/api/title',this.listdata)
                .then(response => {
                    this.$router.push('/dashboard');
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style scoped>
.textbox{
    border: 0.3em solid;
    position: absolute;
    top: 15em;
    left: 47em;
    transform: translate(-50%, -50%);
    padding: 1em;
}
button{
    border: 0.1em solid;
    position: absolute;
    top: 35em;
    left: 80em;
    width:8em;
    height:3em;
    background:lightblue;
}
.err{
    margin:5.5em 0px 0px 14em;
    font-size:2.5em;
    position: absolute;
    z-index: 1;    
}
</style>