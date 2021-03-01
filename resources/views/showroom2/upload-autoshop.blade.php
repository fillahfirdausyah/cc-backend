@extends('showroom2.layouts.visit')

@section('title', 'upload-car')

@section('content')

<div class="container">
	<div class="row justify-content-center mb-3">
		<h3>Upload Bengkel</h3>	
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
	        {{ session('success') }}
	    </div>
	@endif
	
	<form action="{{ '/showroom/upload/autoshop' }}" method="post" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="user_id" value="{{ $user }}">
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="nama">Nama (Autoshop)</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="nama bengkel">
				</div>
				<div class="col">
					<label for="daerah">Daerah</label>
					<select class="form-control" id="daerah" name="region_id">
						@foreach($region as $r)
							<option value="{{ $r->id }}">{{ $r->region }}</option>
						@endforeach	
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label for="hari">Hari Kerja</label>
					<input type="text" class="form-control" id="hari" name="hari" placeholder="Contoh: Senin-Sabtu">
				</div>
				<div class="col">
					<label for="wb">Waktu Buka</label>
					<input type="time" class="form-control" id="wb" name="waktu_buka">
				</div>
				<div class="col">
					<label for="wt">Waktu Tutup</label>
					<input type="time" class="form-control" id="wt" name="waktu_tutup">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="layanan">Layanan</label>
			<textarea class="form-control" id="layanan" name="layanan" placeholder="Pisahkan dengan tanda koma(,)"></textarea>
		</div>
		<div class="form-group">
			<label for="alamat">Alamat</label>
			<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"></textarea>
		</div>
	    <div class="form-group">
			<label for="kontak">Kontak Bengkel</label>
			<input type="number" class="form-control" id="kontak" name="kontak" placeholder="Nomor Telepon">
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