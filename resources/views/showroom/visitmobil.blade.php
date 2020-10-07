@extends('layouts/visit')

@section('title','mobil')

@section('content')
<div class="container-fluid" style="background-color: #FAFAFA;">
	<div class="">
		<div class="mySlide sliding">
			<img width="100%" src="{{ asset('image/1.jpg') }}" height="350" style="margin-top: 100px;  margin-bottom: 5px;">
		</div>
		<div class="mySlide sliding">
			<img width="100%" src="{{ asset('image/2.jpg') }}" height="350" style="margin-top: 110px;  margin-bottom: 5px;">
		</div>
		<div class="mySlide sliding">
			<img width="100%" src="{{ asset('image/3.jpg') }}" height="350" style="margin-top: 110px;  margin-bottom: 5px;">
		</div>
	</div>
	<div class="row">
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
</div>
<div class="card-body">
	<div class="card-title"><h2><strong>Nama Barang</strong></h2></div>
	<p class="card-text">Harga <strong>Rp.10000</strong></p>
	<p class="card-text">Deskripsi Barang</p>
	<br>
	<p class="card-text"><small>Last Updated 3 hours ago</small></p>
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
@endsection