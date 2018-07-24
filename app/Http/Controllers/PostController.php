<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Tag;
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
        $posts = Post::with('user')->latest()->paginate(10);
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
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {

        $this->validate(request(), [
            'title' => 'required', 
            'body' => 'required', 
            'tags' => 'required|array'
            ]);

        // if (empty(auth()->user())){
        //     return redirect('/posts');
        // }

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'published' => (bool) request('published'),
            'user_id' => auth()->user()->id
        ]);
        
        $post->tags()->attach(request('tags'));

        return redirect('/posts');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts');
    }


}
