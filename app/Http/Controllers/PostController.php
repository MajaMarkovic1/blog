<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::published();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        //$post = Post::findOrFail($id);
        $post = Post::with('comment')->find($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        // $post = new Post();

        // $post->title = request('title');
        // $post->body = request('body');
        // $post->published = request('published');

        // $post->save();

        $this->validate(request(), ['title' => 'required', 'body' => 'required']);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'published' => (bool) request('published')
        ]);
        return redirect('/posts');
    }


}
