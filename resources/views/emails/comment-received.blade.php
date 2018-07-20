Hi {{ $post->user->name }}

You have a new comment on your <a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a> post.

Comment content: 

<p> 
    {{ $post->comment->last() }}
</p>