@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">Registration</div>
		<div class="card-body">
			<form action="{{ route('sample.validate_registration') }}" method="POST">
				@csrf
				<div class="form-group mb-3">
					<input type="text" name="org_name" class="form-control" placeholder="Organization Name" />
					@if($errors->has('org_name'))
						<span class="text-danger">{{ $errors->first('org_name') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="org_number" class="form-control" placeholder="Organization Number" />
					@if($errors->has('org_number'))
						<span class="text-danger">{{ $errors->first('org_number') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="number" name="contact_no" class="form-control" placeholder="Contact Number" />
					@if($errors->has('contact_no'))
						<span class="text-danger">{{ $errors->first('contact_no') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" placeholder="Email Address" />
					@if($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group mb-3">
					<textarea name="address" class="form-control rounded-left" cols="30" rows="10" placeholder="Address"></textarea>
					@if($errors->has('address'))
						<span class="text-danger">{{ $errors->first('address') }}</span>
					@endif
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')