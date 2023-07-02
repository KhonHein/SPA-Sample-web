<template>
    <div class="add-post-compo">
            <div>
                <div>
                    <div class="">
                        <h5 class="modal-title rounded-2 text-center m-auto user-select-none">Create Post </h5>
                        <strong v-if="isAdd" class="text-primary">You added one post success ! </strong>
                    </div>
                <div class="create-body">
                    <div class="py-1">
                    <form class="form" novalidate="">
                        <div class="row">
                        <div class="col">
                            <div class="row my-3">
                                <div class="col-5">
                                    <div class="form-group">
                                    <label>Class Name </label>
                                    <select v-model="dataToPost.clsId" class="border rounded-2 btn btn-sm">
                                        <option value="choose"> choose </option>
                                        <option
                                        :value="cls.id"
                                        v-for="cls in classes"
                                        :key="cls"
                                        >{{ cls.class_title }}</option>

                                    </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>Subject Name </label>
                                        <select v-model="dataToPost.subId" class="border rounded-2 btn btn-sm">
                                            <option value="choose"> choose </option>
                                            <option
                                            :value="sub.id"
                                            v-for="sub in subjects"
                                            :key="sub"
                                            >{{ sub.sub_name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                <label>Post's title </label>
                                <input
                                class="form-control"
                                type="text"
                                v-model="dataToPost.postTitle"
                                placeholder="event ...">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col mb-3">
                                <div class="form-group">
                                <label>Description</label>
                                <textarea
                                class="form-control"
                                rows="5"
                                placeholder="descripe about the post's topic"
                                v-model="dataToPost.description"
                                ></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                <div class="mb-2"><b>Status</b></div>
                                <div class="row">
                                <div class="col">
                                    <!-- <label>Update Role </label> -->
                                    <div class="custom-controls-stacked px-2">
                                    <div class="custom-control custom-checkbox">
                                        <input  v-model="dataToPost.status" value="user" type="radio" name="options" class="custom-control-input" id="select-role" >
                                        <label class="custom-control-label" for="select-role">User </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input v-model="dataToPost.status"  value="pro" type="radio" name="options" class="custom-control-input" id="select-role" >
                                        <label class="custom-control-label" for="select-role" >Pro </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input  v-model="dataToPost.status" value="any" type="radio" name="options" class="custom-control-input" id="noselect-role">
                                        <label class="custom-control-label" for="noselect-role" >any</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <div class="mb-2"><b>Confirm who you are ? </b></div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                            <input class="form-control" type="password" placeholder="••••••">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button
                            class="save-change btn btn-secondary text-black btn-outline-primary"
                            :class="{'disabled' : checkRequire() }"
                            type="button"
                            @click="addPost()"
                            >Save Changes</button>
                        </div>
                        </div>
                    </form>

                    </div>
                </div>
                </div>
            </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        data () {
            return {
                dataToPost: {
                    postTitle:'',
                    clsId:0,
                    subId:0,
                    description:'',
                    status:'',
                },
                classes:{},
                subjects:{},
                isAdd:false,
            }
        },
        methods: {
            getData(toUrl , str) {
                let url = toUrl;
                axios.get(url)
                .then(response => {
                    // Handle the response data
                    if(str == 'cls'){
                        this.storeClasses(response.data);
                    }else{
                        this.storeSubject(response.data);
                    }
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },
            addPost(){
                const url = `http://127.0.0.1:8000/api/create_post`;
                axios.post(url, {
                    postTitle: this.dataToPost.postTitle,
                    postClass: this.dataToPost.clsId,
                    postSubject:this.dataToPost.subId,
                    postDescription:this.dataToPost.description,
                    postStatus:this.dataToPost.status,
                })
                .then(response => {
                    // Handle the response data
                    this.showNoti(response.data);
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },
            showNoti(data){
                if(data.status){
                    this.isAdd = true;
                    this.clearOld();
                }
            },
            clearOld(){
                this.dataToPost.postTitle = '';
                this.dataToPost.clsId = 0;
                this.dataToPost.subId = 0;
                this.dataToPost.description = '';
            },
            checkRequire(){
                // let saveBtn = document.querySelector('.save-change');
                if( this.dataToPost.postTitle == ''
                    || this.dataToPost.clsId == 0
                    || this.dataToPost.subId == 0
                    || this.dataToPost.description == ''
                    ){
                        return true;
                    }else{
                        return false;
                    }
            },
            storeClasses(data){
                this.classes = data;
            },
            storeSubject(data){
                this.subjects = data;
            }
        },
        mounted () {
            let clsUrl = `http://127.0.0.1:8000/api/all_classes`;
            this.getData(clsUrl , 'cls');

            let subUrl = `http://127.0.0.1:8000/api/all_subjects`;
            this.getData(subUrl , 'sub');

        }
    }
</script>

<style scoped>
.disabled {
    visibility: hidden;
}
.add-post-compo{
    background: #474E5D;
    padding: 1.5rem 1rem;

    border-radius: 5px;
}
</style>
