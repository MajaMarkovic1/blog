@if($errors->has($fieldName))
    
    @foreach($errors->get($fieldName) as $error)
        <div class='alert alert-danger'>{{ $error }}</div>
    @endforeach
    
@endif