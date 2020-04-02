@extends('layouts.app')
@section('content')
	<h2 class="display-4">@lang('Car registration details')</h2>
	<table class="col-md-6 mx-auto table table-striped table-hover my-4  border border-dark">
		<thead class="bg-dark text-white">
			<tr>
				<td>Features</td>
				<td class="text-right">Values</td>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><b>Township</b></td>
					<td class="text-right">{{ $carRegistration->location[0]}}</td>
				</tr>
				<tr>
					<td><b>City</b></td>
					<td class="text-right">{{ $carRegistration['location.1']}}</td>
				</tr>
				<tr>
					<td><b>Address</b></td>
					<td class="text-right">{{ $carRegistration->location[2]}}</td>
				</tr>
				<tr>
					<td><b>Car class</b></td>
					<td class="text-right">{{ $carRegistration->carClass }}</td>
				</tr>
				<tr>
					<td><b>carBrand</b></td>
					<td class="text-right">{{ $carRegistration->carBrand }}</td>
				</tr>
				<tr>
					<td><b>line</b></td>
					<td class="text-right">{{ $carRegistration->line }}</td>
				</tr>
				<tr>
					<td><b>Car model</b></td>
					<td class="text-right">{{ $carRegistration->model }}</td>
				</tr>
				<tr>
					<td><b>Bodywork</b></td>
					<td class="text-right">{{ $carRegistration->bodywork }}</td>
				</tr>
				<tr>
					<td><b>Number of passengers</b></td>
					<td class="text-right">{{ $carRegistration->passengers }}</td>
				</tr>
				<tr>
					<td><b>Action</b></td>
					<td class="text-right">
						<a href="{{ route('car-registration.edit', $carRegistration->id) }}" class="btn btn-warning ">@lang('Edit')</a>
					</td>
				</tr>

		</tbody>
	</table>
	<br>
	<a href="{{ route('car-registration.index') }}" class="btn btn-primary">Back to list</a>
@endsection