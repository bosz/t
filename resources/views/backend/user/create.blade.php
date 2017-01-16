@extends('backend.master')
@section('title', 'Add User')
@section('users', 'active')
@section('class', 'users')

@section('main')
<h3>Add User</h1>
@include('common.errors')
<form action="{{route('user.store')}}" method="POST">
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control">
	</div>
	<div class="form-group">
		{{csrf_field()}}
		<button class="btn btn-success" type="submit">Create User</button>
	</div>
</form>
@endsection