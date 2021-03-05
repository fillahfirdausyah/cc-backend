@extends('showroom2.layouts.master')

@section('title', 'Autoshops')
    
@section('content')
<!-- ***** AutoShops Starts ***** -->
<section class="section" id="trainers">
        <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url('{{asset('assets/img/autoshop.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>Auto shops</em></h2>
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
                    <h2><em>Auto Shops</em></h2>
                    <img src="{{ asset('assets/vendor/showroom/assets/images/line-dec.png') }}" alt="">
                    <form>
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