
<!DOCTYPE html>
<html>
<head>
	<title>Car registration Export</title>
	    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style type="text/css">
		table{
			font-size: 10px;
		}
	</style>
</head>
<body>
	<table class="table table-hover table-striped my-4 table-stripped table-responsive-xs text-center">
		<thead class="bg-primary text-white">
			<tr>
				<td>N°</td>
				<td>Township</td>
				<td>City</td>
				<td>Address</td>
				<td>Car class</td>
				<td>Brand</td>
				<td>Line</td>
				<td>Model</td>
				<td>Bodywork</td>
				<td>N° passengers</td>
			</tr>
		</thead>
		<tbody>
			@forelse ($CarRegistration as $itemRegistration)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $itemRegistration->location[0] }}</td>
					<td>{{ $itemRegistration->location[1] }}</td>
					<td>{{ $itemRegistration->location[2] }}</td>
					<td>{{ $itemRegistration->carClass }}</td>
					<td>{{ $itemRegistration->carBrand }}</td>
					<td>{{ $itemRegistration->line }}</td>
					<td>{{ $itemRegistration->model }}</td>
					<td>{{ $itemRegistration->bodywork }}</td>
					<td>{{ $itemRegistration->passengers }}</td>
				</tr>
			@empty
				<td colspan="7">Empty</td>
			@endforelse

		</tbody>
	</table>
</body>
</html>