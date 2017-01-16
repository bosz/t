@extends('backend.master')
@section('title', 'Edit Post')
@section('posts', 'active')
@section('class', 'posts')

@section('main')
<h3>Edit Post</h1>
@include('common.errors')
<form action="{{route('posts.update', $post->id)}}" method="POST">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" value="{{$post->title}}">
	</div>
	<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control" value="{{$post->slug}}">
	</div>
	<div class="form-group">
		<textarea name="content" class="form-control" id="editor">{{$post->content}}</textarea>
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="public" >Public</option>
			<option value="draft" <?php echo (strtolower($post->status)=='draft')?'selected':''; ?>>Draft</option>
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
		<input type="text" name="tags" id="tags" class="form-control" value="{{$post->tags}}">
	</div>
	<div class="form-group">
		<label>Date</label>
		<input type="text" name="date" id="datepicker" class="form-control" value="{{$post->date}}">
	</div>
	<div class="form-group">
		{{method_field('PUT')}}
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Update Post</button>
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