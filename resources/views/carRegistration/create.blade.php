@extends('layouts.app')
@section('content')
	<h2 class="display-4 mb-5">@lang('Create car registrations')</h2>
{{-- SESSION MESSAGE --}}
@if ($message = Session::get('message'))
	<div class="alert alert-success alert-dismissible fade show">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<p>{{ $message }}</p>
	</div>
@endif

{{-- END SESSION MESSAGE --}}
{{-- ACORDDION START --}}
	<div class="accordion" id="accordionExample">
		{{-- UPLOAD EXCEL --}}
	  <div class="card">
	    <div class="card-header" id="headingOne">
	      <h2 class="mb-0  text-center">
	        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
	          <b>@lang('Excel import')</b>
	        </button>
	      </h2>
	    </div>

	    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
	      <div class="card-body">
	       	<form action="{{ route('import.car-registration.excel') }}" method="POST" enctype="multipart/form-data">
			@csrf
	       		<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Upload Excel</span>
				  </div>
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" name="excelFileUI" id="excelfile">
				    <label class="custom-file-label" for="excelfile">Choose file</label>
				  </div>
				</div>
	       		<button class="btn btn-success btn-block">Save</button>
	       	</form>
	      </div>
	    </div>
	  </div>
		{{-- END UPLOAD EXCEL --}}
		{{-- UPLOAD JSON --}}
	  <div class="card">
	    <div class="card-header" id="headingTwo">
	      <h2 class="mb-0  text-center">
	        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          <b>@lang('Json import')</b>
	        </button>
	      </h2>
	    </div>
	    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
	      <div class="card-body">
	        <form action="{{ route('import.car-registration.json') }}" method="POST" enctype="multipart/form-data">
	        	@csrf
	        	<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Upload Json</span>
				  </div>
				  <div class="custom-file">
				    <input type="file" name="jsonFile" class="custom-file-input" name="jsonFileUI" id="jsonfile">
				    <label class="custom-file-label"  for="jsonfile">Choose file</label>
				  </div>
				</div>
	       		<button class="btn btn-success btn-block">Save</button>
	       	</form>
	      </div>
	    </div>
	  </div>
	  {{-- END UPLOAD JSON --}}
	  {{--  UPLOAD MANUAL --}}
	  <div class="card">
	    <div class="card-header" id="headingThree">
	      <h2 class="mb-0  text-center">
	        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
	         <b> @lang('Manual import')</b>
	        </button>
	      </h2>
	    </div>
	    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
	      <div class="card-body">
	       <form action="{{ route('car-registration.store') }}" method="POST">
	       	@csrf
	       		{{-- TOWSHIPS --}}
				<label for="township">Townships</label>
				<input type="text" name="townshipsUI" id="township" class="form-control" value="{{ old('townshipsUI') }}" required>
				{{-- END TOWSHIPS --}}
				{{-- CITIES --}}
				<label for="cities">Cities</label>
				<input type="text" name="citiesUI" id="cities" class="form-control" value="{{ old('citiesUI') }}" required>
				{{-- END CITIES --}}
				{{-- ADDRESS --}}
				<label for="address">Address</label>
				<input type="text" name="addressUI" id="address" class="form-control" value="{{ old('addressUI') }}" required>
				{{-- END ADDRESS --}}
				<label for="carclass">Car class</label>
				<input type="text" name="carClassUI" class="form-control" required id="carclass" value="{{ old('carClassUI') }}">
				<br>
				<label for="brand">Car brand</label>
				<input type="text" name="brandUI" class="form-control" required id="brand" value="{{ old('brandUI') }}">
				<br>
				<label for="line">Line</label>
				<input type="text" name="lineUI" class="form-control" required id="line" value="{{ old('lineUI') }}">
				<br>
				<label for="model">Model</label>
				<input type="text" name="modelUI" class="form-control" required id="model" value="{{ old('modelUI') }}">
				<br>
				<label for="bodywork">Bodywork</label>
				<input type="text" name="bodyworkUI" class="form-control" required id="bodywork" value="{{ old('bodyworkUI') }}">
				<br>
				<label for="passengers">Number of passengers</label>
				<input type="number" name="passengersUI" class="form-control" required id="passengers" value="{{ old('passengersUI') }}">
				<br>
				<button class="btn btn-success btn-block">Save</button>
			</form>
	      </div>
	    </div>
	  </div>
	  {{-- END UPLOAD MANUAL --}}
	</div>
{{-- ACORDDION  ENDS --}}


@endsection