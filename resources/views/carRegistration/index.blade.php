@extends('layouts.app')
@section('content')
	<h2 class="display-4">@lang('Car registration')</h2>

	<a href="{{ route('car-registration.create') }}" class="btn btn-success">@lang('Create view')</a>
	<br>
	{{-- <table class="table table-hover">
		<thead class="bg-dark text-white">
			<tr>
				<td>location</td>
			</tr>
		</thead>
		<tbody>
			<a href="{{ route('car-registration.destroy') }}" class="bnt btn-danger" onclick="confirm('Are you sure to delete this?')">Delete</a>

		</tbody>
	</table> --}}
@endsection