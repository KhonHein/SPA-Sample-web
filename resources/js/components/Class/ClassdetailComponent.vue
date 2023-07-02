<template>
    <div class="container">
        <div v-if="isActive.class" class="card-container" >
            <div class="row d-flex justify-content-around">
                <div class="carousel-item col-md-3 col-sm-6 cls-div"
                v-for="cls in classes" :key="cls"
                @click="clickDetail(cls.id)"
                >
                    <img :src="imgSrcs">
                    <div class="carousel-caption d-md-block">
                        <h4 class="text-info fw-bold">
                            <i class="fa-solid fa-quote-left"></i>
                            {{ cls.class_title }}
                            <i class="fa-solid fa-quote-right"></i>
                        </h4>
                        <strong class="text-success fw-bold">{{cls.description}}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isActive.info" class="card-container details" >
            <div class="row d-flex justify-content-around">
                <div v-for="s in subjects" :key="s" class="d-flex">
                    <div class="carousel-item col-md-3 col-sm-6 cls-div"
                    v-if="s.cls_id == this.isActive.clsId"
                    >
                        <img :src="imgSrcs">
                        <div class="carousel-caption d-md-block">
                            <h4 class="text-warning fw-bold">{{ s.sub_name }}</h4>
                            <strong>
                            <h4 class="text-success fw-bold">
                                <i class="fa-solid fa-quote-left"></i>
                                {{isActive.activeClsName}}
                                <i class="fa-solid fa-quote-right"></i>
                            </h4>
                            <small class="text-info">Read..by pro</small>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    import '../../../css/Class/Classdetail.css';

    export default {
        components:{

            },
        data () {
            return {
                classes: {},
                subjects:[],
                posts:[],
                // relatedPost:[],
                imgSrcs:`https://progressier.com/assets/img/new-home/dashboard-prev.jpg`,
                isActive:{
                    class:true,
                    info:false,
                    clsId:0,
                    subId:0,
                    activeClsName:'',
                    // activeSubName:'',
                },
            }
        },
        methods:{
            getData(paraUrl , str ) {
                let url = paraUrl;
                axios.get(url)
                .then(response => {
                    // Handle the response data
                    if(str == 'cls'){
                        this.storeClasses(response.data);
                    }else if(str == 'subject'){
                        this.storeSubjects(response.data);
                    }else{
                        this.storePosts(response.data);
                    }
                })
                .catch(error => {
                    // Handle the error
                    console.log(error);
                });
            },

            storeClasses(data){
                this.classes = data;
            },
            storeSubjects(data){
                this.subjects = data;
            },
            storePosts(data){
                this.posts = data;
            },
            clickDetail(id){
                this.isActive.class = !this.isActive.class ;
                this.isActive.info = !this.isActive.info ;
                this.isActive.clsId = id;

                this.classes.forEach(cls => {
                    if(cls.id == id){
                        this.isActive.activeClsName = cls.class_title;
                    }
                });
                // this.$router.push('/class_info')

            },
        },
        mounted () {
            let url = `http://127.0.0.1:8000/api/all_classes`;
            this.getData(url , 'cls');

            let pUrl = `http://127.0.0.1:8000/api/all_posts`;
            this.getData(pUrl , 'post');

            let subUrl = `http://127.0.0.1:8000/api/all_subjects`;
            this.getData(subUrl , 'subject');
        }
    }
</script>

<style scoped>
.card-container{
    margin-left:140px ;
    display: flex;
    justify-content: center;

}
.cls-div{
 width: 400px;
 height: 150px;
 cursor: pointer;
 color: black;
 margin: 1.5rem auto 2rem;
 display: flex;
 justify-content: center;
 align-items: center;
}
.cls-div img{
    width: 100%;
    border: 1px solid rgb(44, 236, 5);
    border-radius: .5rem;
    box-shadow: .2rem .2rem .2rem .2rem rgb(20, 17, 17);
    margin: 1rem 0;
    padding: .05rem;
    overflow: hidden;

}
.cls-div div{
    margin: .5rem auto .0rem;
    font-weight: bold;

}
.cls-div i{
    color: rgb(250, 234, 4);
}

/* show-info-container details */
.show-info-container{

}


@media screen and (max-width: 1000px) {
.card-container{
    margin-left: 50px;
}
.cls-div{
    margin-top: 10px;
    width: 350px;
    height: 150px;
}
}



</style>
