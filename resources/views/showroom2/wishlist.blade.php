@extends('showroom2.layouts.master')

@section('title', 'Wishlist')
    
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/vendor/showroom/assets/images/video.mp4') }}" type="video/mp4" />
    </video>

    {{-- <img src="{{ asset('assets/vendor/showroom/assets/images/product-5-720x480.jpg') }}" id="bg-video" alt=""> --}}

    <div class="video-overlay header-text">
        <div class="caption">
            <h2>Wishlist <br>&<br> Bookmarks</h2>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<!-- ***** AutoShops Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Auto shop</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($bengkel as $item => $b)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('image/Tenant/autoshop/'.$collectB[$item]) }}" height="300">
                    </div>
                    <div class="down-content">
                        <span>
                            {{ $b->autoshop->hari }}
                        </span>
                        <a href="{{ '/showroom/autoshop/'.$b->autoshop->id.'-'.$b->autoshop->slug }}"><h4>{{ $b->autoshop->nama }}</h4></a>

                        <p>
                            <i class="fa fa-location-arrow"></i> {{ $b->autoshop->daerah->region }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$b->autoshop->waktu_buka)->format('h:i A')}} -
                            {{\Carbon\Carbon::createFromFormat('H:i:s',$b->autoshop->waktu_tutup)->format('h:i A')}} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
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
</section>
<!-- ***** AutoShops Ends ***** -->

<!-- ***** Cars Start *****-->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Featured <em>Cars</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($SR as $item => $sr)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('image/Tenant/car/'.$collectSR[$item]) }}" height="400">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup>@convert($sr->car->harga)
                        </span>

                        <a href="{{ '/showroom/car/'.$sr->car->id.'-'.$sr->car->slug }}"><h4>{{ $sr->car->judul }}</h4></a>

                        <p>
                            <i class="fa fa-car"></i> {{ $sr->car->kondisi }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> {{ $sr->car->mesin }} cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> {{ $sr->car->transmisi }} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
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
</section>
<!-- ***** Cars End *****-->

<!-- ***** merchandise Start ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Merchandise</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($merchan as $item => $m)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('image/Tenant/merchandise/'.$collectM[$item]) }}" height="400">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup>@convert($m->merchandise->harga)
                        </span>

                        <a href="{{ '/showroom/merchandise/'.$m->merchandise->id.'-'.$m->merchandise->slug }}"><h4>{{ $m->merchandise->nama_produk }}</h4></a>

                        <p>
                            <i class="fa fa-location-arrow"></i> {{ $m->merchandise->region->region }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-flag"></i> {{ $m->merchandise->kategori }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-plus"></i> {{ $m->merchandise->kondisi }} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
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
</section>
<!-- ***** Merchandise End ***** -->
@endsection