<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 mt-2">
                <h1 class="text-capitalize">{{ list.title }}</h1>
            </div>
            <div class="col-sm-12">
                <img @click="edit()" class="ms-auto p-2 pb-3" width="80" height="80" src="https://img.icons8.com/external-others-inmotus-design/100/external-Edit-virtual-keyboard-others-inmotus-design.png" alt="external-Edit-virtual-keyboard-others-inmotus-design"/>
            </div>
            <div class="box col col-sm-12 d-flex px-2 py-2">
                <span style="background:rgb(252, 3, 132);" class="d-inline p-2 w-100">50%</span>
                <span style="background:rgb(138, 184, 254);" class="d-inline p-2 w-100">50%</span>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <h3>Pros</h3>
                <div class="">{{ pros.importance}}</div>
                <div class="">{{ pros.argument}}</div>
            </div>
            <div class="col mt-3">
                <h3>Cons</h3>
                <div class="">{{ cons.importance}}</div>
                <div class="">{{ cons.argument}}</div>
            </div>
        </div>
        <button class="btn" type="button" @click="argument">ADD ARGUMENT</button>
    </div>
</template>

<script>
import axios from "axios";
export default{
    data() {
        return {
            title:'',
            list:{},
            pros:{},
            cons:{},
        };
    },
    mounted() {
        const query = this.$route.query;
        if (query && query.id) {
            this.list.id = query.id;
        }
        this.findtitle();
        this.findpros();
    },
    created() {
    },
    methods:{
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
            })
            .catch((error) => {
                console.log(error);
            });
        },
        findpros(){
            axios.get("/api/findpros/" + this.list.id)
            .then((response) => {
            this.pros = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        findcons(){
            axios.get("/api/findcons/" + this.list.id)
            .then((response) => {
            this.list = response.data;
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
    },
};
</script>

<style scoped>

.box{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    height:auto;
    border-radius:0.5em;
}
button{
    border: 0.1em solid;
    width:10em;
    margin-top:22em;
    float:right;
    height:3em;
    background:linear-gradient(122deg, rgb(207, 161, 241) 0%, rgb(163, 232, 241) 100%, rgb(235, 151, 235) 100%);
}

</style>
