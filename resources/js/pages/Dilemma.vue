<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ receivedData }}</h1>
            </div>
            <div class="col-sm-12">
                <img @click="Addnew" class="ms-auto p-2 pb-3" width="80" height="80" src="https://img.icons8.com/external-others-inmotus-design/100/external-Edit-virtual-keyboard-others-inmotus-design.png" alt="external-Edit-virtual-keyboard-others-inmotus-design"/>
            </div>
        </div>
        <div class="box col col-sm-12 d-flex px-2 py-2">
            <span style="background:red;" class="d-inline p-2 w-100">50%</span>
            <span style="background:blue;" class="d-inline p-2 w-100">50%</span>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
        title:'',
        receivedData: null
    };
  },
  mounted() {
    
  },
  created() {
        const query = this.$route.query;
        if (query && query.data) {
            this.receivedData = query.data;
        }
    },
};
</script>

<style scoped>

.box{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    height:auto;
    border-radius:0.5em;
}

</style>
