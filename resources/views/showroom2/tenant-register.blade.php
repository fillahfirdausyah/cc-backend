@extends('showroom2.layouts.master')

@section('title', 'Tenant-register')

@section('content')
<div class="container">

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
	@else

	<h4>Anda belum mendaftarkan diri sebagai User Tenant</h4>
	<br>

	<h3>Silahkan Mendaftar Terlebih Dahulu</h3>

	<br>

	<form action="/tenant/register" method="post">
		@csrf
		<input type="hidden" name="user_id" value="{{ $user->id }}">
		<div class="form-group">
			<input type="text" class="form-control" name="nama" placeholder="Nama Tenant">
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-6">
					<input type="email" class="form-control" name="email" placeholder="E-mail Tenant">
				</div>
				<div class="col-6">
					<input type="number" class="form-control" name="telepon" placeholder="No. Telepon Tenant">
				</div>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Daftar">
		</div>
	</form>
	@endif

	<h3>Keuntungan Menjadi User Tenant</h3>
	<br>
	<p>1. Dapat menjual Barang dagangan otomtif</p>
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
@endsection