<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
         $posts = Post::all();

         return response()->json($posts);
       
    }

    //Search
    public function search($title) {
        
        //Richiesta titolo che contiene $title
         $posts = Post::where('title', 'like', '%'.$title.'%')->get();

         return response()->json($posts);
       
    }
}
