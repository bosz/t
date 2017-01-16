@extends('backend.master')
@section('title', 'Edit Category')
@section('categories', 'active')
@section('class', 'categories')

@section('main')
<h3>Edit Category</h1>
@include('common.errors')
<form action="{{route('category.update', $category->id)}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" value="{{$category->title}}">
	</div>
	<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control" value="{{$category->slug}}">
	</div>
	<div class="form-group">
		{{method_field('PUT')}}
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Update Category</button>
	</div>
</form>
@endsection