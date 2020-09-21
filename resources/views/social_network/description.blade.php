@extends('layouts.SNapp')

@section('title', 'Profile')

@section('header')
	<div class="col text-center">
		<h1>Profile</h1>
	</div>
@stop

@section('content')
<div class="card mb-3">
	<div class="row text-center">
		<div class="col">
			<img src="" width="300px" height="300px">
		</div>
		<div class="w-100"></div>
		<div class="col mb-2">
			<!-- Nama -->
			<span><strong> Nama </strong></span>
			<div class="w-100"></div>
			<!-- Pekerjaan -->
			<strong>Pernah Bekerja di PT. Mencari Cinta sejati</strong>
		</div>
		<div class="w-100"></div>
		<div class="col">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>
</div>

<div class="card bg-light rounded text-center mb-3">
	<h2>Post</h2>	
</div>

<div class="row">
	<div class="col-md-3">
		<img src="#" class="rounded img-thumbnail" alt="#">
	</div>
	<div class="col-md-9">
		<div class="card" style="width: 90%;">
		  	<div class="card-body">
		    	<h5 class="card-title">Judul Post</h5>
		    	<p class="card-text">Fillah Bokepers</p>
		    	<form class="form-inline">
		    		<textarea class="form-control" rows="3" cols="60" placeholder="Sabda Netizennya bang..."></textarea>
		    		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
		    	</form>
		  	</div>
		</div>
	</div>	
</div>
@stop
