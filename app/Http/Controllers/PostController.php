<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Post;
use App\Models\Quote;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        return view('posts.index', [
            'posts' => isset($request->cat) ? Post::filter(['cat' => $request->cat])->get() : Post::all(),
            'quote' => Quote::all(),
            'publishedPosts' => Post::filter(['published' => '1'])->get(),  
            'cats' => Cat::all(),
            'cat' => Cat::find($request->cat) ?? 'none',
        ]);
    }

    public function showPost(Request $request){
        return view('posts.show', [
            'post' => Post::filter(['slug' => $request->slug])->get()->first(),
        ]);
    }

    public function createPost(){
        return view('posts.create', [
            'cats' => Cat::all()
        ]);
    }

}
