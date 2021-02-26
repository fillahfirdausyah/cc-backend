@extends('showroom2.layouts.visit')

@section('title', 'Tenant-Dashboard')

@section('content')
<div class="row ">
	<div class="col-2 sticky">
		<a href="#autoShops" class="d-block btn">Autoshops</a>
		<a href="#cars" class="d-block btn">Cars</a>
		<a href="#merchandise" class="d-block btn">Merchandise</a>
	</div>
	<div class="col-9">

		<!-- Total Upload -->
		<div class="row text-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Autoshop Review</h5>
					    <p class="card-text"><h3>8</h3></p>
					</div>
					<a href="/showroom/upload/car" class="card-link">Add Autoshop</a>
					<!-- <a href="">Edit Autoshop</a> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Merchandise Total</h5>
					    <p class="card-text"><h3>6</h3></p>
					</div>
					<a href="#" class="card-link">Add Merchandise</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Cars Total</h5>
					    <p class="card-text"><h3>6</h3></p>
					</div>
					<a href="/showroom/upload/car" class="card-link">Add Cars</a>
				</div>
			</div>
		</div>
		<!-- End Total Upload-->

		<div class="autoShop">
			
		</div>

	</div>
</div>
@endsection