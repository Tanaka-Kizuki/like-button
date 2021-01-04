<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Post;

class LikeController extends Controller
{
    public function check() {
         if()
         return $data;
    }

    public function store(Post $post)
   {
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
