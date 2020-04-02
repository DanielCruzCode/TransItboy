@extends('layouts.app')
@section('content')
	<h2 class="display-4">@lang('Car registration')</h2>

	{{-- CAR REGISTRATIONS ACTIONS --}}
	<div class="btn-group">
	<a href="{{ route('export.car-registration.pdf') }}" class="btn btn-danger">@lang('Pdf download car registrations')</a>
	<a href="{{ route('car-registration.create') }}" class="btn btn-primary">@lang('Create car registrations')</a>
	<a href="{{ route('export.car-registration.excel') }}" class="btn btn-success">@lang('Excel download car registrations')</a>
	</div>
	{{-- END CAR REGISTRATIONS ACTIONS --}}
	<table class="table border border-primary table-hover my-4 ">
		<thead class="bg-primary text-white">
			<tr>
				<td>Township</td>
				<td >City</td>
				<td>Car brand</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			@forelse ($registrations as $itemRegistration)
				<tr>
					<td>{{ $itemRegistration->location[0] }}</td>
					<td >{{ $itemRegistration->location[1] }}</td>
					<td>{{ $itemRegistration->carBrand }}</td>
					<td>
						 <form action="{{ route('car-registration.destroy',$itemRegistration->id) }}" method="POST">
	                        <div class="btn btn-group-vertical btn-md-group">
	                        	<a class="btn btn-outline-info" href="{{ route('car-registration.show',$itemRegistration->id) }}">Details</a>
		                        <a class="btn btn-outline-primary" href="{{ route('car-registration.edit',$itemRegistration->id) }}">Edit</a>
		                        @csrf
		                        @method('DELETE')
		                        <button {{-- onclick="confirm('Are you sure to delete this?')" --}} type="submit" class="btn btn-outline-danger">Delete</button>
	                        </div>

	                    </form>
					</td>
				</tr>
			@empty
				<td>Empty</td>
				<td>Empty</td>
				<td>Empty</td>
				<td>Empty</td>
			@endforelse

		</tbody>
	</table>
	<br>
	<a href="{{ route('home.index') }}" class="btn btn-primary">Back to home</a>
@endsection