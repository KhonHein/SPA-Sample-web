<template>
    <div class="mt-5">
        <body bg-light class="p-1 row">
            <!-- Navbar start -->
            <nav class="navbar navbar-expand-lg shadow-sm text-danger sticky-top">
                <div class="containe">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class=" nav-item">
                                <a class="underlineFun nav-link text-black fw-bold btn btn-outline-info border border-danger mx-1" aria-current="page" @click="showSeciton('home')">Home</a>
                            </li>
                            <li class=" nav-item">
                                <a class="underlineAbout nav-link text-black fw-bold btn btn-outline-info border border-danger mx-1" @click="showSeciton('about')">Used to</a>
                            </li>
                            <li class=" nav-item">
                                <a class="underlineContact nav-link text-black fw-bold  btn btn-outline-info border border-danger mx-1" @click="showSeciton('contact')">contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar end -->
            <!-- home start  -->
            <section class="home ms-3 " id="home" v-if="isActive.home">
                <div class="container-lg">
                    <div class="row min-vh-100  align-items-center align-content-center">
                        <div class=" col-md-6 col-md-6  mt-md-0">
                            <div class="text-center">
                                <img src="./images/profile.jpg" class="profilePP rounded-circle shadow-sm img-thumbnail m-auto" style="width:75%; height:70%;" alt="">
                            </div>
                            <span class="fs-3 fw-bold mx-auto TimeNewFont"> “If at first you don't succeed; call it version 1.0”. </span>
                        </div>
                        <div class=" col-md-6 col-md-6 order-md-first mt-5">
                            <div class="my-profile">
                                <p class="fw-bold text-danger TimeNewFont">Hi I'm</p>
                                <h2 class=" text-primary text-mutec mb-1 text-uppercase fs-1 fw-bold TimeNewFont"> Khon Hien</h2>
                                <p class="text-black fw-bold fs-4 TimeNewFont">
                                    Fullstack Web-Developer
                                </p>
                                <p class="fs-5 fw-bold TimeNewFont">
                                    The best web developer is a well-rounded developer who understands both front-end and back-end development. I am a PHP developer with experience in Laravel and Vue.js. I prioritize effective communication with clients and staying up-to-date with the latest
                                    technologies in both front-end and back-end development.
                                </p>
                                <!-- <button class="btn btn-danger mt-2 p-3" herf="#">My Work</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                <!-- home end -->
                <!-- aboutMe section open -->
                <div v-if="isActive.aboutMe">
                    <div class="aboutMe py-5" id="aboutMe">
                            <div class="container-lg">

                                <div class=" row justify-content-center text-center ">
                                    <div class="section-title  text-black mt-1 mb-3  fw-bold">
                                        <h2 class="TimeNewFont">About Me</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-md-6 col-md-6 ">
                                        <div class="about-text fs-2 mb-3">
                                            <p class="text-dark fw-bold">
                                                Passionate Developer
                                            </p>
                                        </div>

                                        <p class=" text-black fw-bold">
                                            I'm the voice behind your website. I know what you need and what's best for your brand. Let's get to work! At ITS, we’re not interested in just making websites. We’re building the future of digital experiences and embracing the responsibility it takes
                                            to be a part of that.
                                        </p>
                                        <div class="row text-center text-uppercase my-3">
                                            <div class=" col-lg-4 col-md-6 col-sm-4 mb-3 mt-3 prj1 toHoverFun1">
                                                <a href="https://shannivocab.com/" class=" item text-decoration-none text-black" target="_blank">
                                                    <div><i class="fa-brands fa-vuejs text-success fs-3"></i></div>
                                                    <strong>project</strong>
                                                    <p class="fw-bold"> <span class="text-danger"> Laravel </span> <strong> + </strong> <span class="text-primary ">Vue</span> </p>
                                                </a>
                                            </div>
                                            <div class=" col-lg-4 col-md-6 col-sm-4 mb-3 mt-3 prj2 toHoverFun2">
                                                <a href="http://pos.99951430-12-20230224144024.webstarterz.com/" class="item text-decoration-none text-black" target="_blank">
                                                    <div><i class="fa-brands fa-laravel text-danger fs-3"></i></div>
                                                    <strong>project</strong>
                                                    <p class="fw-bold"> <span class="text-danger"> Lara </span> <strong> + </strong> <span style="color:coral">jQ</span> </p>
                                                </a>
                                            </div>
                                            <div class=" col-lg-4 col-md-6 col-sm-4 mb-4 prj3 toHoverFun3">

                                                <div class="item">
                                                    <a href="https://github.com/KhonHein/my_personal_blog_Stop_At_Nothing" target="_blank">
                                                        <i class="fa-brands fa-github fs-3 fw-bold my-2 text-black"></i>
                                                        <h4>Github</h4>
                                                    </a>
                                                    <div class=" col-md-6 col-mg-12 d-flex  ">
                                                        <a href="https://www.facebook.com/sai.bwathmara.9/" target="_blank">
                                                            <div class="social-link">
                                                                <i class="fa-brands fa-facebook-f fs-3 ms-2 text-primary"></i>
                                                            </div>
                                                        </a>

                                                        <a href="" target="_blank">
                                                            <div class="social-link">
                                                                <i class="fa-brands fa-youtube fs-3 ms-2 text-danger"></i>
                                                            </div>
                                                        </a>
                                                        <a href="" target="_blank">
                                                            <div class="social-link" style="color: bround;">
                                                                <i class="fa-brands fa-viber fs-3 ms-2 text-success"></i>
                                                            </div>
                                                        </a>
                                                        <a href="" target="_blank">
                                                            <div class="social-link">
                                                                <i class="fa-brands fa-instagram fs-3 ms-2 text-danger"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class=" col-lg-4 col-md-6 col-sm-4 mb-3 mt-3 prj4 toHoverFun4">
                                                <a href="https://github.com/KhonHein/" class="item text-decoration-none text-black" target="_blank">
                                                    <i class="fa-brands fa-github fs-3 fw-bold my-2 text-black"></i>
                                                    <strong>project</strong>
                                                    <p class="fw-bold"> <span class="text-danger"> Full </span> <strong> + </strong> <span style="color:coral">Stack</span> </p>
                                                </a>
                                            </div>
                                            <!-- end contact ctn link -->
                                        </div>

                                    </div>
                                    <div class=" col-md-6 col-md-6 ">
                                        <div class="skill mb-4">
                                            <h3>PHP & Laravel</h3>
                                            <div class="progress bg-warning bg-opacity-25 t " style="height:3px;">
                                                <div class="progress-bar " role="progressbar" aria-label="Example with label" style="width: 90%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="skill mb-4">
                                            <h3>CSS & Bootstrap </h3>
                                            <div class="progress bg-danger bg-opacity-25  " style="height:3px;">
                                                <div class="progress-bar " role="progressbar" aria-label="Example with label" style="width: 85%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="skill mb-4 ">
                                            <h3>Js & Vue & jQuery</h3>
                                            <div class="progress bg-info bg-opacity-25  " style="height:3px;">
                                                <div class="progress-bar " role="progressbar" aria-label="Example with label" style="width: 80%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="skill mb-4">
                                            <h3>MySQL</h3>
                                            <div class="progress bg-success bg-opacity-25  " style="height:3px;">
                                                <div class="progress-bar " role="progressbar" aria-label="Example with label" style="width: 75%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                    </div>

                        <div class="projects m-5" id="projects">
                            <div class="container-lg">
                                <div class="row justify-content-center">
                                    <div class=" col-md-6 col-lg-4 mb-4 text-center ">
                                        <div class="section-title  text-dark mt-1 mb-3  fw-bold">
                                            <h2 class="TimeNewFont">What I do ?</h2>
                                        </div>

                                    </div>
                                </div>
                                <!-- project start -->
                                <div class="row text-center">
                                    <div class=" col-md-6 col-lg-4 mb-4">
                                        <div class="project-items">
                                            <div class="icon">
                                                <i class="fa solid fa-code fs-2 fw-bold text-danger my-2"></i>
                                            </div>
                                            <h3 class="fs-6 fw-bold py-2">Web Development</h3>
                                            <p class="text-muted">I have a strong foundation in back-end development, including proficiency in programming languages such as PHP,and JavaScript. "I am proficient in utilizing Laravel and Vue.js frameworks to create scalable and dynamic web applications
                                                with optimized user interfaces."
                                            </p>
                                        </div>
                                    </div>
                                    <div class=" col-md-6 col-lg-4 mb-4">
                                        <div class="project-items">
                                            <div class="icon">
                                                <i class="fa-solid fa-lightbulb text-danger fs-2 fw-bold"></i>
                                            </div>
                                            <h3 class="fs-6 fw-bold py-2">Creative Ideas</h3>
                                            <p class="text-muted">
                                                I am committed to continuous learning and staying up-to-date with the latest trends and best practices in creative ideation to deliver high-quality and impactful solutions for my clients. I have a passion for exploring new and unique approaches to problem-solving,
                                                which allows me to bring fresh perspectives to the creative idea sessions I participate in.
                                            </p>
                                        </div>
                                    </div>
                                    <div class=" col-md-6 col-lg-4 mb-4">
                                        <div class="project-items">
                                            <div class="icon">
                                                <i class="fa-solid fa-wand-magic-sparkles text-danger fs-2 fw-bold"></i>
                                            </div>
                                            <h3 class="fs-6 fw-bold py-2">Creative Wizardry</h3>
                                            <p class="text-muted">
                                                "With my expertise in backend server development, I am able to optimize server performance, improve database management, and ensure seamless functionality for web applications."
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- project end  -->

                            </div>
                        </div>
                </div>
                <!-- freelencer sectin start -->

                <div class="freelance bg-secondary px-5" id="freelance">
                    <div class="container-lg py-4">
                        <div class="row text-center text-white ">
                            <h6 class="mb-4">Do you have any Proects?</h6>
                            <h5 class="mb-2">I'm here for you .</h5>
                            <form class="my-2" action="https://formsubmit.co/www.thmarazewa@email.com" method="POST">

                                <input
                                v-model="content.name"
                                :class="{'border-danger' : required.name}"
                                 required type="text" class="m-auto border border-info rounded-1 my-1 py-2 px-3 mx-1" name="name" id="" placeholder="Your name">

                                <input
                                v-model="content.email"
                                :class="{'border-danger' : required.email}"
                                 required type="text" class="m-auto border border-info rounded-1 my-1 py-2 px-3 mx-1" name="email" id="" placeholder="Email">

                                <input
                                v-model="content.sub"
                                :class="{'border-danger' : required.sub}"
                                 required type="text" class="m-auto border border-info rounded-1 my-1 py-2 px-3 mx-1" name="_subject" id="" placeholder="Subject">

                                <input
                                type="hidden" name="_next" value="https://yourdomain.co/thanks.html">

                                <!-- <input type="text" class="border rounded-1 px-3 py-2 my-2 w-100" placeholder="enter your email address"> -->
                                <textarea
                                v-model="content.body"
                                :class="{'border-danger' : required.body}"
                                 required name="msg" class="form-control border-info" id="" cols="30" rows="10"
                                placeholder="Enter content body"
                                style="width: 100%; min-height: 200px;"
                                ></textarea>
                                <button
                                type="submit"
                                class="btnContactMe btn border w-auto px-5 btn-outline-info my-2  m-auto"
                                @click="validate"
                                >send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- freelencer section end  -->

                <!-- contact section start  -->

                <div class="contact mt-5" id="contact" v-if="isActive.contact">
                    <div class="container-lg">
                        <div class="row justify-content-center">
                            <div class=" col-md-6 col-lg-4 mb-4 text-center ">
                                <div class="section-title  text-dark mt-1 mb-3  fw-bold">
                                    <h2 class="">Contact Address</h2>
                                </div>

                            </div>
                        </div>

                        <div class="row m-2 my-3">
                            <!-- left side content start  -->

                            <div class="d-flex justify-content-center">
                                <!-- phone  -->
                                <div class="col-md-5 contaceMeDiv">
                                    <div class="contact-item d-flex mb-3">
                                        <div class="icon text-success  fs-4">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div class="ms-3">
                                            <div class="phone">Phone</div>
                                            <div class="phoneNo text-muted">09893102188</div>
                                        </div>
                                    </div>

                                    <!-- email  -->
                                    <div class="contact-item d-flex mb-3">
                                        <div class="icon text-primary fs-4">
                                            <i class="fa-solid fa-envelope-open-text"></i>
                                        </div>
                                        <div class="ms-3">
                                            <div class="email">Email</div>
                                            <div class="emailAddress text-muted">www.thmarazewa@gmail.com</div>
                                        </div>
                                    </div>

                                    <!-- adress  -->
                                    <div class="contact-item d-flex mb-3">
                                        <div class="icon text-danger fs-4">
                                            <i class="fa-regular fa-address-book"></i>
                                        </div>
                                        <div class="ms-3">
                                            <div class="sddress">Address</div>
                                            <div class="phoneNo text-muted"> Mohnyin township </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact section end  -->
                <!-- footer start  -->
                <div class="footer bg-secondary  border-top py-3">
                    <div class="container-lg">
                        <div class="row">
                            <strong class="text-black text-center m-auto fw-bold ">“If at first you don't succeed; call it version 1.0”.</strong>
                        </div>
                    </div>
                </div>
                <!-- footer end  -->
        </body>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                isActive:{
                    home:true,
                    aboutMe:false,
                    contact:false,
                },
                required:{
                    name : false,
                    email : false,
                    sub : false,
                    body : false,
                },
                content:{
                    name : '',
                    email : '',
                    sub : '',
                    body : '',
                }
            }
        },
        methods: {
            showSeciton (showName) {

                this.isActive.home = false;
                this.isActive.aboutMe = false;
                this.isActive.contact = false;

                if(showName == 'about'){
                    this.isActive.aboutMe = true;
                }else if(showName == 'contact'){
                    this.isActive.contact = true;
                }else{
                    this.isActive.home = true;
                }
            },
            validate(){
                for(let d in this.content){
                    if(this.content[d] == ''){
                        this.required[d] = true;
                    }else{
                        this.required[d] = false;
                    }
                }
            }
        }
    }
</script>

<style lang="stylus" scoped>

</style>
