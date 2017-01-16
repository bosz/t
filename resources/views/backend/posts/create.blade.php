@extends('backend.master')
@section('title', 'Add Post')
@section('posts', 'active')
@section('class', 'posts')

@section('main')
<h3>Add Post</h1>
@include('common.errors')
<form action="{{route('posts.store')}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<textarea name="content" class="form-control" id="editor"></textarea>
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="public">Public</option>
			<option value="draft">Draft</option>
		</select>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category" class="form-control">
			@foreach($categories as $category)
			<option value="{{$category->title}}">{{$category->title}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Tags</label>
		<input type="text" name="tags" id="tags" class="form-control">
	</div>
	<div class="form-group">
		<label>Date</label>
		<input type="text" name="date" id="datepicker" class="form-control">
	</div>
	<div class="form-group">
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Create Post</button>
	</div>
</form>

<script type="text/javascript">
var availableTags = [
	@foreach($tags as $tag)
      "{{$tag->title}}",
    @endforeach
    ];
</script>
@endsection