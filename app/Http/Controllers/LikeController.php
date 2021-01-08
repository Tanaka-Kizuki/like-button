<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function firstcheck($post) {
     $user = Auth::user();
     $likes = new Like();
     $like = $likes->where('posts_id',$post)->first();
     if($like->where('user_id',$user->id)->first()) {
          return $like->like;
     } else {
          $like->create([
               'user_id' => $user->id,
               'posts_id' => $post,
               'like' => 0
          ]);
          return $like->like;
     }
    }

    public function check($post) {
     $like = Like::where('posts_id',$post)->first();
     if($like->like == 1) {
          $like->like = 0;
          $like->save();
          return $like->like;
     } else {
          $like->like = 1;
          $like->save();
          return $like->like;
     };
    }

    public function store(Post $post) {
     $user = Auth::user();
     if($user->id != $post->user_id) {
          if($post->isLiked(Auth::id())) {
               // 対象のレコードを取得して、削除する。
               $delete_record = $post->getLike($user->id);
               $delete_record->delete();
          } else {
               $like = Like::firstOrCreate(
                    array(
                       'user_id' => Auth::user()->id,
                       'item_id' => $post->id
                   )
               );
          }
     }
   }
}
