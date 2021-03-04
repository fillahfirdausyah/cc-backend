@extends('showroom2.layouts.master')

@section('title', 'Merchandise')
    
@section('content')
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Merchandise</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($merchan as $item => $m)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectM[$item]) }}" height="400">
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
            @endforeach
        </div>

        <br>

        <div class="main-button text-center">
            {{ $merchan->links() }}
        </div>
    </div>
</section>
@endsection