<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'item_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
