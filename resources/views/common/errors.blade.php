@if(count($errors) > 0)
<div class="alert alert-danger">
Oops! Something went wrong!
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@if( Session::has('success') )
<div class="alert alert-success">
	{{Session::get('success')}}
</div>
@endif

@if( Session::has('error') )
<div class="alert alert-danger">
	{{Session::get('error')}}
</div>
@endif