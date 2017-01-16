@extends('backend.master')
@section('title', 'Posts')
@section('posts', 'active')
@section('class', 'posts')

@section('main')
<h3>Posts <small>Manage posts</small></h1>
<div class="form-group">
	<a href="{{route('posts.create')}}" class="btn btn-success">Add New</a>
	<form action="{{route('postDeleteAll')}}" method="POST" class="inline">
  		{{method_field('DELETE')}}
  		{{csrf_field()}}
		<button type="submit" class="btn btn-danger">Delete All</button>
	</form>
</div>
@include('common.errors')
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Post</th>
			<th>Category</th>
			<th>Status</th>
			<th>Author</th>
			<th>Last Updated</th>
			<th>Action</th>
		</tr>
		@foreach ($posts as $post)
		<tr>
			<td>{{$post->title}}</td>
			<td>{{$post->category}}</td>
			<td><span class="label label-danger">{{$post->status}}</span></td>
			<td>{{$post->author}}</td>
			<td>{{$post->date}}</td>			
			<td>
				<a href="{{route('single', $post->id)}}" class="btn btn-primary" target="_blank">View</a>
			  	<a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
			  	<form action="{{route('posts.destroy', $post->id)}}" method="POST">
			  		{{method_field('DELETE')}}
			  		{{csrf_field()}}
			  		<button type="submit" class="btn btn-danger">Delete</button>
			  	</form>
			</td>
		</tr>
		@endforeach
	</table>
	{!!$posts->render()!!}
</div>
@endsection