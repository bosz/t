@extends('frontend.master')
@section('title', 'Latest Posts')
@section('class', 'latest')
@section('main')

    <div class="col-md-4 col-md-offset-4">

        <h3>Register</h3>
        <hr>
        @include('common.errors')
        <form action="{{url('users/register')}}" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="radio inline">
                <label><input type="radio" value="male" name="gender">Male</label>
            </div>
            <div class="radio inline">
                <label><input type="radio" value="female" name="gender">Female</label>
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" value="{{ old('age') }}" class="form-control">
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <button class="btn btn-success" type="submit">Register</button>
                <a class="auth-log" href="{{url('users/login')}}"> Login </a>

            </div>
        </form>
    </div>

@endsection