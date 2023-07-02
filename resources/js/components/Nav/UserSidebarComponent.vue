<template>
    <div v-if="authRole.isUser">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">

        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <li class="item" :class="{'active' : item.active}" v-for="item in sidebarMenu" :key="item" @click="onClickManu(item.id)">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i :class="item.icon"></i>
              </span>
              <span class="navlink">{{item.iconName }}</span>
            </div>
          </li>
        </ul>

        <!-- Sidebar Log  / out  -->
        <div class="bottom_content" @click="logout">
          <div class="bottom logout-div">
            <span> Logout </span>
            <i class='bx bx-log-in'></i>
          </div>
        </div>
      </div>
    </nav>

    </div>
</template>

<script>
    import axios from 'axios';
    import '../../../css/Nav/SidebarComponent.css';
    export default {
        data () {
            return {
                authRole:{
                isAdmin:false,
                isUser:false, // to user later version 
                isPro:false,
                },
                sidebarMenu: [
                    {
                        id:0,
                        iconName : "Hoem",
                        icon:"bx bx-home-alt",
                        create:false,
                        active:false
                    },
                    {
                        id:1,
                        iconName : "Demo Class",
                        icon:"bx bx-book-add",
                        create:false,
                        active:false
                    },
                    {
                        id:2,
                        iconName : "Demo Sub",
                        icon:"bx bx-grid-alt",
                        create:false,
                        active:false
                    },
                    {
                        id:3,
                        iconName : "Demo Doc ",
                        icon:"fa-solid fa-scroll",
                        create:false,
                        active:false
                    },
                    {
                        id:4,
                        iconName:"Demo list",
                        icon:"bx bx-list-ol",
                        create:false,
                        active:false
                    },
                    {
                        id:5,
                        iconName:"Demo Post",
                        icon:"bx bx-detail",
                        create:false,
                        active:false
                    },
                    {
                        id:6,
                        iconName:"Demo pp",
                        icon:"bx bx-user-circle",
                        create:false,
                        active:false
                    }
                ],

            }
        },
        methods: {
                onClickManu (id) {
                    this.falseAllStatus();
                    this.sidebarMenu[id].create = true;
                    this.sidebarMenu[id].active =true;
                    const data = this.sidebarMenu[id].id;
                    //send create to partnt
                   // this.$emit('create-data' , data)
                },
                falseAllStatus(){
                    for(let i=0; i<this.sidebarMenu.length; i++){
                        this.sidebarMenu[i].create = false;
                        this.sidebarMenu[i].active = false;
                    }
                },
                logout(){
                    localStorage.clear();
                    location.reload();
                },
                isAdmin(userId){
                const url = `http://127.0.0.1:8000/api/is_admin`;
                    axios.post(url,{
                        id:userId,
                    }).then(response=>{
                        this.setUserRoole(response.data)
                    }).then(error =>{
                        console.log(error)
                    })
                },
                setUserRoole(data){
                    if(data.status){
                        this.authRole.isAdmin = true;
                        this.authRole.isUser = false;
                        
                    }else{
                        this.authRole.isAdmin = false;
                        this.authRole.isUser = true;
                    }
                }

            },
            mounted () {
                this.isAdmin(localStorage.getItem('id'));
                
            }
    }
</script>

<style lang="stylus" scoped>

</style>
