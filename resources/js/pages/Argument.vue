<template>
    <div class="container">
        <div class="row">
            <div> 
                <textarea v-model="pc.argument" autofocus class="textbox text-capitalize" placeholder="Description.." rows="5"></textarea>
            </div>
            <div class="col col-sm-12 text-center mt-3" style="display: flex;flex-direction: column;">
                <input type="range" v-model="selectedValue" @input="updateOutput" min="1" class="col align-self-center col-sm-5" max="10" oninput="this.nextElementSibling.value = this.value">
                <output class="circle align-self-center mt-3">{{selectedValue}}</output>
            </div>              
            <div class="text-center">
                <p>Importance</p>
            </div>
            <div class="col-sm-12">
                <input type="radio" name="p&c" id="pros" value="pros" v-model="pc.prco" checked>Pros<br>
                <input type="radio" name="p&c" id="cons" value="cons" v-model="pc.prco">Cons
            </div>
        </div>
        <button class="btn" type="button" @click="proscons">Save</button>
    </div>
</template>

<script>
import axios from "axios";
export default{
    data() {
        return {
            pc:{
                id:"",
                argument:"",
                importance:"",
                prco:"pros",
            },
            selectedValue: 5,
        };
    },
    mounted() {
        const query = this.$route.query;
        if (query && query.id) {
            this.pc.id = query.id;
        }
    },
    created() {

    },
    methods:{
        proscons(){
            this.pc.importance=this.selectedValue;
            const id = this.pc.id;
            // console.log(this.pc);
            axios.post('/api/prco',this.pc)
                .then(response => {
                    this.$router.push({
                        name: 'Dilemma',
                        query: { id },
                    });
                    this.pc.prco="";
                })
                .catch(error => {
                    console.log(error);
                }
            );
        },
        updateOutput() {
            this.selectedValue = this.selectedValue;
        }
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