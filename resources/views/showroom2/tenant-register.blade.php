@extends('showroom2.layouts.visit')

@section('title', 'Tenant-register')

@section('content')
<div class="container">

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
</div>
@endsection