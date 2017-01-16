@extends('frontend.master')
@section('title', 'Latest Posts')
@section('class', 'latest')
@section('main')

    <div class="col-md-4  col-md-offset-4">

        <h3>Login</h3>
        <hr>
        @include('common.errors')
        <form action="{{url('users/login')}}" method="POST">

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                {{csrf_field()}}
                <button class="btn btn-success" type="submit">Login</button>

                <a class="auth-log" href="{{url('users/register')}}"> Register </a>
            </div>

        </form>
    </div>

@endsection