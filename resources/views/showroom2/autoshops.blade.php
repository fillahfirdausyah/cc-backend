@extends('showroom2.layouts.master')

@section('title', 'Autoshops')
    
@section('content')
<!-- ***** AutoShops Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>AutoShops</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($bengkel as $item => $b)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectB[$item]) }}" height="300">
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
            @endforeach
        </div>
    </div>
</section>
<!-- ***** AutoShops Ends ***** -->
@endsection