@extends('backend.master')
@section('title', 'Users')
@section('users', 'active')
@section('class', 'users')

@section('main')
<h3>Users <small>Manage Users</small></h1>
<div class="form-group">
	<a type="button" href="{{route('user.create')}}" class="btn btn-success">Add New</a>
</div>
@include('common.errors')
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		@foreach ($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>		
			<td>
			  	<a href="{{route('user.edit', $user->id)}}" class="btn btn-success">Edit</a>
			  	<form action="{{route('user.destroy', $user->id)}}" method="POST">
			  		{{method_field('DELETE')}}
			  		{{csrf_field()}}
			  		<button type="submit" class="btn btn-danger">Delete</button>
			  	</form>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $users->render() !!}
</div>
@endsection