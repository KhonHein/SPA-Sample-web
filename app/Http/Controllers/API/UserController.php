<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getAllUsers($id){

        $user = User::where('id',$id)->first();
        if($user->role == 'admin'){
            $users = User::get();
            return response()->json(['status' => true,'users' => $users],200);
        }else{
            return response()->json(['status' => false,'users' => null],401);
        }

    }
    public function updateRole($id,$r){
            User::where('id',$id)->update(['role' => $r]);
            return response()->json(['status' => true,'users' => null],200);
    }

    //delete user
    public function deleteUser($id){
        User::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }
}
