@extends('frontend.master')
@section('title', 'Login')
@section('class', 'login')
@section('main') 
<div class="col-md-4 col-md-offset-4">
	@include('common.errors')
	<form action="{{route('authenticate')}}" method="POST">
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			{{csrf_field()}}
			<button class="btn btn-success">Log In</button>
		</div>
	</form>
</div>
@endsection