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
                    <h2><em style="color: #F00202;">Edit Profil Tenant</em></h2>
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
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif


	<br>

	<form id="form" action="/tenant/edit" method="post">
		@csrf
		<input type="hidden" name="user_id" value="{{ $user->id }}">
		<input type="hidden" name="id" value="{{ $tenant->id }}">
		<input type="hidden" name="nama" value="{{ $user->name }}">
		<div class="form-group">
			<input type="text" class="form-control" value="{{ $user->name }}" disabled>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-6">
					<input type="email" class="form-control" name="email" value="{{ $tenant->email }}" placeholder="E-mail Tenant">
				</div>
				<div class="col-6">
					<input type="number" class="form-control" name="telepon" value="{{ $tenant->telepon }}" placeholder="No. Telepon Tenant">
				</div>
			</div>
		</div>
		<div class="form-group">
		</div>
	</form>
	<button form="form" type="submit" class="btn btn-success">Edit</button>
	<a href="/tenant"><button class="btn btn-primary">Kembali</button></a>
</div>
@endsection