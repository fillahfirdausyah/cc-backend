@extends('showroom2.layouts.master')

@section('title', 'upload-merchandise')

@section('content')

<div class="container">
	<div class="row justify-content-center mb-3">
		<h3>Upload Merchandise</h3>	
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
	
	<form action="/showroom/upload/merchandise" method="post" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="user_id" value="{{ $user }}">
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" name="np" placeholder="Nama Produk">
				</div>
				<div class="col">
					<input type="number" class="form-control" name="harga" placeholder="Harga">
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
					<label for="region">Daerah</label>
					<select class="form-control" name="region_id">
						@foreach($region as $r)
							<option value="{{ $r->id }}">{{ $r->region }}</option>
						@endforeach
					</select>
				</div>
				<div class="col">
					<label for="stok">Stok</label>
					<input type="number" class="form-control" id="stok" name="stok">
				</div>
				<div class="col">
					<label for="kategori">Kategori</label>
					<input type="text" class="form-control" id="kategori" name="kategori">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
		</div>
	    <div class="form-group">
	    	<div class="custom-file">
			  <input type="file" class="custom-file-input" id="customFile" name="gambar[]" multiple>
			  <label class="custom-file-label" for="customFile">Pilih Gambar</label>
			</div>
	    </div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Tambah">
		</div>

	</form>
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
</div>

@endsection