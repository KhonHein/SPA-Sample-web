<?php

namespace App\Http\Controllers\API;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function createDoc(Request $request){
        $data = [
            'title' => $request->title,
            'aim' => $request->aim,
            'description' => $request->description,
        ];
        Document::create($data);
        return response()->json(['status' => true]);
    }

    public function getDoc(){
        $documents = Document::get();
        return response()->json($documents);
    }
}
