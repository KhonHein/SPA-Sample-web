<template>
    <div style="background: #474E5D; height: 80vh; display: flex; justify-content: center;  align-items: center;">
        <div class="create-class justify-content-cneter ">
            <div class="text-center rounded-2 py-1 user-select-none">
                <h4>Add New Subject </h4>
                <strong v-if="isCreatedSuccess" class="text-primary">You created one class</strong>
            </div>
            <div class="my-2 rounded-2 d-flex justify-content-center m-auto">
                <input
                class="border px-2 py-2 rounded-2 text-black fw-bold"
                type="text"
                placeholder="Enter subject name"
                v-model="subName"
                >
            </div>

            <div class="d-flex justify-content-center my-4">
                <select name="" v-model="clsId" id="" class="my-2 border rounded-2 shadow">
                    <option value="" selected>select class</option>
                    <option
                    v-for="cls in classNameData"
                    :key="cls"
                    :value="cls.id"
                    >{{ cls.class_title }}</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button
                class="btn btn-outline-secondary text-black fw-bold btn-info shadow rounded-2 py-2 px-4"
                :class="{'disabled border-danger': checkBtn() }"
                @click="createSubject"
                > Submit </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data () {
            return {
                subName: '',
                clsId:'',
                isCreatedSuccess:false,

                classNameData:[],

            }
        },
        methods: {
            checkBtn () {
                let rep = this.subName == '' || this.clsId == '' ? true : false;
                return rep;
            },

            createSubject(){

                const url = `http://127.0.0.1:8000/api/create_subject`;

                axios.post(url, {
                    subName: this.subName,
                    clsId: this.clsId,
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
            getAllClasses(){
                const url = `http://127.0.0.1:8000/api/all_classes`;
                axios.get(url)
                .then(response => {
                    // Handle the response data
                    this.storeClasses(response.data);
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },
            storeClasses(data){
                this.classNameData=data;
                //console.log(this.classNameData)
            }
            ,
            showNoti(para){
                this.isCreatedSuccess = para.status;
                setTimeout(()=>{
                    this.isCreatedSuccess = false;
                    },7000)
            },
            cleanOld(){
                this.subName = '';
                this.clsId = '';
            }
        },
        mounted () {
           this.getAllClasses();
        }
    }
</script>

<style>

</style>
