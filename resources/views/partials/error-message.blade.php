@if($errors->has($fieldName))
    <ul>
        @foreach($errors->get($fieldName) as $error)
            <li class='btn btn-danger'>{{ $error }}</li>
        @endforeach
    </ul>
@endif