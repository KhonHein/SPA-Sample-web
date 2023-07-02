<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //user register
    public function register(Request $request){
        $isAlready = false;
        $users = User::get();
        foreach($users as $u){
            if($u->email == $request->email){

                $this->$isAlready = true;

            }
        }
        if($isAlready){

            $ret =  $this->returnData(false,null,null,'the email is already existed');
            return response()->json($ret);

        }else{
            if($this->checkValidate($request)->fails()){
                $ret = $this->returnData(false,null,null,'validate information fails ');
                return response()->json($ret);
            }else{

                $user =  User::create($this->getData($request));

                $token = $user->createToken('API Token')->plainTextToken;
                if($request->remember){
                    $user = User::where('email',$request->email)->update(['saveToken' => $token]);
                }
                $user = User::where('email',$request->email)->first();
                //$token = $user->saveToken;
                $ret = $this->returnData(true,$user,$token,"yor are registered");
                return response()->json($ret);
            }
        }
    }

    //user login
    public function login(Request $request){

        $user = User::where('email',$request->email)->first();

        if($user != null || $user != false || $user != ''){

            if($this->checkPassword($request , $user->password)){
                $token = 'not remember tempory token ';
                if($request->remember){
                    $token = $user->saveToken;
                }
                $ret =  $this->returnData(true,$user,$token,'you logined success');

                return response()->json($ret);

            }else{

                $ret =  $this->returnData(false,null,null,'Password not same try again ! ');

                return response()->json($ret);
            }

        }else{
            $ret =  $this->returnData(false,null,null,'there is no user email ');

            return response()->json($ret);
        }
    }


    //check is admin
    public function isAdmin(Request $request){
        $user = User::where('id', $request->id)->first();
        if($user->role == 'admin'){
            $ret =  $this->returnData(true,null,null,'admin');
            return response()->json($ret);
        }else if($user == 'pro'){
            $ret =  $this->returnData(false,null,null,'pro');
            return response()->json($ret);
        }else if($user == 'user'){
            $ret =  $this->returnData(false,null,null,'user');
            return response()->json($ret);
        }else{
            $ret =  $this->returnData(false,null,null,'null');
            return response()->json($ret);
        }
    }
    //check password
    private function checkPassword($request , $password){
        return Hash::check($request->password , $password) ? true : false;
    }

    //check token
    public function checkToken(Request $request){
        $isIt = false;
         $token = $request->token;
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($token === $user->saveToken){
            $isIt = true;
        }
        return response()->json(['status' => $isIt]);
    }

        //get user data
        private function getData($request){
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ];
            // if($request->remember){
            //     $data +=['saveToken' => Str::random(60)];
            // }
            return $data;
        }
    //check validat
    private function checkValidate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        return $validator;
    }

    //return data
    private function returnData($status, $user,$token, $sms){
        $ret=[
            'status' =>$status,
            'user' =>$user,
            'token' =>$token,
            'sms' => $sms,
            ];
        return $ret;
    }
}
