<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderby('id','desc')->get();
        return view('home',['posts' => $posts]);
    }

    public function create(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        $post = new Post;
        $post->fill($data)->save();
        return redirect('/');
    }
}
