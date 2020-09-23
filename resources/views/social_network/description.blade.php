@extends('layouts.SNapp')

@section('title', 'Profile')

@section('header')
	<h1>Profile</h1>
@stop

@section('content')
<div class="app">
	<div class="card mb-3">
		<div class="row text-center mt-3">
			<div class="col">
				<img src="https://img2.pngdownload.id/20180531/wxl/kisspng-avatar-computer-icons-logo-photographer-5b102d1e728c13.7251972015277867824692.jpg" height="300px" alt="avatar" style="border-radius: 50%; border: 2px solid #020F0F;">
			</div>
			<div class="w-100"></div>
			<div class="col mb-2">
				<!-- Nama -->
				<span style="font-size: 25px; font-weight: 500;">Nama</span>
				<div class="w-100"></div>
			</div>
			<div class="w-100"></div>
			<div class="col">
				<div class="card text-justify" style="padding: 5px; margin-right: 3px; margin-left: 3px;">
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
				<a href="/user/profile/settings" style="color: #FFFFFF; text-decoration: none;"><button class="btn btn-success mb-2 btn-sm">Edit Profile</button></a>
			</div>
		</div>
	</div>
</div>

<div class="card rounded text-center mb-3" style="background-color: #CFE8E8;">
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
		    	<p class="card-text">Semuanya tentang lorem ipsum</p>
		    	<form class="form-inline">
		    		<textarea class="form-control" rows="2" cols="50" placeholder="Sabda Netizennya bang..."></textarea>
		    		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
		    	</form>
		  	</div>
		</div>
	</div>	
</div>
@stop
