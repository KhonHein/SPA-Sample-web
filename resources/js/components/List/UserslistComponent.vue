<template>
    <div class="user-list-container w-100 d-flex justify-content-center align-tiems-center">
        <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row flex-lg-nowrap ">
            <div class="col mb-3">
                <div class="e-panel card">
                <div class="card-body">
                    <div class="card-title">
                    <h6 class="mr-2"><span>All Users</span><small class="px-1">List </small></h6>
                    <strong class="text-danger fw-bold" v-if="isDelete"><small>{{ this.noti }}</small></strong>
                </div>
                    <div v-if="is_Admin" class="e-table">
                    <div class="table-responsive table-lg mt-3">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>Photo</th>
                            <th class="max-width">Name</th>
                            <th>Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in paginatedData" :key="user" class="user-list-row">
                                <td class="align-middle text-center">
                                    <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;">
                                        <img :src="tempUserImg" alt="" class="pp-image">
                                    </div>
                                </td>
                                <td  class="text-nowrap align-middle">{{ user.name }}</td>
                                <td  class="text-nowrap align-middle"><span>{{user.class}}</span></td>

                                <td  class="text-center align-middle">
                                    <div class="btn-group align-top">
                                        <button
                                        class="btn btn-sm btn-outline-dark badge btn-secondary"
                                        type="button"
                                         data-bs-toggle="modal"
                                         data-bs-target="#user-form-modal"
                                         @click="editUser(user.id)"
                                         >Edit</button>
                                        <button
                                        class="btn btn-sm btn-outline-dark badge btn-secondary"
                                        type="button"
                                        @click="deleteUser(user.id)"
                                        ><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="pagination mt-3 mb-0">
                        <li class="disabled page-item mx-2">
                            <button
                            class="btn btn-sm btn-outline-secondary px-3 text-primary"
                            @click="previousPage" :disabled="currentPage === 1"><i class="fa-solid fa-angles-left"></i></button>
                        </li>

                        <li class="page-item mx-2">
                            <button
                            class="btn btn-sm btn-outline-secondary px-3 text-primary"
                            @click="nextPage" :disabled="currentPage === totalPages"><i class="fa-solid fa-angles-right"></i></button>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-3">
                <div class="card">
                <div class="card-body">
                    <div class="text-center px-xl-3">
                        <button type="button" class="btn btn-success btn-block" disabled>Details</button>
                    </div>
                    <hr class="my-3">
                    <div class="e-navlist e-navlist--active-bold">
                    <ul class="nav">
                        <li class="nav-item active"><a href="" class="nav-link"><span>All</span>&nbsp;<small>{{ Object.keys(users).length }}</small></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><span>found words </span>&nbsp;<small>/&nbsp; {{  foundName }}</small></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><span>Selected</span>&nbsp;<small>/&nbsp;0</small></a></li>
                    </ul>
                    </div>
                    <hr class="my-3">
                    <div>

                    <div class="form-group">
                        <label>Search with  Key :</label>
                        <div>
                            <input
                            class="form-control w-100"
                            type="text"
                            placeholder="name.etc."

                            v-model="nameKey"

                            @keyup="searchByname"
                            >
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- User Form Modal -->

            <div class="modal fade " tabindex="-1" aria-hidden="true" id="user-form-modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close border rounded-5 btn btn-outline-dark"  data-bs-dismiss="modal">
                    <span aria-hidden="true" class="fs-5"><i class="fa-solid fa-circle-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                    <form class="form" novalidate="">
                        <div class="row">
                        <div class="col">
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" v-model="detailsUser.name" placeholder="John Smith">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label>Username</label>
                                <input class="form-control"
                                 type="text"
                                 v-model="detailsUser.email"
                                 placeholder="user@example.com">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>Class</label>
                                <input
                                class="form-control"
                                type="text"
                                v-model="detailsUser.class"
                                placeholder="Us / Uk/ EU /My/ Thai/.s">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col mb-3">
                                <div class="form-group">
                                <label>About</label>
                                <textarea
                                class="form-control"
                                rows="5"
                                placeholder="My Bio"
                                v-model="detailsUser.address"
                                ></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <div class="mb-2"><b>Change Password</b></div>
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" placeholder="••••••">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" type="password" placeholder="••••••">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                <input class="form-control" type="password" placeholder="••••••"></div>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                            <div class="mb-2"><b>Update user's role </b></div>
                            <div class="row">
                            <div class="col">
                                <!-- <label>Update Role </label> -->
                                <div class="custom-controls-stacked px-2">
                                <div class="custom-control custom-checkbox">
                                    <input v-model="role.select" value="user" type="radio" name="options" class="custom-control-input" id="select-role" :checked="detailsUser.role == 'user'">
                                    <label class="custom-control-label" for="select-role">User </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input v-model="role.select" value="pro" type="radio" name="options" class="custom-control-input" id="select-role" >
                                    <label class="custom-control-label" for="select-role" :checked="detailsUser.role == 'pro'">Pro </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input v-model="role.select" value="admin" type="radio" name="options" class="custom-control-input" id="noselect-role">
                                    <label class="custom-control-label" for="noselect-role" :checked="detailsUser.role == 'admin'">Admin </label>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" data-bs-dismiss="modal" type="button" @click="updateRole">Updata Role</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </template>

    <script>
        import axios from 'axios';
        export default {

            mounted () {
                const url = `http://127.0.0.1:8000/api/all_users/${this.userId}`
                this.getData(url , 'users');
                console.log(this.userId)
            },
            data () {
                return {
                    noti : '',
                    is_Admin:false,
                    userId:localStorage.getItem('id'),
                    users:[],
                    isDelete:false,
                    nameKey:'',
                    foundName:0,
                    detailsUser:{},
                    tempUserImg:`https://cdn.thenewstack.io/media/2023/02/4d8708c2-evanyou_feature-1024x614.jpg`,

                    //paginate
                    currentPage: 1,
                    itemsPerPage: 10,

                    role:{
                        select:'',
                        // user:false,
                        // pro:false,
                        // admin:false,
                    }
                }
            },
            methods: {
                getData(paraUrl , str){
                    const url = paraUrl;

                    axios.get(url)
                    .then(response => {
                        // Handle the response data
                        if(str == 'users'){
                            this.storeResponse(response.data);
                        }else if(str == 'update_role'){
                            this.shoreNoti(response.data , 'You update one user role');
                        }else{
                            this.shoreNoti(response.data , 'You deleted one user !! ');
                        }
                    })
                    .catch(error => {
                        // Handle the error
                        console.log(error);
                    });
                },
                updateRole(){
                    if(confirm(`it will change the user role to  ${this.role.select}`)){
                        const url = `http://127.0.0.1:8000/api/update_role/${this.detailsUser.id}/${this.role.select}`;
                        this.getData(url,'update_role');
                        //console.log(this.detailsUser.id);
                    }
                },
                searchByname(){
                    let rows = document.querySelectorAll('.user-list-row');
                    let rCount = rows.length;
                    rows.forEach((r , i) => {

                        let datas = r.textContent.toLowerCase();
                        r.classList.toggle('hide',datas.indexOf(this.nameKey.toLowerCase()) < 0 );
                        r.style.setProperty('--delay',i/25 +'s')
                        if(r.classList.contains('hide')){
                            rCount += -1;
                        }else{
                            rCount += 1;
                        }

                    });
                    this.foundName = rCount;

                }
                ,
                storeResponse(data){
                    if(data.status){
                        this.users = data.users;
                        this.is_Admin = true;
                    }else{
                        this.users = null;
                        this.is_Admin = false;
                    }
                },
                deleteUser(id){
                    if(confirm("Are you sure to delete this user ! ? ! ")){
                        // console.log("OK deleted " + id)
                        let url = `http://127.0.0.1:8000/api/delete_user/${id}`;
                        this.getData(url , 'delete');
                    }
                },
                editUser(id){
                    // console.log(id)
                    this.users.forEach(user => {
                        if(user.id == id){
                            this.detailsUser = user;
                        }
                    });
                },
                shoreNoti(data , sms){
                    if(data.status){
                        // location.reload();
                        this.isDelete = true;
                        this.noti = sms;
                        setTimeout(()=>{
                        this.isDelete = false;
                        },7000)
                    }
                },

                //for pagingate
                previousPage() {
                if (this.currentPage > 1) {
                    this.currentPage--;
                }
                },
                nextPage() {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                }
                }
            },
            computed: {
                paginatedData() {
                    const startIndex = (this.currentPage - 1) * this.itemsPerPage;
                    const endIndex = startIndex + this.itemsPerPage;
                    return this.users.slice(startIndex, endIndex);
                    },
                    totalPages() {
                        return Math.ceil(this.users.length / this.itemsPerPage);
                    }
            },
        }
    </script>

    <style scoped>
    /* .user-list-container{

        height: 80vh;
        display: flex;
        justify-content:
        center;
        align-items: center;

    } */
    .user-list-row{
        font-weight: bold;
        --delay:.1s;
        transition: .5s ease-in-out var(--delay);
    }
    .user-list-row.hide{
        opacity: 0.15;
        transition: translateX(100%);
    }
    .user-list-row.hide{
        height: 0;
        margin: 0;
        padding: 0;
    }
    .pp-image{
        width:4rem; height: 3rem; border-radius: .3rem;
    }
    </style>
