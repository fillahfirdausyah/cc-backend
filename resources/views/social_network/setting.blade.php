@extends('layouts.SNapp')

@section('title', 'Set Profile')

@section('header')
	<h1>SETTINGS</h1>
@stop

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">	
				<form>
					<div class="form-group">
						<div class="form-group nama">
							<label for="nama">Nama</label>
							<input type="text" id="nama" class="form-control" name="nama">
						</div>
						<div class="form-group">
							<label for="nama">Deskripsi</label>
							<textarea id="description" class="form-control" placeholder="Ceritain dikit dong, tentang Agan..."></textarea>
						</div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFile03" name="foto">
						  	<label class="custom-file-label" for="inputGroupFile03">Pilih Foto</label>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Ubah" class="btn btn-primary mt-3">							
						</div>
					</div>
				</form>
				<a href="/user/profile/"><button class="btn btn-primary">Batal</button></a>
			</div>
		</div>
	</div>	
</div>
@stop
