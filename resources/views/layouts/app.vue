<template>
    <div>
        <NavbarComponent v-if="!status" class="nav"></NavbarComponent>
        <LoginComponent
        @user-data="storageUserData"
        v-if="status"
        ></LoginComponent>
        <RightClick></RightClick>
        <router-view v-if="!status"></router-view>
     </div>
</template>

<script>
    import axios from 'axios';
    import LoginComponent from '../../js/components/Login/LoginComponent.vue';
    import NavbarComponent from '../../js/components/Nav/NavbarComponent.vue';
    //import SidebarComponent from '../../js/components/Nav/SidebarComponent.vue';

    import RightClick from '../../js/components/Nav/RightClick.vue';

    export default {
        components:{
            LoginComponent,
            NavbarComponent,

            //SidebarComponent,
            RightClick,
        },
        data () {
            return {
                status:true,
                userData: {},
                email:localStorage.getItem('email'),
                token:localStorage.getItem('token'),
                //isSame:this.isSameTokenDatabase,

            }
        },
        methods: {
            storageUserData (data) {
                if(data.status){

                    // localStorage.setItem('token',data.token);
                    // localStorage.setItem('email',data.user.email);
                    //localStorage.setItem('userData',data.user);
                    this.userData = data.user;
                    this.status = false;
                    console.log(data.sms)
                }else{
                    console.log(data.sms)
                }

            },
            checkToken(){
                if(this.isToken){

                    if(this.isSameTokenDatabase){
                        this.status = false;
                        //console.log('same')
                    }else{
                        this.status = true;
                        //console.log('not same')
                    }

                }else{
                    this.status = true;
                }
            },
            isSameTokenDatabase(){

                const url = `http://127.0.0.1:8000/api/check_token`;
                axios.post(url,{
                    token:this.token,
                    email:this.email,
                }).then(response=>{
                    this.storeRes(response.data)
                }).then(error =>{
                    console.log(error)
                })
            },
            storeRes(data){
                //console.log(data.status)
                return data.status
            }

        },
        computed: {
            isToken () {

                 const token = this.token;
                return (
                    token == null ||
                    token == '' ||
                    token == undefined ||
                    token == false) ? false : true;
            },

        },
        mounted () {
            this.checkToken();
            this.isSameTokenDatabase
        }
    }
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap");
body{
    font-family: "Roboto",sans-serif;
}
.nav{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
        height: 30px;
      text-align: center;
      z-index: 1000;
}
</style>
