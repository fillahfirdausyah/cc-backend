@extends('showroom2.layouts.master')

@section('title', 'Cars')
    
@section('content')
<section class="section" id="trainers">
        <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url('{{asset('assets/img/banner-image-1-1920x500.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>Cars</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Featured <em>Cars</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                    <form action="/showroom/search/car" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row justify-content-center">
                                <div class="col-6">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($SR as $item => $sr)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('image/Tenant/car/'.$collectCar[$item]) }}" height="400">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup>@convert($sr->harga)
                        </span>

                        <a href="{{ '/showroom/car/'.$sr->id.'-'.$sr->slug }}"><h4>{{ $sr->nama_produk }}</h4></a>

                        <p>
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

        <br>

        <div class="main-button text-center">
            {{ $SR->links() }}
        </div>
    </div>
</section>
@endsection