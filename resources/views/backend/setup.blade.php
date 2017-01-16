@extends('frontend.master')
@section('title', 'Setup')
@section('class', 'setup')
@section('header')
<meta name="robots" content="nofollow, noindex">
@endsection

@section('main') 
	<div class="col-md-6 col-md-offset-3">
    @include('common.errors')
		<form action="{{route('install')}}" method="POST">
  		<h3>Application installer</h3>
  		<p>After the successful installation, it will redirect to the login page. Use the below Email and password for login. You can change it from the dashboard after log in.</p>
  		<pre>
  			Email: admin@admin.com
  			Password: admin
  		</pre>
      {{csrf_field()}}
		  <button type="submit" class="btn btn-success">Run Installation</button>
	  </form>
	</div>
@endsection