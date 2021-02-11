<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>Tambah Promo</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/UPS.css') }}">
</head>
<body style="margin-bottom: 10px;">

<header>
	<div class="back" style="margin-left: ">
		<a href="/showroom"><img src="{{ asset('bootstrap-icons/arrow-left.svg')}}" width="60" height="40"></a>
	</div>
</header>
<main>
<section>
<div class="container">
	<div class="card">
		<form method="POST" action="{{ '/showroom/tambahPromo/'.$SR->id }}">
			@csrf
		  	<div class="form-row justify-content-center">
		    	<div class="form-group col-md-6">
		      	<label for="promo">Tambahkan Promo(%)</label>
		      	<input type="Text" class="form-control" id="promo" name="promo" placeholder="Persen">
		    	</div>
				<input type="submit" class="btn btn-primary" value="Tambah">
		  	</div>
		</form>
	</div>
</section>
@if (\Session::has('success'))
	<div class="alert alert-success">
	    <ul>
	        <li>{!! \Session::get('success') !!}</li>
	    </ul>
	</div>
@endif
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/visitSR.js')}}" type="text/javascript"></script>
</body>
</html>

