<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'memo',
    ];

    public function likes() {
        return $this->hasMany('App\Like');
    }
}