@extends('showroom2.layouts.visit')

@section('title', 'upload-car')

@section('content')

<div class="container">
	<div class="row justify-content-center mb-3">
		<h3>Upload Mobil</h3>	
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
	
	<form action="/showroom/upload/car" method="post" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="stok" value="Tersedia">
		<input type="hidden" name="user_id" value="{{ $user->id }}">
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<input type="text" class="form-control" name="judul" placeholder="Nama Produk">
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
					<label for="mesin">Mesin</label>
					<input type="number" class="form-control" id="mesin" name="mesin" placeholder="cc">
				</div>
				<div class="col">
					<label for="tahun">Tahun</label>
					<input type="number" class="form-control" id="tahun" name="tahun">
				</div>
				<div class="col">
					<label for="jenis">Jenis</label>
					<input type="string" class="form-control" id="jenis" name="jenis">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="bb">Bahan Bakar</label>
					<input type="string" class="form-control" id="bb" name="bahan_bakar">
				</div>
				<div class="col">
					<label for="tenaga">Tenaga</label>
					<input type="number" class="form-control" id="tenaga" name="tenaga" placeholder="Horse Power(hp)">
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
					<input type="string" class="form-control" id="warna" name="warna">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
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
			<input type="submit" class="btn btn-primary" value="Tambah">
		</div>

	</form>
</div>

@endsection