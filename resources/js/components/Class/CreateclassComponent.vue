<template>
    <div style="background: #474E5D; height: 80vh; display: flex; justify-content: center;  align-items: center;">
        <div class="create-class">
            <div class="text-center rounded-2 py-1 user-select-none">
                <h4>Create New Class </h4>
                <strong v-if="invalid.isCreateClassSuccess" class="text-primary fw-bold"> you created one new class ! </strong>
        </div>
            <form action="" class="custom__form">
                <div>
                    <div class="image custom__image-container">
                        <label id="add-img-label" for="add-single-img">+</label>
                        <input
                        @change="addImgHandler"
                        type="file"
                        class="input-img"
                        id="add-single-img"
                        accept="image/jpeg" />
                    </div>
                    <input class="input-img"
                        type="file"
                        id="image-input"
                        name="photos"
                        accept="image/jpeg"
                        multiple

                    />

                    <div>
                        <input type="text"  v-model="create.classTitle" placeholder="Enter Class name "/>
                    </div>

                    <div>
                        <textarea name="" v-model="create.classDescription" placeholder="Enter Description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <button v-if="checkBtn()" @click="createClass">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import '../../../css/Class/createclass.css';
    export default {
        data () {
            return {
                create: {
                    classTitle:'',
                    classDescription:'',
                    classImgae:'',
                },
                invalid:{
                    isClassName:false,
                    isDescription:false,

                    submitBtn:false,
                    isCreateClassSuccess:false,
                }
            }
        },


        methods: {
            addImgHandler () {
                const imgFile = document.getElementById("add-single-img");
                const imgFileLabel = document.getElementById("add-img-label");
                const imgContainer = document.querySelector(".custom__image-container");
                const imgFiles = [];
                const file = imgFile.files[0];

                //for v-data
                this.create.classImgae = file;

                if (!file) return;
                // Generate img preview
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    const newImg = document.createElement("img");
                    newImg.src = reader.result;
                    imgContainer.insertBefore(newImg, imgFileLabel);
                    imgFileLabel.style.display = "none";
                };
                // Store img file
                imgFiles.push(file);
                // Reset image input
                imgInputHelper.value = "";
                return;

            },
            createClass(){
                const url = `http://127.0.0.1:8000/api/create_class`;

                axios.post(url, {
                    className: this.create.classTitle,
                    //image : this.create.classImgae,
                    description:this.create.classDescription,
                })
                .then(response => {
                    // Handle the response data
                    this.showSuccessNoti(response.data);
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },
            checkBtn(){
                if(this.create.classTitle == '' || this.create.classDescription == ''){
                    return false;
                }else{
                    return true;
                }
            },
            showSuccessNoti(status){
                this.invalid.isCreateClassSuccess = status;
                setTimeout(()=>{
                    this.invalid.isCreateClassSuccess = false;
                    },7000)
            }
        }
    }
</script>

<style lang="stylus" scoped>

</style>
