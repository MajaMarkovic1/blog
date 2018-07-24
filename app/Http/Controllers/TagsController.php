<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
   public function showPostsWithTag($tag)
   {  
       $tagModel = Tag::where('name', $tag)->first();
       $posts = $tagModel->posts()->paginate(10);
       return view('posts.index', compact('posts'));
   }
}
