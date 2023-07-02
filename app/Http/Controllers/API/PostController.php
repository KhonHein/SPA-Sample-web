<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function createPost(Request $request){
        $data = [
            'post_title' => $request->postTitle,
            'cls_id' => $request->postClass,
            'sub_id' => $request->postSubject,
            'post_description' => $request->postDescription,
            'status' => $request->postStatus,
        ];
        Post::create($data);
        return response()->json(['status' => true ]);
    }

    public function getPost(){
        $posts = Post::get();
        return response()->json($posts);
    }
}
