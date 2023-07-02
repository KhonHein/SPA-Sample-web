<?php

namespace App\Http\Controllers\API;

use App\Models\ClassName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassNameController extends Controller
{

    // get all classes
    public function getAllClasses(){
        $classes = ClassName::get();
        return response()->json($classes);
    }
    public function createClass(Request $request){
        $data = [
            'class_title' =>  $request->className,
            //'image' =>$request->image,
            'description' => $request->description,
        ];
        ClassName::create($data);
        $rep = [
            'status' => true,
        ];
        return response()->json($rep);
    }
}
