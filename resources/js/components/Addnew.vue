<template>
    <!-- <router-link to="/dashboard">
        <svg style="margin:60px; color:black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </router-link>
        <textarea v-model="listdata.title" class="textbox" placeholder="Description.." rows="8" cols="100" autofocus/>
        <span class="text-danger err" v-show="listErr.title">Discription is Required</span>
        <button type="button" @click="storetitle">Save</button> -->
    
    <div class="container">
        <div class="row">
            <router-link to="/dashboard">
                <svg style="margin-top: 60px; color: black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </router-link>
            <div> 
                <textarea v-model="listdata.title" autofocus class="textbox text-capitalize" placeholder="Description.." rows="7"></textarea>
            </div>
        </div>
        <button class="btn" type="button" @click="!this.listdata.id ? storetitle() : edit(this.listdata.id)">Save</button>
    </div>

</template>

<script>
import axios from "axios"; 
export default{
    name:"Addnew",
    mounted(){

    },
    data(){
        return{
            listdata:{
                title:"",
                id:null
            },
        }
    },
    created() {
        const query = this.$route.query;
        if (query && query.data) {
            this.listdata.title = query.data;
            this.listdata.id = query.id;
        }
    },
    methods:{
        
        storetitle(){
            if(this.listdata.title){
                axios.post('/api/title',this.listdata)
                .then(response => {
                    this.$router.push('/dashboard');
                })
                .catch(error => {
                    console.log(error);
                });
            }
            else{
                alert('Description is Required...');
            }
        },
        edit(id){
            if(this.listdata.title){
                axios.post('/api/edit/' + id,this.listdata)
                .then(response => {
                    const data = this.listdata.title;
                    this.$router.push({
                        name: 'Dilemma',
                        query: { data,id },
                    });
                    this.id=null;
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
    }
};
</script>

<style scoped>
.textbox{
    border: 0.3em solid;
    width:100%;
    margin-top: 7em;
    padding: 1em;
    border-image: linear-gradient(122deg, rgba(159, 43, 250, 1) 0%, rgba(0, 226, 255, 1) 100%, rgba(238, 130, 238, 1) 100%);
    border-image-slice: 1;
}
button{
    border: 0.1em solid;
    width:8em;
    margin-top:10em;
    float:right;
    height:3em;
    background:linear-gradient(122deg, rgb(181, 103, 241) 0%, rgb(56, 221, 243) 100%, rgba(238, 130, 238, 1) 100%);
}
</style>