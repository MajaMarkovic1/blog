@extends('layouts.master')

@section('content')
    
    <form action='/posts' method='POST'>

        {{ csrf_field() }}

        <!-- @foreach($errors->all() as $error)
            <li class='btn btn-danger'>{{ $error }}</li>
        @endforeach -->

        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title">
            @include('partials.error-message', ['fieldName' => 'title'])
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control" id="body"></textarea>
            @include('partials.error-message', ['fieldName' => 'body'])
            
        </div>
            
        <div class="form-group form-check">
            <input name="published" value='1' type="checkbox" class="form-check-input" id="published">
            <label class="form-check-label" for="published">Publish</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection