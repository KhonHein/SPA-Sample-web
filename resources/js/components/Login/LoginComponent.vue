<template>
    <div>
        <body>
            <header>
                <!-- <h2 class="logo m-auto">Logo</h2> -->
            </header>
            <div class="wrapper active-popup">
                <div class="form-box login">
                    <h2>Login</h2>
                    <form action="#">
                        <div class="input-box">
                            <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                            <input
                            type="email"
                            required
                            v-model="loginData.email"
                            >
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><i class="fa-solid fa-lock"></i></span>
                            <input
                            type="password"
                            required
                            v-model="loginData.password"
                            >
                            <label>Password</label>
                        </div>
                        <div class="remember-forget">
                            <label><input
                                type="checkbox"
                                v-model="loginData.remember"
                                > remember me</label>
                            <a href="#">forget passwrod</a>
                        </div>
                        <button
                        type="submit"
                        class="submit"
                        :disabled="isLoginRequire"
                        @click="login">Submit</button>
                        <div class="login-register">
                            <p>Don't have an account <a class="register-link"><strong>Go to Register</strong></a></p>
                        </div>
                    </form>
                </div>
                        <!-- register session -->
                        <div class="form-box register">
                            <h2>Register</h2>
                            <h6 v-if="showAgree"><strong class="text-danger"> You need to agree the therms's rules ! </strong></h6>
                            <form action="#">
                                <div class="input-box">
                                    <span class="icon"><i class="fa-regular fa-user"></i></span>
                                    <input
                                    type="text"
                                    required
                                    v-model="registerData.name"
                                    >
                                    <label>name</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                                    <input
                                    type="email"
                                    required
                                    v-model="registerData.email"
                                    >
                                    <label>Email</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                                    <input
                                    type="password"
                                    required
                                    v-model="registerData.password"
                                    >
                                    <label>Password</label>
                                </div>

                                <div class="remember-forget">
                                    <label>
                                        <input type="checkbox" v-model="registerData.remember"> remember me
                                    </label>

                                </div>

                                <div class="remember-forget">
                                    <label :class="{'text-danger': showAgree}">
                                        <input type="checkbox" v-model="registerData.agree"> need to gree the team's rules !
                                    </label>
                                    <!-- <a href="#">forget passwrod</a> -->
                                </div>
                                <button
                                type="submit"
                                class="submit"
                                @click="register"
                                :disabled="isRequired"
                                >Register</button>
                                <div class="login-register">
                                    <p>Already have an account <a class="login-link"><strong>Go to Login</strong></a></p>
                                </div>
                            </form>
                        </div>
            </div>
        </body>
    </div>
</template>

<script>
    import axios from 'axios';
    import '../../../css/Login/login.css';
    export default {
        data () {
            return {

                loginData:{
                    email:'',
                    password:'',
                    remember:false,
                },

                showAgree:false,
                registerData:{
                    name:'',
                    email:'',
                    password:'',
                    remember:false,
                    agree:false,
                },
            }
        },
        computed: {
            isRequired () {
            return (this.registerData.name == '' || this.registerData.email == '' || this.registerData.password == '') ? true : false;
            },
            isLoginRequire(){
                return (this.loginData.email == '' || this.loginData.password == '') ? true : false;
            }
        },
        methods: {
            siginOut () {
                const wrapper = document.querySelector('.wrapper');
                const loginLink = document.querySelector('.login-link');
                const registerLink = document.querySelector('.register-link');

                registerLink.addEventListener('click',()=>{
                    wrapper.classList.add('active');
                });
                loginLink.addEventListener('click',()=>{
                    wrapper.classList.remove('active');
                });
            },
            login(){
                const url =`http://127.0.0.1:8000/api/login`;
                    const obj = {
                        email:this.loginData.email,
                        password:this.loginData.password,
                        remember:this.loginData.remember,
                    };
                    this.loginRegistation(url , obj);
            },
            register(){
                if(this.registerData.agree){
                    const url =`http://127.0.0.1:8000/api/register`;
                    const obj = {
                        name:this.registerData.name,
                        email:this.registerData.email,
                        password:this.registerData.password,
                        remember:this.registerData.remember,
                    };
                    this.loginRegistation(url , obj);
                }else{
                    this.showAgree = true;
                    setTimeout(()=>{this.showAgree = false },8000)
                }
            },
            loginRegistation(paraUrl , obj){
                const url =paraUrl;
                    axios.post(url, obj)
                    .then(response => {
                        // Handle the response data
                        if(obj.remember){
                            this.storeToken(response.data);
                        }
                        this.$emit('user-data',response.data);
                    })
                    .catch(error => {
                        // Handle the error
                        console.log(error);
                    });
            },
            storeToken(data){
                localStorage.setItem('token',data.token);
                localStorage.setItem('email',data.user.email);
                localStorage.setItem('id',data.user.id);
            }

        },
        mounted () {
            this.siginOut();
            // menue stick
        }
    }
</script>

<style lang="stylus" scoped>

</style>
