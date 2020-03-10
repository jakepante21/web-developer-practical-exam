@extends("layout.app")

@section("content")
	<section>
		<h1>Paint Jobs</h1>
		<h4>Paint Jobs in Progress</h4>
		<div class="row">
			<table id='paintJobTable'>
				<thead>
					<tr class="first-row">
						<td class="first-col">Plate No.</td>
						<td class="second-col">Current Color</td>
						<td class="second-col">Target Color</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<table id="shopTable" class="shop-performance-table">
				<thead>
					<tr class="shop-row">
						<td colspan="2">Shop Performance</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total Cars Painted:</td>
						<td class="col-padding" id="total"></td>
					</tr>
					<tr>
						<td colspan="2">Breakdown:</td>
					</tr>
					<tr>
						<td class="col-align">Blue</td>
						<td class="col-padding" id="blue"></td>
					</tr>
					<tr>
						<td class="col-align">Red</td>
						<td class="col-padding" id="red"></td>
					</tr>
					<tr>
						<td class="col-align">Green</td>
						<td class="col-padding" id="green"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<h4>Paint Queue</h4>
		<table id='paintQueueTable'>
			<thead>
				<tr class="second-row">
					<td>Plate No.</td>
					<td>Current Color</td>
					<td class="last-col">Target Color</td>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</section>
@endsection

