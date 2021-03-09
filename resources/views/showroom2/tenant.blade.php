@extends('showroom2.layouts.master')

@section('title', 'Tenant-Dashboard')

@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/vendor/showroom/assets/images/video.mp4') }}" type="video/mp4" />
    </video>

    {{-- <img src="{{ asset('assets/vendor/showroom/assets/images/product-5-720x480.jpg') }}" id="bg-video" alt=""> --}}

    <div class="video-overlay header-text">
        <div class="caption">
            <h2><em>Tenant</em> <br> Panel</h2>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<div class="row container-fluid">
	<div class="col-2 fixed">
		<h2><p class="d-block text-center">{{ $tenant->nama }}</p></h2>
		<h2><p class="d-block text-center">{{ $tenant->email }}</p></h2>
		<h2><p class="d-block text-center">{{ $tenant->telepon }}</p></h2>
		<a href="{{ '/tenant/edit/'.$tenant->id }}" class="btn d-block btn-success">Edit</a>
		<hr>
		<a href="#autoshop" class="d-block btn"><span>Autoshops</span></a>
		<a href="#cars" class="d-block btn"><span>Cars</span></a>
		<a href="#merchandise" class="d-block btn"><span>Merchandise</span></a>
	</div>
	<div class="col-9">

		<!-- Total Upload -->
		<div class="row text-center mb-3">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Auto shop</h5>
					    <p class="card-text"><h3>{{ count($bengkel) }}</h3></p>
					</div>
                    <div class="main-button">
                        <a href="/showroom/upload/autoshop" class="card-link">Add Auto shop</a>
                    </div>
					<!-- <a href="">Edit Autoshop</a> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Merchandise Total</h5>
					    <p class="card-text"><h3>{{ count($merchan) }}</h3></p>
					</div>
                    <div class="main-button">
						<a href="/showroom/upload/merchandise" class="card-link">Add Merchandise</a>
                    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Cars Total</h5>
					    <p class="card-text"><h3>{{ count($SR) }}</h3></p>
					</div>
                    <div class="main-button">
						<a href="/showroom/upload/car" class="card-link">Sell Cars</a>
                    </div>
				</div>
			</div>
		</div>
		<!-- End Total Upload-->
			<hr>
		<!-- cars -->
		<div id="cars">
			<div class="text-center"><h4>Cars</h4></div>
			<div class="row">
				@forelse($SR as $item => $sr)
	            <div class="col-md-4">
	                <div class="trainer-item">
	                    <div class="image-thumb">
	                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectSR[$item]) }}" height="300" width="100%">
	                    </div>
	                    <div class="down-content">
	                        <span>
	                            <sup>Rp</sup> @convert($sr->harga) 
	                        </span>

	                        <a href="{{ '/showroom/car/'.$sr->id.'-'.$sr->slug }}"><h4>{{ $sr->judul }}</h4></a>

	                        <p>
	                        	@if($sr->verified == NULL)
	                        		<p>Menunggu verifikasi admin</p>
	                        	@endif
	                            <i class="fa fa-car"></i> {{ $sr->kondisi }} &nbsp;&nbsp;&nbsp;
	                            <i class="fa fa-cube"></i> {{ $sr->mesin }} cc &nbsp;&nbsp;&nbsp;
	                            <i class="fa fa-cog"></i> {{ $sr->transmisi }} &nbsp;&nbsp;&nbsp;
	                        </p>
	                    </div>
	                </div>
	            </div>
	            @empty
	            <div class="container">
	                <div class="row justify-content-md-center">
	                    <div class="col-md-6 align-self-center">
	                        <h3><i class="fa fa-dropbox fa-5x" aria-hidden="true"></i><em> Waduh Kosong Nih </em></h3>
	                    </div>
	                </div>
	            </div>
	            @endforelse
			</div>
		</div>
		<!-- end cars -->
		<hr>
		<!-- Autoshop -->
		<div id="autoshop">
			<div class="text-center"><h4>Auto shop</h4></div>
			<div class="row">
			@forelse($bengkel as $item => $b)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectB[$item]) }}" height="300" width="100%">
                    </div>
                    <div class="down-content">
                        <span>
                            {{ $b->hari }}
                        </span>
                        <a href="{{ '/showroom/autoshop/'.$b->id.'-'.$b->slug }}"><h4>{{ $b->nama }}</h4></a>

                        <p>
                            <i class="fa fa-location-arrow"></i> {{ $b->daerah->region }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$b->waktu_buka)->format('h:i A')}} -
                            {{\Carbon\Carbon::createFromFormat('H:i:s',$b->waktu_tutup)->format('h:i A')}} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 align-self-center">
                        <h3><i class="fa fa-dropbox fa-5x" aria-hidden="true"></i><em> Waduh Kosong Nih </em></h3>
                    </div>
                </div>
            </div>
            @endforelse
			</div>
		</div>
		<!-- end autoshop -->
		<hr>
		<!-- merchandise -->
		<div id="merchandise">
			<div class="text-center"><h4>Merchandise</h4></div>
			<div class="row">
				@forelse($merchan as $item => $m)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectM[$item]) }}" height="300" width="100%">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup>@convert($m->harga)
                        </span>

                        <a href="{{ '/showroom/merchandise/'.$m->id.'-'.$m->slug }}"><h4>{{ $m->nama_produk }}</h4></a>

                        <p>
                        	<i class="fa fa-location-arrow"></i> {{ $m->region->region }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-flag"></i> {{ $m->kategori }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-plus"></i> {{ $m->kondisi }} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 align-self-center">
                        <h3><i class="fa fa-dropbox fa-5x" aria-hidden="true"></i><em> Waduh Kosong Nih </em></h3>
                    </div>
                </div>
            </div>
            @endforelse
			</div>
		</div>
		<!-- end merchandise -->

	</div>
</div>
@endsection