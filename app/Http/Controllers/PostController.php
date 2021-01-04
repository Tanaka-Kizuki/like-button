<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;

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
        $posts = Post::orderby('id','desc')->first();
        $like = Like::create([
            'posts_id' => $posts->id
        ]);
        $like->save();
        return redirect('/');
    }
}
