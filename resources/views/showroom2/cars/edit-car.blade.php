@extends('showroom2.layouts.master')

@section('title', 'Edit-Car')

@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url('{{asset('assets/img/banner-image-1-1920x500.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>Cars</em></h2>
                    <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->
<div class="container">
	<div class="row justify-content-center mb-3">
		<h3>Edit Mobil</h3>	
	</div>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	
	<form action="/showroom/car/edit" method="post" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="id" value="{{ $SR->id }}">
		<input type="hidden" name="stok" value="Tersedia">
		<input type="hidden" name="user_id" value="{{ $user->id }}">
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="{{ $SR->judul }}">
				</div>
				<div class="col">
					<input type="number" class="form-control" name="harga" placeholder="Harga" value="{{ $SR->harga }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="kondisi">Kondisi</label>
					<select class="form-control" id="kondisi" name="kondisi">
						<option>Baru</option>
						<option>Bekas</option>
					</select>
				</div>
				<div class="col">
					<label for="mesin">Mesin</label>
					<input type="number" class="form-control" id="mesin" name="mesin" placeholder="cc" value="{{ $SR->mesin }}">
				</div>
				<div class="col">
					<label for="tahun">Tahun</label>
					<input type="number" class="form-control" id="tahun" name="tahun" value="{{ $SR->tahun }}">
				</div>
				<div class="col">
					<label for="jenis">Jenis</label>
					<input type="string" class="form-control" id="jenis" name="jenis" value="{{ $SR->jenis }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="bb">Bahan Bakar</label>
					<input type="string" class="form-control" id="bb" name="bahan_bakar" value="{{ $SR->bahan_bakar }}">
				</div>
				<div class="col">
					<label for="tenaga">Tenaga</label>
					<input type="number" class="form-control" id="tenaga" name="tenaga" placeholder="Horse Power(hp)" value="{{ $SR->tenaga }}">
				</div>
				<div class="col">
					<label for="transmisi">Transmisi</label>
					<select class="form-control" id="transmisi" name="transmisi">
						<option>Manual</option>
						<option>Otomatis</option>
					</select>
				</div>
				<div class="col">
					<label for="warna">Warna</label>
					<input type="string" class="form-control" id="warna" name="warna" value="{{ $SR->warna }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi">{{ $SR->deskripsi }}</textarea>
		</div>
		<div class="form-group">
			<label for="fitur">Fitur Tambahan(Optional)</label>
			<textarea class="form-control" id="fitur" name="fitur" placeholder="Pisahkan dengan tanda koma(,)"></textarea>
		</div>
	    <div class="form-group">
	    	<div class="custom-file">
			  <input type="file" class="custom-file-input" id="customFile" name="gambar[]" multiple>
			  <label class="custom-file-label" for="customFile">Pilih Gambar</label>
			</div>
	    </div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Ubah">
		</div>

	</form>
</div>
<br>
<div class="row">
		<h3>Syarat & Ketentuan Berjualan di Showroom CC</h3>
		<br>
		<br>
		<p>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<br>
		<p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<br>
		<p>3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</div>@endsection