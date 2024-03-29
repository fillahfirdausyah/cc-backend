@extends('showroom2.layouts.master')

@section('title', 'Tenant-Edit')

@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em style="color: #F00202;">Edit Profile Tenant</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->
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


	<br>

	<form action="/tenant/edit" method="post">
		@csrf
		<input type="hidden" name="user_id" value="{{ $user->id }}">
		<input type="hidden" name="nama" value="{{ $user->name }}">
		<div class="form-group">
			<input type="text" class="form-control" value="{{ $user->name }}" disabled>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-6">
					<label>Nomor Rekening</label>
					<input type="number" class="form-control" name="rekening" value="{{ $tenant->rekening }}">
				</div>
				<div class="col-3">
					<label>Atas Nama</label>
					<input type="text" class="form-control" name="pemilik" value="{{ $tenant->pemilik_rekening}}">
				</div>
				<div class="col-3">
					<label>Bank</label>
					<input type="text" class="form-control" name="bank" value="{{ $tenant->bank }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-6">
					<input type="email" class="form-control" name="email" placeholder="E-mail Tenant" value="{{ $tenant->email }}">
				</div>
				<div class="col-6">
					<input type="number" class="form-control" name="telepon" placeholder="No. Telepon Tenant" value="{{ $tenant->telepon }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Ubah">
		</div>
	</form>

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