@extends('backend.master')
@section('title', 'Dashboard')
@section('dashboard', 'active')
@section('class', 'dashboard')
@section('main')
<div class="row">
	@include('common.errors')
	<div class="col-md-3">
		<a class="btn btn-block btn-danger">
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts 
			<span class="badge">{{$post_count}}</span>
		</a>
	</div>
	<div class="col-md-3">
		<a class="btn btn-block btn-success">
			<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Categories 
			<span class="badge">{{$categories->count()}}</span>
		</a>
	</div>
	<div class="col-md-3">
		<a class="btn btn-block btn-info">
			<span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Tags
			<span class="badge">{{$tags->count()}}</span>
		</a>
	</div>
	<div class="col-md-3">
		<a class="btn btn-block btn-warning">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users
			<span class="badge">{{$user->count()}}</span>
		</a>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-md-6">
	<h4>Latest Posts</h4>
	<table class="table table-bordered">
		<tr>
			<th>Post</th>
			<th>Author</th>
		</tr>
		@foreach($posts as $post)
		<tr>
			<td>{{$post->title}}</td>
			<td>{{$post->author}}</td>
		</tr>
		@endforeach
	</table>
	{!!$posts->render()!!}
	</div>
	<div class="col-md-6">
		<h4>Latest Post</h4>
		@if(isset($latest))
		<strong>{{$latest->title}}</strong>
		<p>{!!str_limit($latest->content, 200)!!}</p>
		<hr />
		<p>Author: {{$latest->author}}</p>
		<p>Status: {{$latest->status}}</p>
		<p>Category: {{$latest->category}}</p>
		<p>Tags: {{$latest->tags}}</p>
		<p>Published: {{$latest->date}}</p>	
		@endif	
	</div>
</div>

@endsection
