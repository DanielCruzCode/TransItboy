@extends('layouts.app')
@section('content')
	<h2 class="display-4 mb-5">@lang('Edit registrations')</h2>
{{-- SESSION MESSAGE --}}
@if ($message = Session::get('message'))
	<div class="alert alert-success alert-dismissible fade show">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<p>{{ $message }}</p>
	</div>
@endif

{{-- END SESSION MESSAGE --}}
<div class="container text-center">
  {{--  UPLOAD MANUAL --}}
  	@forelse ($errors->all() as $error)
  		<div class="alert alert-danger" role="alert">
  			{{ $error }}
  		</div>
  	@empty
  	@endforelse
  <div class="card col-md-7 mx-auto">
      <div class="card-body ">
       <form action="{{ route('car-registration.update', $carRegistration->id) }}" method="POST">
       	@method('PUT')
       	@csrf
       		{{-- TOWSHIPS --}}
			<label for="township">Townships</label>
			<input type="text" name="townships" id="township" class="form-control" value="{{ $carRegistration->location[0] }}" required>
			{{-- END TOWSHIPS --}}
			{{-- CITIES --}}
			<label for="cities">Cities</label>
			<input type="text" name="cities" id="cities" class="form-control" value="{{ $carRegistration->location[1] }}" required>
			{{-- END CITIES --}}
			{{-- ADDRESS --}}
			<label for="address">Address</label>
			<input type="text" name="address" id="address" class="form-control" value="{{ $carRegistration->location[2] }}" required>
			{{-- END ADDRESS --}}
			<label for="carclass">Car class</label>
			<input type="text" name="carClass" class="form-control" required id="carclass" value="{{ $carRegistration->carClass }}">
			<br>
			<label for="brand">Car brand</label>
			<input type="text" name="carBrand" class="form-control" required id="brand" value="{{ $carRegistration->carBrand }}">
			<br>
			<label for="line">Line</label>
			<input type="text" name="line" class="form-control" required id="line" value="{{ $carRegistration->line }}">
			<br>
			<label for="model">Model</label>
			<input type="text" name="model" class="form-control" required id="model" value="{{ $carRegistration->model }}">
			<br>
			<label for="bodywork">Bodywork</label>
			<input type="text" name="bodywork" class="form-control" required id="bodywork" value="{{ $carRegistration->bodywork }}">
			<br>
			<label for="passengers">Number of passengers</label>
			<input type="number" name="passengers" class="form-control" required id="passengers" value="{{ $carRegistration->passengers }}">
			<br>
			<button class="btn btn-success btn-block">Update</button>
		</form>
      </div>
    </div>
  {{-- END UPLOAD MANUAL --}}
</div>
	<br>
	<a href="{{ route('car-registration.index') }}" class="btn btn-primary">Back to list</a>

@endsection