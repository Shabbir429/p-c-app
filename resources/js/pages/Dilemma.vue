<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 mt-2">
                <h1 class="text-capitalize">{{ list.receivedData }}</h1>
            </div>
            <div class="col-sm-12">
                <img @click="edit()" class="ms-auto p-2 pb-3" width="80" height="80" src="https://img.icons8.com/external-others-inmotus-design/100/external-Edit-virtual-keyboard-others-inmotus-design.png" alt="external-Edit-virtual-keyboard-others-inmotus-design"/>
            </div>
            <div class="box col col-sm-12 d-flex px-2 py-2">
                <span style="background:red;" class="d-inline p-2 w-100">50%</span>
                <span style="background:blue;" class="d-inline p-2 w-100">50%</span>
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
            list:{
                receivedData: null,
                id:null,
            },
        };
    },
    mounted() {
        const query = this.$route.query;
        if (query && query.data) {
            this.list.receivedData = query.data;
            this.list.id = query.id;
        }
    },
    created() {
    },
    methods:{
        edit(){
                const data = this.list.receivedData;
                const id = this.list.id;
                this.$router.push({
                name: 'Addnew',
                query: { data,id },
            });
        },
        findtitle(){
            axios.get("/api/findtitle" ,this.id)
            .then((response) => {
            this.list = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        argument(){
            this.$router.push({
                name: 'Argument',
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
    background:lightblue;
}

</style>
