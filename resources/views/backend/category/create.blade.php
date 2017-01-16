@extends('backend.master')
@section('title', 'Add Category')
@section('categories', 'active')
@section('class', 'categories')

@section('main')
<h3>Add Category</h1>
@include('common.errors')
<form action="{{route('category.store')}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Create Category</button>
	</div>
</form>
@endsection