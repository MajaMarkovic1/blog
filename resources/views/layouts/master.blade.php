<!-- stavi ceo fajl a kod extends tj razlika tu pravimo ono
   yeald pa mozemo samo deo,tj mi smo npr samo content, a mogli smo pored contenta imati
   npr sidebar..pa mozemo samo content a ne i sidebar..a sa include bi sve-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href='/css/blog.css' rel='stylesheet'>
    <title>Blog Template for Bootstrap</title>
    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/posts">Home</a>
          @if(auth()->check())
            <a class="nav-link" href="">{{ auth()->user()->name }}</a>
            <a class="nav-link" href="/logout">Log out</a>
            
          @else
            <a class="nav-link" href="/login">Log in</a>
            <a class="nav-link" href="/register">Register</a>
            
          @endif
        </nav>
      </div>
    </div>
    @include('partials.header')

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

        @yield('content')
          

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          
          <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
              @foreach ($tags as $tag)
              <li>
              <a href='/posts/tags/{{ $tag->name }}'>{{ $tag->name }}</a>
              </li>
              
              @endforeach
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
    @include('partials.footer')
    

  </body>
</html>


