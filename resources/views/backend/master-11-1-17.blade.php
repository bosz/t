<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/dist/ui/trumbowyg.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{route('dashboard.index')}}">{{Config('app.name')}}</a>
        </div>
        <ul class="nav navbar-nav pull-right">
          <li><a href="{{route('home')}}">Home</a></li>
        </ul>
      </div>
    </nav>

    <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="@yield('dashboard')">          
          <a href="{{route('dashboard.index')}}">
            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> 
            Dashboard
          </a>
        </li>
        <li role="presentation" class="@yield('posts')">          
          <a href="{{route('posts.index')}}">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
            Posts
          </a>
        </li>
        <li role="presentation" class="@yield('categories')">          
          <a href="{{route('category.index')}}">
            <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 
            Categories
          </a>
        </li>
        <li role="presentation" class="@yield('tags')">          
          <a href="{{route('tags.index')}}">
            <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 
            Tags
          </a>
        </li>
        <li role="presentation" class="@yield('users')">          
          <a href="{{route('user.index')}}">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
            Users
          </a>
        </li>
        @if (Auth::check())
        <li role="presentation">          
          <a href="{{route('logout')}}">
            <span class="glyphicon glyphicon-flash" aria-hidden="true"></span> 
            Logout
          </a>
        </li>
        @endif
      </ul>
    </div>

    <div class="col-md-9 @yield('class')">
      @yield('main')
    </div>

    <footer>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{route('dashboard.index')}}">Copyright @ {{date('Y')}} - {{Config('app.name')}}</a>
          </div>
        </div>
      </nav>
    </footer>
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('editor/dist/trumbowyg.js')}}"></script>
    <script src="{{asset('js/comos.js')}}"></script>
  </body>
</html>