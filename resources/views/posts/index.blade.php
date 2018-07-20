
@extends('layouts.master')

@section('content')

    @if(auth()->check())
        <a href='/posts/create'>
            <button class='btn btn-primary'>Create post</button>
        </a>
    @endif
    
    @foreach($posts as $post)

    <div class="blog-post">
<!-- action("PostController@show", $post->id) -->
        <h2 class="blog-post-title"><a href='/posts/{{$post->id}}' >{{ $post->title }}</a></h2>
        @if($post->user->id)
            <p>by <a href='/users/{{ $post->user->id }}'>{{ $post->user->name}}</a></p>  
        @endif 
        <p class="blog-post-meta">{{$post->created_at}}</p>
        <p> {{$post->body}}</p>

    </div><!-- /.blog-post -->
    @endforeach


@endsection
<!-- @section('sidebar') -->
