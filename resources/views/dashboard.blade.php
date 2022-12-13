@extends('main')

@section('content')

<div class="card">
	<div class="card-header">Dashboard</div>
	<div class="card-body">

	{{ Auth::user()->name }}
	{{ Auth::user()->id }}
	{{ Auth::user()->email }}
		
		You are Login in Laravel 9 Custom Login Registration Application.
	</div>
</div>

@endsection('content')