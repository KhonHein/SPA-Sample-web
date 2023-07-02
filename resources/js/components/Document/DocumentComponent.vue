<template>
    <div>
        <div class="doc-section border rounded-2 my-2 mx-3" v-for="data in showData" :key="data">
            <h2 class="text-warning">{{  data.title }}</h2>
            <p class="text-info">{{  data.aim }}</p>
            <p class="align-items-start">{{  data.description }}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data () {
            return {
                showData: [
                    
                ]
            }
        },
        methods: {
                async getDoc () {
                    const res = await fetch("http://127.0.0.1:8000/api/all_doc");
                    const finalRes = await res.json();
                    //this.listItems = finalRes;
                    this.storeData(finalRes)
                },
                storeData(data){
                    this.showData = data;
                }
        },
        mounted () {
            this.getDoc()
        }
    }
</script>

<style scoped>
/* home  */
@import url('https://fonts.googleapis.com/css?family=Sofia');

  .doc-section {
    padding: 50px;
    text-align: center;
    background-color: #474e5d;
    color: white;
  }
</style>
