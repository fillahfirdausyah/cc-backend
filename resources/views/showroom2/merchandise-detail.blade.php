@extends('showroom2.layouts.master')

@section('title', 'Merchandise Details')
    
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/vendor/showroom/assets/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <h2><em>Rp @convert($merchan->harga)</em></h2>
                    <p>{{ $merchan->nama_produk }}</p>
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
            @foreach(json_decode($merchan->gambar) as $sr)
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

        <div class="row justify-content-end mb-3">
          @can('ud-merchan', $merchan)
          <div><a href="{{ '/showroom/merchandise/edit/'.$merchan->id }}"><button class="btn btn-success">Edit</button></a></div>
          <form action="{{ '/showroom/merchandise/'.$merchan->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">
          </form>
          @else
          <form>
              <input type="hidden" id="produk_id" value="{{ $merchan->id }}">
              <input type="hidden" id="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
              <input type="hidden" id="jenis" name="jenis" value="merchandise">
              <button class="btn btn-primary" id="wishlist-button" type="submit" onclick="wishlist()"><i class="fa fa-heart"></i> Add to Wishlist </button>
          </form>
          @endcan
        </div>

        <div class="row" id="tabs">
          <div class="col-lg-4">
            <ul>
              <li><a href='#tabs-1'><i class="fa fa-info-circle"></i> Deskripsi Barang</a></li>
              <li><a href='#tabs-2'><i class="fa fa-phone"></i> Kontak </a></li>
              <li><a href='#tabs-3'><i class="fa fa-star"></i> Ulasan</a></li>
            </ul>
          </div>
          <div class="col-lg-8">
            <section class='tabs-content' style="width: 100%;">
              <article id='tabs-1'>
                <div class="row">
                
                  <div class="col-sm-12">
                    <h4>Deskripsi Barang</h4>
                    <p>{{ $merchan->deskripsi }}</p>
                  </div>

                  <div class="col-sm-6">
                    <label>Daerah</label> 
                      <p> {{ $merchan->region->region }} </p>
                  </div>

                  <div class="col-sm-6">
                    <label>Stok</label>
                    <p>{{ $merchan->stok }}</p>
                  </div>

                  <div class="col-sm-6">
                    <label>Kategori</label>
                    <p>{{ $merchan->kategori }}</p>
                  </div>

                </div>
               </article>

              <article id='tabs-2'>
                <h4>Kontak</h4>

                <div class="row">   
                    <div class="col-sm-6">
                        <label>Nama</label>

                        <p>{{ $merchan->user->tenant->nama  }} </p>
                    </div>
                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <p><a href="#">{{ $merchan->user->tenant->email }}</a></p>
                    </div>
                </div>

              </article>


              <article id='tabs-3'>
                <h4>Ulasan</h4>

                <p>lalala</p>

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
