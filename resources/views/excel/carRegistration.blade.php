

<table class="table text-center">
	<thead class="bg-success text-white">
		<tr>
			<td>N°</td>
			<td>Township</td>
			<td>City</td>
			<td>Address</td>
			<td>Car Class</td>
			<td>Car Brand</td>
			<td>Car Line</td>
			<td>Car Model</td>
			<td>Bodywork</td>
			<td>Number of passengers</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($carRegistration as $carRegistrationItem)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $carRegistrationItem->location[0] }}</td>
				<td>{{ $carRegistrationItem->location[1] }}</td>
				<td>{{ $carRegistrationItem->location[2] }}</td>
				<td>{{ $carRegistrationItem->carClass }}</td>
				<td>{{ $carRegistrationItem->carBrand }}</td>
				<td>{{ $carRegistrationItem->line }}</td>
				<td>{{ $carRegistrationItem->model }}</td>
				<td>{{ $carRegistrationItem->bodywork }}</td>
				<td>{{ $carRegistrationItem->passengers }}</td>
			</tr>
		@endforeach
	</tbody>
</table>