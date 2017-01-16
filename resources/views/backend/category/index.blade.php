@extends('backend.master')
@section('title', 'Categories')
@section('categories', 'active')
@section('class', 'categories')

@section('main')
<h3>Categories <small>Manage Categories</small></h1>
<div class="form-group">
	<a type="button" href="{{route('category.create')}}" class="btn btn-success">Add New</a>
	<form action="{{route('categoryDeleteAll')}}" method="POST" class="inline">
  		{{method_field('DELETE')}}
  		{{csrf_field()}}
		<button type="submit" class="btn btn-danger">Delete All</button>
	</form>
</div>
@include('common.errors')
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Category</th>
			<th>Slug</th>
			<th>Action</th>
		</tr>
		@foreach ($categories as $category)
		<tr>
			<td>{{$category->title}}</td>
			<td>{{$category->slug}}</td>			
			<td>
			  	<a href="{{route('category.edit', $category->id)}}" class="btn btn-success">Edit</a>
			  	<form action="{{route('category.destroy', $category->id)}}" method="POST">
			  		{{method_field('DELETE')}}
			  		{{csrf_field()}}
			  		<button type="submit" class="btn btn-danger">Delete</button>
			  	</form>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $categories->render() !!}
</div>
@endsection