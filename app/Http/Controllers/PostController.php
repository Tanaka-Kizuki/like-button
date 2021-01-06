<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Auth;

class PostController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function home() {
        $posts = Post::orderby('id','desc')->get();
        $user = Auth::user();
        return view('home',['posts' => $posts,'user'=>$user]);
    }

    public function create(Request $request) {
        $user = Auth::user();
        $data = $request->all();
        unset($data['_token']);
        $post = new Post;
        $post->fill($data)->save();
        $posts = Post::orderby('id','desc')->first();
        $like = Like::create([
            'user_id' => $user->id,
            'posts_id' => $posts->id
        ]);
        $like->save();
        return redirect('/home');
    }
}
