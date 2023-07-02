<?php

namespace App\Http\Controllers\API;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function createSubject(Request $request){
        $data = [
            'sub_name' => $request->subName,
            'cls_id' => $request->clsId,
        ];
        Subject::create($data);
        $rep=[
            'status' => true,
        ];
        return response()->json($rep);
    }


    public function getSubject(){
        $subjects = Subject::get();
        return response()->json($subjects);
    }
}
