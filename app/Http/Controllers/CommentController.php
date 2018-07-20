<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentReceived;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store($id)
  {
       $this->validate(request(), ['author' =>'required','text' => 'required']);
       $post = Post::find($id);
       $post->addComment(request('author'), request('text'), request('post_id'));
     

//    $comment = $post->comments()->create([
//        'author' => request('author'),
//        'text' => request('text'),
//        'post_id' => $post->id
       
//    ]);
        
        Mail::to($post->user)->send(new CommentReceived($post));
       return back();
  }
}
