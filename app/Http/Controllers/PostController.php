<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); 
        //samo ulogovani mogu da pristupaju svim metodama, 
        //ostali mogu da pristupe samo index i show
    }
    public function index()
    {
        $posts = Post::paginate(10);
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
            'published' => (bool) request('published'),
            'user_id' => auth()->user()->id
        ]);
        return redirect('/posts');
    }


}
