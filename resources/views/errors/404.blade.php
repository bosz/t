@extends('new-front.master')
@section('title', 'Page Not Found')
@section('class', 'page-not-found')
@section('main')
<section>
	<br><br><br>
    <div class="innerContainer ">
    	<center>
	        <div class="col-md-12" style="color: grey; border: 2px solid grey; padding: 20px;">
				@if(Request::has('search'))
				<h1>Search "{{Request::get('search')}}"</h1>
				<h2>Aucun résultat pour la recherche "{{Request::get('search')}}"</h2>
				@else
				<h1>404</h1>
				<h2>Page Not Found</h2>
				@endif
			</div>
			<br><br><br>
			<a class="submit" href="{{URL::to('/')}}">Take Me Back Home</a>
    	</center>
    </div>
    <div class="bottomSection">
        <div class="bottomLogo">
            <img src="{{ asset('nova_files/logo2.png') }}">
        </div>
    </div>
</section>
@endsection