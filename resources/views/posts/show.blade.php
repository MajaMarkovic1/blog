
@extends('layouts.master') 

@section('content')

<!-- <div> {{$post->title}} </div>
<div> {{$post->body}} </div> -->

<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{$post->created_at}}</p>
    @if($post->user->id)
        <p>by <a href='/users/{{ $post->user->id }}'>{{ $post->user->name}}</a></p>  
    @endif 

    @if(count($post->tags))
        <ul class='list-unstyled'>
            @foreach($post->tags as $tag)
                <li class='btn btn-primary'>
                    <a style='color: white;' href='/posts/tags/{{ $tag->name }}'>{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <p> {{$post->body}}</p>
</div><!-- /.blog-post -->

<h4>Post a comment</h4>
<form method='POST' action='/posts/{{$post->id}}/comments'>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="author">Author</label>
        <input name="author" type="text" class="form-control" id="author">
        @include('partials.error-message', ['fieldName' => 'author'])
    </div>
    <div class="form-group">
        <label for="text">Comment</label>
        <textarea name="text" class="form-control" id="text"></textarea>
        @include('partials.error-message', ['fieldName' => 'text'])
        
    </div>
    <input name='post_id' type="hidden" class="form-control" id="post_id" value = "{{$post->id}}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@foreach($post->comment as $comment)
    <div >{{$comment->author}}</div>
    <div style='color: grey'>{{$comment->text}}</div>
@endforeach
    


@endsection
