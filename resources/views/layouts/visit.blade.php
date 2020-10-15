<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/visitSR.css')}}">
</head>
<body style="margin-bottom: 10px;">

<header>
	<div class="back">
		<a href="/"><img src="{{ asset('bootstrap-icons/arrow-left.svg')}}" width="60" height="40"></a>
	</div>
</header>

<main>
<section>
<div class="container">
	<div class="row">
		<div class="col-8">
			<div class="card">
				<div class="container-fluid" style="background-color: #FAFAFA;">
					<div class="">
						@foreach( $explode as $pict )
						<div class="mySlide sliding">
							<img width="100%" src="{{ asset('public/image/' . $pict) }}" height="350" style="margin-top: 100px;  margin-bottom: 5px;">
						</div>
						@endforeach
					</div>
					<div class="row">
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>
				<div class="card-body">
					<div class="card-title"><h2><strong>{{ $SR->judul }}</strong></h2></div>
					<p class="card-text">Harga <strong>Rp.{{ $SR->harga }}</strong></p>
					<p class="card-text">{{ $SR->deskripsi }}</p>
					<br>
					<p class="card-text"><small>Last Updated {{ $SR->created_at }}</small></p>
					<div class="card-footer">
						<form>
							<div class="form-group">
						    	<label for="comment">Komentar</label>
						    	<textarea class="form-control" id="comment" rows="3"></textarea>
						  	</div>
						  	<div class="form-group">
						  		<input type="submit" class="btn" name="send" value="Kirim">
						  	</div>
						</form>
					</div>
				</div>
			</div>
			<div class="sesi_komentar">Komentar</div>
			<div class="field-comment">
				<div class="card">
					<div class="card-body">
						<div class="card-title"><strong>Nama komentator</strong></div>
						<p>isi komentar</p>
						<button class="btn sm-btn tombol_reply"> Reply </button>
						<div class="reply">
							<form>
								<div class="form-group">
								 <textarea placeholder="Balas..." cols="50" rows="3"></textarea>
								</div>
								<div class="form-group tombol">
								<input type="submit" class="btn sm-btn" name="kirim" value="Kirim">
								<button class="btn sm-btn" onclick="cancel()">Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card profil">
				<img src="" width=" 50" height="50" style="border: 1px solid #0000; border-radius: 50%; margin: auto;">
				<div class="card-body">
					<p>Mahmudi</p><br>
					<p>Tanya Penjual <a href="">penjual</a></p>
				</div>
			</div>
		</div>	
	</div>
</div>
</section>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/visitSR.js')}}" type="text/javascript"></script>
</body>
</html>

