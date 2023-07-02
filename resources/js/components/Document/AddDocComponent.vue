<template>
    <div class="doc rounded-2">
        <form class="doc-section  my-2 py-4 mx-3">
            <div>
                <h5 class="text-warning" v-if="check.isAdd">You added one Document ! </h5>
            </div>
            <label for="title">Set Title </label>
            <input
            type="text"
            id="title"
            class="form-control  mx-auto my-2 fs-5 bg-transparent text-warning"
            placeholder="Enter title topic..."
            v-model="check.title"
            >

            <label for="aim">Set Aim</label>
            <input
            type="text"
            id="aim"
            class="form-control  mx-auto my-2 fs-5 bg-transparent text-info"
            placeholder="Aimed to be..."
            v-model="check.aim"
            >
            <label for="description">Descrip about topic</label>
            <textarea
            name=""
            id="description"
            class="form-control bg-transparent fs-6 text-white" cols="30"
            rows="10" placeholder="Enter description ...."
            v-model="check.desc"
            ></textarea>
            <button
            class="btn btn-dark btn-outline-info border border-warning my-2 mx-auto text-white"
            :class="{'op-02': checkRequire}"
            :disabled="checkRequire"
            @click="submitDoc"
            >submit</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data () {
            return {
                check:{
                    title:'',
                    aim:'',
                    desc:'',
                    submit:true,
                    isAdd:false,
                }
            }
        },
        computed: {
            checkRequire () {
                if(this.check.title == '' || this.check.aim == '' || this.check.desc == ''){
                    return true;
                }else{
                    return false;
                }
            }
        },
        methods: {
            submitDoc () {
                const url = `http://127.0.0.1:8000/api/add_doc`;

                axios.post(url, {
                    title: this.check.title,
                    aim: this.check.aim,
                    description: this.check.desc,
                })
                .then(response => {
                    // Handle the response data
                    this.showNoti(response.data ,this.cleanOld())
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },
            showNoti(data){
                if(data.status == true){
                    this.check.isAdd = true;
                    setTimeout(()=>{
                        this.check.isAdd = false;
                    },7000)
                }
            },
            cleanOld(){
                this.check.title = '';
                this.check.aim ='';
                this.check.desc = '';
                this.check.submit = true;
            }
        },
        mounted () {
            // this.checkRequire
        }
    }
</script>

<style scoped>
    .doc{
        background: #474E5D;
        height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
  .doc-section {
    padding: 50px;
    text-align: center;
    /* background-color: #474e5d; */
    color: white;
  }

  .op-02{
    opacity: .2;
  }
</style>
