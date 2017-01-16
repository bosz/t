@extends('backend.master')
@section('title', 'Add Tag')
@section('tags', 'active')
@section('class', 'tags')

@section('main')
<h3>Add Tag</h1>
@include('common.errors')
<form action="{{route('tags.store')}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Create Tag</button>
	</div>
</form>
@endsection