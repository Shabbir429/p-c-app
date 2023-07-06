<template>
    <div class="container">
        <div class="row">
            <div> 
                <textarea v-model="pc.title" autofocus class="textbox text-capitalize" placeholder="Description.." rows="5"></textarea>
            </div>
            <div class="col col-sm-12 text-center mt-3" style="display: flex;flex-direction: column;">
                <input type="range" value="5" min="1" class="col align-self-center col-sm-5" max="10" oninput="this.nextElementSibling.value = this.value" :value="pc.importance">
                <output class="circle align-self-center mt-3">5</output>
            </div>              
            <div class="text-center">
                <p>Importance</p>
            </div>
            <div class="col-sm-12">
                <input type="radio" name="p&c" id="pros" value="pros" checked v-model="pc.prco">Pros<br>
                <input type="radio" name="p&c" id="cons" value="cons" v-model="pc.prco">Cons
            </div>
        </div>
        <button class="btn" type="button" @click="proscons">Save</button>
    </div>
</template>

<script>
export default{
    data() {
        return {
            pc:{
                title:"",
                importance:"",
                prco:"",
            },
        };
    },
    mounted() {
        
    },
    created() {
    },
    methods:{
        proscons(){
            console.log(this.pc);
        },
    },
}
</script>

<style scoped>
.textbox{
    border: 0.3em solid;
    width:100%;
    margin-top: 8em;
    padding: 1em;
    border-image: linear-gradient(122deg, rgba(159, 43, 250, 1) 0%, rgba(0, 226, 255, 1) 100%, rgba(238, 130, 238, 1) 100%);
    border-image-slice: 1;
}
button{
    border: 0.1em solid;
    width:8em;
    margin-top:9em;
    float:right;
    height:3em;
    background:linear-gradient(122deg, rgb(181, 103, 241) 0%, rgb(56, 221, 243) 100%, rgba(238, 130, 238, 1) 100%);
}
.circle {
    width: 1.4em;
    height: 1.4em;
    border: 3px solid rgba(0, 205, 255, 0.8);
    border-radius: 50%;
    font-size: 1.9em;
    margin-left: 0.2em;
  }
  input[type="range"] {
    -webkit-appearance: none;
    height: 10px;
    background-color: transparent;
    border-radius: 5px;
    outline: none;
  }
  
  input[type="range"]::-webkit-slider-runnable-track {
    width: 100%;
    height: 10px;
    background: linear-gradient(122deg, rgba(159, 43, 250, 1) 0%, rgba(0, 226, 255, 1) 100%, rgba(238, 130, 238, 1) 100%);
    border-radius: 5px;
  }
  
  input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 3px solid rgba(159, 43, 250, 1);
    border-radius: 50%;
    margin-top: -6px;
  }
  
  input[type="range"]::-moz-range-track {
    width: 100%;
    height: 10px;
    background: linear-gradient(122deg, rgba(159, 43, 250, 1) 0%, rgba(0, 226, 255, 1) 100%, rgba(238, 130, 238, 1) 100%);
    border-radius: 5px;
  }
  
  input[type="range"]::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 1px solid #333;
    border-radius: 50%;
    margin-top: -6px;
  }
  

  
  
</style>