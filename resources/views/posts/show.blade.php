
@extends('layouts.master') 

@section('content')

<!-- <div> {{$post->title}} </div>
<div> {{$post->body}} </div> -->

<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{$post->created_at}}</p>
    <p> {{$post->body}}</p>
</div><!-- /.blog-post -->

@foreach($post->comment as $comment)
    <li>{{$comment->author}}</li>
    <li>{{$comment->text}}</li>
@endforeach
    


@endsection
