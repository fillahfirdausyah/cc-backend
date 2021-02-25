<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
<title>Edit Dagangan</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/UPS.css') }}">
<body>
<header>
	<div class="back">
		<a href="/showroom"><img src="{{ asset('bootstrap-icons/arrow-left.svg')}}" width="60" height="40"></a>
	</div>
	<div class="container mb-3 mt-2">
		<div class="card text-center" style="background-color:#007bff; color: #FAFAFA; ">
			<h5>Edit</h5>	
		</div>
	</div>
</header>

<main>
<div class="container">
	<div class="card">
		<form method="post" action="{{'/showroom/edit/proccess/'.$SR->id}}" enctype="multipart/form-data">
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
			<input type="hidden" name="user_id" value="{{ $user->id }}">
			<div class="form-row">
				<div class="form-group col-md-2">
	      		<label for="dagangan">Upload Apa nih?</label>
	      		<select id="dagangan" class="form-control dagangan" name="kategori" >
	        		<option value="mobil" selected>Mobil</option>
	        		<option value="spare parts">Spare Parts</option>
	      		</select>
		      	</div>
		     </div>
		  	<div class="form-row">
		    	<div class="form-group col-md-6">
		      	<label for="title">Judul</label>
		      	<input type="Text" class="form-control" id="title" name="judul" placeholder="judul" value="{{ old('title') }}">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="deskripsi">Deskripsi</label>
		    	<textarea type="text" id="description" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
		  	</div>
		  	<div class="form-row">
			    <div class="form-group">
		      	<label for="price">Harga</label>
		      	<input type="text" class="form-control" id="price" name="harga" placeholder="Rupiah" value="{{ old('price') }}">
			    </div>
		    </div>
		    <div class="form-group">
		    	<label for="image">Gambar</label>
				<input type="file" class="form-control" id="image" name="gambar[]" value="{{ old('image') }}" multiple>
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