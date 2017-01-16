@extends('frontend.master')
@section('title', $post->title)
@section('class', 'single')
@section('main') 
	<div class="col-md-10 col-md-offset-1">
		<h1>{{$post->title}}</h1>
		<hr />
		<div class="form-group">
			<button class="btn btn-primary">Category: {{$post->category}}</button>
			<button class="btn btn-success">Published: {{$post->date}}</button>
			<button class="btn btn-danger">Author: {{$post->author}}</button>
		</div>
		{!!$post->content!!}
		<hr />
		<div class="form-group">
			<button class="btn btn-info">Tags: {{$post->tags}}</button>
		</div>
	</div>
@endsection