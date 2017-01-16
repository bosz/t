@extends('frontend.master')
@section('title', 'Latest Posts')
@section('class', 'latest')
@section('main') 
	<div class="col-md-10 col-md-offset-1">
		<h3>Latest Posts</h3>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>Post</th>
					<th>Category</th>
					<th>Author</th>
					<th>View</th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td>{{$post->title}}</td>
					<td>{{$post->category}}</td>
					<td>{{$post->author}}</td>
					<td><a href="{{route('single', $post->id)}}" class="btn btn-success">View</a></td>
				</tr>
				@endforeach
			</table>
		</div>
		{!! $posts->render() !!}
	</div>
@endsection