@extends('backend.master')
@section('title', 'Tags')
@section('tags', 'active')
@section('class', 'tags')

@section('main')
<h3>Tags <small>Manage Tags</small></h1>
<div class="form-group">
	<a type="button" href="{{route('tags.create')}}" class="btn btn-success">Add New</a>
	<form action="{{route('tagsDeleteAll')}}" method="POST" class="inline">
  		{{method_field('DELETE')}}
  		{{csrf_field()}}
		<button type="submit" class="btn btn-danger">Delete All</button>
	</form>
</div>
@include('common.errors')
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Tags</th>
			<th>Action</th>
		</tr>
		@foreach ($tags as $tag)
		<tr>
			<td>{{$tag->title}}</td>		
			<td>
			  	<a href="{{route('tags.edit', $tag->id)}}" class="btn btn-success">Edit</a>
			  	<form action="{{route('tags.destroy', $tag->id)}}" method="POST">
			  		{{method_field('DELETE')}}
			  		{{csrf_field()}}
			  		<button type="submit" class="btn btn-danger">Delete</button>
			  	</form>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $tags->render() !!}
</div>
@endsection