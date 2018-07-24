
@extends('layouts.master')

@section('content')

    @if(auth()->check())
        <a href='/posts/create'>
            <button class='btn btn-primary'>Create post</button>
        </a>
    @endif
    
    @foreach($posts as $post)

    <div class="blog-post">


        <h2 class="blog-post-title"><a href='/posts/{{$post->id}}' >{{ $post->title }}</a></h2>
        @if($post->user->id)
            <p>by <a href='/users/{{ $post->user->id }}'>{{ $post->user->name}}</a></p>  
        @endif 
        <p class="blog-post-meta">{{$post->created_at}}</p>
        <p> {{$post->body}}</p>

    </div><!-- /.blog-post -->
    @endforeach
    
    <nav class='blog-pagination'>
        <a class="btn btn-outline-
        {{ $posts->currentPage() == 1 ? 'secondary disabled' : 'primary' }}"
         href='{{ $posts->previousPageUrl() }}'>Previous</a>
        <a class="btn btn-outline-
        {{ $posts->hasMorePages() ? 'primary' : 'secondary disabled' }}"
         href='{{ $posts->nextPageUrl() }}'>Next</a>
         Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
         <!-- ? if true, : else -->
    </nav>
        


@endsection

