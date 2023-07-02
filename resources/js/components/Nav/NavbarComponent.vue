<template>
    <div class="menu-container sticky-top">
        <ul class="menu">
            <div class="menu-indicator" :style="{left:positionToMove, width:sliderWidth}"></div>
            <li class="menu-item"
            v-for="link in links"
            :key="link"
            @click="sliderIndicator(link.id)"
            :ref="'menu-item_' + link.id"
            >
                <router-link :to="link.ref" class="menu-link" :class="link.id == selectedIndex ? 'active' : null ">
                    <!-- <i class="menu-icon" :class="link.icon"></i> -->
                    <span>{{ link.text }}</span>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
   //import SidebarComponent from './SidebarComponent.vue';
    import '../../../css/Nav/NavbarComponent.css';
    export default {
        components:{
                //SidebarComponent,
            },
        data () {

            return {
                sliderPosition: 0,
                selectedElementWidth: 0,
                selectedIndex : 0,
                links:[
                        {
                        id:1,
                        // icon:"fa-brands fa-react",
                        ref:'/',
                        text:"Home",
                        },
                        {
                        id:2,
                        // icon:"fab fa-angular",
                        ref:'/class',
                        text:"Start",
                        },
                        {
                        id:3,
                        // icon:"fab fa-vuejs",
                        ref:'/doc',
                        text:"Doc",
                        },
                        {
                        id:4,
                        // icon:"fab fa-css3-alt",
                        ref:'/about',
                        text:"About",
                        },
                        // {
                        // id:5,
                        // //icon:"fab fa-js",
                        // text:"Javascript",
                        // },
                        // {
                        // id:6,
                        // //icon:"fab fa-html5",
                        // text:"HTML",
                        // }
                    ],

            }
        },
        methods: {
            sliderIndicator (id) {
                let el = this.$refs[`menu-item_${id}`][0];
                this.sliderPosition = el.offsetLeft;
                this.selectedElementWidth = el.offsetWidth;
                this.selectedIndex = id;

            }
        },
        computed: {
            positionToMove () {
                return this.sliderPosition + "px";
            },
            sliderWidth(){
                return this.selectedElementWidth + "px";
            }
        },
        mounted () {

        }
    }
</script>

<style>
@import url("https://fonts.googleapis.com/icon?family=Material+Icons");

</style>
