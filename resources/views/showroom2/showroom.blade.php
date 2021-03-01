@extends('showroom2.layouts.master')

@section('title', 'Showroom CC')

@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/vendor/showroom/assets/images/video.mp4') }}" type="video/mp4" />
    </video>

    {{-- <img src="{{ asset('assets/vendor/showroom/assets/images/product-5-720x480.jpg') }}" id="bg-video" alt=""> --}}

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Cari Mobil Disini</h6>
            <h2>Showroom</h2>
            <div class="main-button">
                <a href="contact.html">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Cars Starts ***** -->
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
                        <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectSR[$item]) }}" height="400">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>Rp</sup> @convert($sr->harga) 
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
            <a href="/showroom/more/car">View Cars</a>
        </div>
    </div>
</section>
<!-- ***** Cars Ends ***** -->

<section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Read <em>About Us</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-content text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore deleniti voluptas enim! Provident consectetur id earum ducimus facilis, aspernatur hic, alias, harum rerum velit voluptas, voluptate enim! Eos, sunt, quidem.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nulla quo cum officia laboriosam. Amet tempore, aliquid quia eius commodi, doloremque omnis delectus laudantium dolor reiciendis non nulla! Doloremque maxime quo eum in culpa mollitia similique eius doloribus voluptatem facilis! Voluptatibus, eligendi, illum. Distinctio, non!</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/vendor/showroom/assets/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <h2>Send us a <em>message</em></h2>
                    <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                    <div class="main-button">
                        <a href="contact.html">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Testimonials Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Read our <em>Testimonials</em></h2>
                    <img src="assets/images/line-dec.png" alt="waves">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem incidunt alias minima tenetur nemo necessitatibus?</p>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{ asset('assets/vendor/showroom/assets/images/features-first-icon.png') }}" alt="First One">
                        </div>
                        <div class="right-content">
                            <h4>John Doe</h4>
                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{ asset('assets/vendor/showroom/assets/images/features-first-icon.png') }}" alt="second one">
                        </div>
                        <div class="right-content">
                            <h4>John Doe</h4>
                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{ asset('assets/vendor/showroom/assets/images/features-first-icon.png') }}" alt="fourth muscle">
                        </div>
                        <div class="right-content">
                            <h4>John Doe</h4>
                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                        </div>
                    </li>
                    <li class="feature-item">
                        <div class="left-icon">
                            <img src="{{ asset('assets/vendor/showroom/assets/images/features-first-icon.png') }}" alt="training fifth">
                        </div>
                        <div class="right-content">
                            <h4>John Doe</h4>
                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <br>

        <div class="main-button text-center">
            <a href="testimonials.html">Read More</a>
        </div>
    </div>
</section>
<!-- ***** Testimonials Item End ***** -->
    
@endsection