<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected function published(){
        return self::where('published', 1)->get();
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
