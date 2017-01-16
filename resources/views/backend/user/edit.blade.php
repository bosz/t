@extends('backend.master')
@section('title', 'Edit User')
@section('users', 'active')
@section('class', 'users')

@section('main')
<h3>Edit User</h1>
@include('common.errors')
<form action="{{route('user.update', $user->id)}}" method="POST">
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="{{$user->name}}">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="{{$user->email}}">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control">
	</div>
	<div class="form-group">
		{{method_field('PUT')}}
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Update User</button>
	</div>
</form>
@endsection