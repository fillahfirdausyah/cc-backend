@extends('showroom2.layouts.visit')

@section('title', 'Car Details')
    
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/vendor/showroom/assets/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">          
            @foreach(json_decode($bengkel->gambar) as $sr)
            <div class="carousel-item">
              <img class="d-block w-100 active" src="{{ asset('assets/vendor/showroom/assets/images/'.$sr) }}">
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <br>
        <br>

        <div class="row" id="tabs">
          <div class="col-lg-4">
            <ul>
              <li><a href='#tabs-1'><i class="fa fa-cog"></i> Ulasan</a></li>
              <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Tentang Bengkel</a></li>
              <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Layanan</a></li>
              <li><a href='#tabs-4'><i class="fa fa-phone"></i> Kontak & Alamat</a></li>
            </ul>
          </div>
          <div class="col-lg-8">
            <section class='tabs-content' style="width: 100%;">
              <article id='tabs-1'>
                <h4>Ulasan</h4>

                <div class="row">
                  @foreach($comment->comment as $c)
                   <div class="col-sm-12">
                        <label>{{ $c->user->name }}</label>
                   
                        <p>{{ $c->comment}}</p>
                   </div>
                   @endforeach
                   <div class="col-sm-12">

                      <form action="/showroom/autoshop/comment" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="post_id" value="{{ $bengkel->id }}">
                        <label>Tambahkan Ulasan</label>
                        <textarea class="form-control" name="comment"></textarea>
                        <button class="btn btn-primary">Tambah</button>

                      </form>

                   </div>
                </div>
              </article>
              <article id='tabs-2'>
                <h4>Tentang Bengkel</h4>
                
                <p>tentang</p> 
                <p></p>
               </article>
              <article id='tabs-3'>
                <h4>Layanan</h4>

                <div class="row"> 
                  @foreach(json_decode($bengkel->layanan) as $b)
                    <div class="col-sm-6">
                        <p>{{ $b }}</p>
                    </div>
                  @endforeach
                </div>
              </article>
              <article id='tabs-4'>
                <h4>Kontak</h4>

                <div class="row">   
                    <div class="col-sm-6">
                        <label>Nama</label>

                        <p>name </p>
                    </div>
                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <p><a href="#">john@carsales.com</a></p>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <label>Alamat</label>
                    <p>{{ $bengkel->alamat }}</p>
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->

@endsection