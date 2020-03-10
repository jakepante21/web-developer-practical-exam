@extends("layout.app")

@section("content")
	<section>
		<h1>New Paint Job</h1>
		<div class="before-car">
			<img src="./../images/Default Car.png" id="current-car">
			<img src="./../images/Shape 1.png" class="arrow">
			<img src="./../images/Default Car.png" id="target-car">
		</div>
		<div class="car-details">
			<h2>Car Details</h2>
			<form action="{{route("paintjobs.store")}}" method="post">
				@csrf
				<div class="form-group">
					<label>Plate No.:</label>
					<input type="text" name="plate-number" id="plate-number">
				</div>
				<div class="form-group">
					<label>Current Color</label>
					<select class="first-select" name="current-color" id="current-color">
						<option selected disabled>Select Color</option>
						<option value="Red" >Red</option>
						<option value="Green" >Green</option>
						<option value="Blue" >Blue</option>
					</select>
				</div>
				<div class="form-group">
					<label>Target Color</label>
					<select class="second-select" name="target-color" id="target-color">
						<option selected disabled>Select Color</option>
						<option value="Red">Red</option>
						<option value="Green">Green</option>
						<option value="Blue">Blue</option>
					</select>
				</div>
				<input type="submit" name="submit">
			</form>
		</div>
	</section>
@endsection