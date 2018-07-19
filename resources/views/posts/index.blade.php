
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
        <p>by {{ $post->user->name}}</p>
        <p class="blog-post-meta">{{$post->created_at}}</p>
        <p> {{$post->body}}</p>

    </div><!-- /.blog-post -->
    @endforeach


@endsection
<!-- @section('sidebar') -->
