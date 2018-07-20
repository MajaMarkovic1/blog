<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';

    protected $fillable = [
        'title', 'body', 'published', 'user_id'
    ];

    protected function published(){
        return self::where('published', 1)->get();
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($author, $text, $post_id){
        
        Comment::create([
            'author' => $author,
            'text' => $text,
            'post_id' => $post_id
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
