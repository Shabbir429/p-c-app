<template>
    <!-- <a href="/dashboard">
        <svg style="margin:60px; color:black;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a> -->
    <!-- <div class="print">
        <div v-for="item in list" class="title">
            <span class="list">
                <div class="circle">{{ getFirstLetter(item.title) }}</div>
                <div class="data">{{item.title}}</div>  
                <div class="date-time">{{item.date}} {{item.time}}</div>
            </span>
        </div>
    </div> -->
   <div class="grand_parent">
        <!-- <div class="row"> -->
            <div class="parents" v-for="item in list">
                <div class="title">
                    <div class="circle">{{ getFirstLetter(item.title) }}</div>
                    <div class="data">{{ item.title }}</div>
                    <div class="date-time">{{ item.date }} {{ item.time }}</div>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <!-- <b-row class="print">
        <b-col cols="12" sm="6" md="4" lg="3" xl="2" v-for="item in list" class="title">
                <b-card class="circle">{{ getFirstLetter(item.title) }}</b-card>
                <b-card class="data">{{ item.title }}</b-card>
                <b-card class="date-time">{{ item.date }} {{ item.time }}</b-card>
        </b-col>
    </b-row> -->

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
            getFirstLetter(title) {
                return title.charAt(0);
            },
        },
    };
</script>

<style scoped>
.edit{
    float: right;
    margin-top: 32em;
    margin-right: 1em;
}
.title{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    width:55em; 
    margin-top:1.2em;
    height:3.3em; 
    border-radius:1em;
    font-size:1.3em;
}
.grand_parent{
    width:95vw;
    height:2vh;
    margin-top:80px;
} 
.circle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1.4em;
    height: 1.4em;
    border:1px solid;
    border-radius: 50%;
    font-size: 1.9em;
    margin-top: 0.1em;
    margin-left: 0.2em;
    color:white;
    background:rgb(252, 3, 132);
}
.data{
    margin-left: 2.6em;
    margin-top: -2.2em;
    font-size: 1.4em;
}
.date-time{
    font-size: 0.59em !important;
    margin-left:6em !important;
    margin-top: 0.3em !important;
    width:10em !important;
}
.parents{
    width:80vw;
    height:auto;
    margin:auto;
    display:flex;
    justify-content:space-around;
    flex-wrap:wrap;
}
</style>