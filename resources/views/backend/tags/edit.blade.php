@extends('backend.master')
@section('title', 'Edit Tag')
@section('tags', 'active')
@section('class', 'tags')

@section('main')
<h3>Edit Tag</h1>
@include('common.errors')
<form action="{{route('tags.update', $tag->id)}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" value="{{$tag->title}}">
	</div>
	<div class="form-group">
		{{method_field('PUT')}}
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Update Tag</button>
	</div>
</form>
@endsection