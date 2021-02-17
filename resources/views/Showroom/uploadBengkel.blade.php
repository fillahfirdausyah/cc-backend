<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
<title>Upload Dagangan</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/UPS.css') }}">
<body>
<header>
	<div class="back">
		<a href="/showroom"><img src="{{ asset('bootstrap-icons/arrow-left.svg')}}" width="60" height="40"></a>
	</div>
	<div class="container mb-3 mt-2">
		<div class="card text-center" style="background-color:#007bff; color: #FAFAFA; ">
			<h5>Upload Sini Gan!</h5>	
		</div>
	</div>
</header>

<main>
<div class="container">
	<div class="card">
		<form method="POST" action="{{'/showroom/upload/bengkel'}}" enctype="multipart/form-data">
			@csrf
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	    	@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			<input type="hidden" name="user_id" value="{{ $user }}">
			<div class="form-row">
				<div class="form-group col-md-4">
	      		<label for="region">Daerah</label>
	      		<select class="form-control dagangan region" name="region_id" >
	      			@foreach($region as $r)
	        		<option value="{{ $r->id }}" selected>{{ $r->region }}</option>
	        		@endforeach
	      		</select>
		      	</div>
		    	<div class="form-group col-md-8">
		      	<label for="nama">Nama</label>
		      	<input type="Text" class="form-control" id="nama" name="nama" placeholder="Nama Bengkel">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="layanan">Layanan</label>
		    	<textarea type="text" rows="10" id="description" class="form-control" id="layanan" name="layanan" placeholder="Deskripsi"></textarea>
		  	</div>
		  	<div class="form-group">
		    	<label for="alamat">Alamat</label>
		    	<textarea type="text" id="description" class="form-control" id="alamat" name="alamat" placeholder="Alamat lengkap"></textarea>
		  	</div>
		  	<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="hari">Hari Buka</label>
			      	<input type="text" class="form-control" id="hari" name="hari" placeholder="Contoh: Senin-Selasa">
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="kontak">Kontak</label>
			      	<input type="text" class="form-control" id="kontak" name="kontak" placeholder="Nomor Telepon">
			    </div>
		    </div>
		  	<div class="form-row">
				<div class="col-md-6">
			    	<label for="jambuka">Jam Buka</label>
		    		<input type="time" class="form-control" id="jambuka" name="waktu_buka">
		    	</div>
		    	<div class="col-md-6">	
			    	<label for="jamtutup">Jam Tutup</label>
			    	<input type="time" class="form-control" id="jamtutup" name="waktu_tutup">
			    </div>	
		  	</div>
		    <div class="form-group">
		    	<label for="gambar">Foto</label>
				<input type="file" class="form-control" id="gambar" name="gambar[]" multiple>
		    </div>
		    <input type="submit" class="btn btn-primary">
		</form>
	</div>
</div>
</main>

<!-- Javascripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>