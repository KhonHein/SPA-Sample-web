<template>
    <div class="home-container">
        <SidebarComponent 
        @create-data="handelCrate" class="sidebar-compo"></SidebarComponent>
        
        <UserSidebarComponent 
        class="sidebar-compo"></UserSidebarComponent> 
        <HomeComponent v-if="isCreateId == 0" class="home-compo"></HomeComponent>
        <CreateclassComponent v-if="isCreateId == 1" class="createclass-compo"></CreateclassComponent>
        <CreatesubjectComponent v-if="isCreateId == 2"  class="createSubj-compo"></CreatesubjectComponent>
        <AddDocComponent v-if="isCreateId == 3" class="add-doc-compo"></AddDocComponent>
        <UserslistComponent v-if="isCreateId == 4"  class="userList-compo"></UserslistComponent>
        <CreateComponent v-if="isCreateId == 5"  class="createPost-compo"></CreateComponent>
        <!-- if profile go to about page , portfolio-->
        <PortfolioComponentVue v-if="isCreateId == 6" class="portfolio-compo"></PortfolioComponentVue>
    </div>
</template>

<script>
    import SidebarComponent from '../Nav/SidebarComponent.vue';
    //for user
    import UserSidebarComponent from '../Nav/UserSidebarComponent.vue';

    import HomeComponent from '../Home/HomeComponent.vue';
    import CreateclassComponent from '../Class/CreateclassComponent.vue';
    import CreatesubjectComponent from '../Class/CreatesubjectComponent.vue';
    import AddDocComponent from '../Document/AddDocComponent.vue';
    import UserslistComponent from '../List/UserslistComponent.vue';
    import CreateComponent from '../Posts/CreateComponent.vue';

    //if profile to go about
    import PortfolioComponentVue from '../Home/PortfolioComponent.vue';

    import '../../../css/Pages/Home.css';
    import axios from 'axios';
    export default {

        name:'home',
        components:{

            SidebarComponent,
            UserSidebarComponent,
            HomeComponent,
            CreateclassComponent,
            CreatesubjectComponent,
            AddDocComponent,
            UserslistComponent,
            CreateComponent,

            //for profile
            PortfolioComponentVue,

        },
        data () {
            return {
                isCreateId:0,

                authRole:{
                    isAdmin:false,
                    isUser:false, // to user later version 
                    isPro:false,
                },
            }
        },
        methods: {
            handelCrate(data){
               this.isCreateId = data;
            },
        },
        mounted () {
            
        }
    }
</script>

<style lang="stylus" scoped>

</style>
