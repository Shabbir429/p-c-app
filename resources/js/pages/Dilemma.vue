<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 mt-2">
                <h1 class="text-capitalize">{{ list.title }}</h1>
            </div>
            <div class="col-sm-12">
                <img @click="edit()" class="ms-auto p-2 pb-2" width="70" height="70" src="https://img.icons8.com/external-others-inmotus-design/100/external-Edit-virtual-keyboard-others-inmotus-design.png" alt="external-Edit-virtual-keyboard-others-inmotus-design"/>
            </div>
            <div class="box col col-sm-12 d-flex px-2 py-2 text-center">
                <span :style="{ width: `${per.prosper}%`, background: 'rgb(252, 3, 132)' }" class="d-inline p-2 ">+{{per.prosper}}%</span>
                <span :style="{ width: `${per.consper}%`, background: 'rgb(138, 184, 254)' }" class="d-inline p-2">-{{ per.consper}}%</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h3>Pros</h3>
                <button @click="argumentedit(item)" class="col-sm-12">
                    <div class="col-sm-12 mt-3 shadow d-flex flex-row mb-2" v-for="item in pros" :key="item.id">
                        <div class="circle ">{{ item.importance}}</div>
                        <div class="p-2 text-break">{{ item.argument}}</div>
                    </div>
                </button>
            </div>
            <div class="col">
                <h3>Cons</h3>
                <button @click="argumentedit(item)" class="col-sm-12 ">
                    <div class="col-sm-12 mt-3 shadow d-flex flex-row mb-2" v-for="item in cons" :key="item.id">
                        <div class="circle" style="background: rgb(138, 184, 254);">{{ item.importance}}</div>
                        <div class="p-2 text-break">{{ item.argument}}</div>
                    </div>
                </button>
            </div>
        </div>
        <button class="btn mbtn" type="button" @click="argument">ADD ARGUMENT</button>
    </div>
</template>

<script>
import axios from "axios";
export default{
    data() {
        return {
            list:{},
            pros:{},
            cons:{},
            total:{
                ptotal:0,
                ctotal:0,
            },
            per:{
                prosper:50,
                consper:50,
            },
            addition:0,
        };
    },
    mounted() {
        const query = this.$route.query;
        if (query && query.id) {
            this.list.id = query.id;
        }
        this.findtitle();
        this.findpros();
        this.findcons();
    },
    methods:{
        persantage(){
            this.per.prosper = ((this.total.ptotal / this.addition) * 100).toFixed(1);
            this.per.consper = ((this.total.ctotal / this.addition) * 100).toFixed(1);
            // if(this.per.consper==0.0){
            //     this.per.consper="";
            // }
        },
        edit(){
                const data = this.list.title;
                const id = this.list.id;
                this.$router.push({
                name: 'Addnew',
                query: { data,id },
            });
        },
        findtitle(){
            axios.get("/api/findtitle/" + this.list.id)
            .then((response) => {
                this.list = response.data;
                this.findpros();
                this.findcons();
            })
            .catch((error) => {
                console.log(error);
            });
        },
        findpros(){
            axios.get("/api/findpros/" + this.list.id)
            .then((response) => {
            this.pros = response.data.data;
            this.total.ptotal = parseInt(response.data.sum);
            if(this.total.ptotal!=0  || this.total.ctotal!=0){
                this.addition = this.total.ptotal + this.total.ctotal; // Calculate the total here
                this.persantage();
            }
            })
            .catch((error) => {
                console.log(error);
            });
        },
        findcons(){
            axios.get("/api/findcons/" + this.list.id)
            .then((response) => {
            this.cons = response.data.data;
            this.total.ctotal = parseInt(response.data.sum);
            if(this.total.ptotal!=0 & this.total.ctotal!=0){
                this.addition = this.total.ptotal + this.total.ctotal; // Calculate the total here
                this.persantage();
            }
            // console.log(this.total.ptotal);
            // console.log(this.total.ctotal);
            // console.log(this.addition);
            })
            .catch((error) => {
                console.log(error);
            });
        },
        argument(){
            const id = this.list.id;
            this.$router.push({
                name: 'Argument',
                query: { id },
            });
        },
        argumentedit(item){
            // const item = item;
            this.$router.push({
                name: 'Argument',
                query: { item },
            });
        },
    },
};
</script>

<style scoped>

.shadow{
    height: auto;
    padding: 0.5em;
    border: 1px solid;
    border-radius: 0.8em;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
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
.box{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    height:auto;
    border-radius:0.5em;
}
.mbtn{
    border: 0.1em solid;
    width:10em;
    margin-top:10em;
    float:right;
    height:3em;
    background:linear-gradient(122deg, rgb(207, 161, 241) 0%, rgb(163, 232, 241) 100%, rgb(235, 151, 235) 100%);
}

</style>
