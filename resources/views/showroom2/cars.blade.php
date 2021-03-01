@extends('showroom2.layouts.visit')

@section('title', 'Cars')
    
@section('content')
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Featured <em>Cars</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($SR as $item => $sr)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectCar[$item]) }}" height="400">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup>@convert($sr->harga)
                        </span>

                        <a href="{{ '/showroom/car/'.$sr->id.'-'.$sr->slug }}"><h4>{{ $sr->judul }}</h4></a>

                        <p>
                        	<i class="fa fa-car"></i> {{ $sr->kondisi }} &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> {{ $sr->mesin }} cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> {{ $sr->transmisi }} &nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <br>

        <div class="main-button text-center">
            {{ $SR->links() }}
        </div>
    </div>
</section>
@endsection