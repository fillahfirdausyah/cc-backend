@extends('showroom2.layouts.master')

@section('title', 'Cars Details')
    
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/vendor/showroom/assets/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>Rp @convert($SR->harga)</em></h2>
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
        <div id="carouselExampleControls" style="width: 70%; margin: auto;" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 img-fluid" src="{{ asset('image/Tenant/car/'.$gambar[0])}}" alt="First slide">
            </div>
            @foreach(json_decode($SR->gambar) as $sr)
            <div class="carousel-item">
              <img class="d-block w-100 img-fluid" src="{{ asset('image/Tenant/car/'.$sr)}}" alt="First slide">
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <br>
        <br>
        <br>
        <div class="row justify-content-end mb-3">
          @cannot('ud-sr', $SR)
            <div class="wishlist-container">
            @if($wishlist == NULL)
            <form action="/showroom/wishlist" method="post">
              @csrf
                <input type="hidden" id="produk_id" name="produk_id" value="{{ $SR->id }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
                <input type="hidden" id="jenis" name="jenis" value="car">
                <button class="btn btn-primary" type="submit"><i class="fa fa-heart"></i> Add to Wishlist </button>
            </form>
            @else
            <form action="/showroom/wishlist" method="post">
              @method('delete')
              @csrf
                <input type="hidden" id="wishlist_id" name="id" value="{{ $wishlist->id }}">
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete from Wishlist</button>
            </form>
            @endif
            </div>
          @endcan
        </div>
        <div class="row" id="tabs">
          <div class="col-lg-4">
            <ul>
              <li><a href='#tabs-1'><i class="fa fa-cog"></i>Spesifikasi</a></li>
              <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Deskripsi</a></li>
              <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Fitur Tambahan</a></li>
              <li><a href='#kontak'><i class="fa fa-phone"></i> Kontak</a></li>
            </ul>
          </div>
          <div class="col-lg-8">
            <section class='tabs-content' style="width: 100%;">
              <article id='tabs-1'>
                <h4>Spesifikasi</h4>

                <div class="row">
                   <div class="col-sm-6">
                        <label>Kondisi</label>
                   
                        <p>{{ $SR->kondisi}}</p>
                   </div>
                   
                   <div class="col-sm-6">
                        <label>Tahun</label>
                   
                        <p>{{ $SR->tahun }}</p>
                   </div>

                   <div class="col-sm-6">
                        <label>Bahan Bakar</label>
                   
                        <p>{{ $SR->bahan_bakar }}</p>
                   </div>

                   <div class="col-sm-6">
                        <label>Mesin</label>
                   
                        <p>{{ $SR->mesin }} cc</p>
                   </div>

                   <div class="col-sm-6">
                        <label>Tenaga</label>
                   
                        <p>{{ $SR->tenaga }} hp</p>
                   </div>


                   <div class="col-sm-6">
                        <label>Transmisi</label>
                   
                        <p>{{ $SR->transmisi}}</p>
                   </div>

                   <div class="col-sm-6">
                        <label>Jenis</label>
                   
                        <p>{{ $SR->jenis }}</p>
                   </div>

                   <div class="col-sm-6">
                        <label>Warna</label>
                   
                        <p>{{ $SR->warna }}</p>
                   </div>

                  @cannot('ud-sr', $SR)
                    @if($transaction == NULL)
                     <div class="col-sm-12">
                      <form method="post" action="/showroom/interest/car">
                        @csrf
                        <input type="hidden" name="buyer_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="seller_id" value="{{ $SR->user->id }}">
                        <input type="hidden" name="item_id" value="{{ $SR->id }}">
                        <input type="hidden" name="amount" value="1">
                        <button type="submit" class="btn btn-lg btn-primary minat" style="width: 100%;">Beli</button>
                      </form>
                     </div>
                     @else
                      <div class="alert alert-success" style="width: 100%;">
                          Item ini sudah ditambahkan di Transaksi anda
                      </div>
                    @endif
                  @endcan
                  
                </div>
              </article>
              <article id='tabs-2'>
                <h4>Deskripsi</h4>
                
                <p>{{ $SR->deskripsi }}</p> 
               </article>
              <article id='tabs-3'>
                <h4>Fitur Tambahan</h4>

                <div class="row">
                @if($SR->fitur != 0)   
                  @foreach(json_decode($SR->fitur) as $fitur)
                    <div class="col-sm-6">
                        <p>{{ $fitur }}</p>
                    </div>
                  @endforeach
                @endif
                </div>
              </article>
              <article id='kontak'>
                <h4>Kontak</h4>
                <div class="row">                   
                  @if( $tenant != NULL)

                    <div class="col-sm-6">
                        <label>Nama</label>
                        <p>{{ $tenant->name }}</p>
                    </div>

                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <p><a href="#">{{ $tenant->email }}</a></p>
                    </div>

                    <div class="col-sm-6">
                      <label>Social Network</label>
                      <p><a href="{{ '/member/profile/details/'.$user->username }}">{{ $user->name }}</a></p>
                    </div>

                    <div class="col-sm-6">
                      <label>Telepon</label>
                      <p>{{ $tenant->telepon }}</p>
                    </div>

                  @else

                    <div class="col-sm-6">
                        <label>Nama</label>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <p><a href="#">{{ $user->email }}</a></p>
                    </div>

                    <div class="col-sm-6">
                      <label>Social Network</label>
                      <p><a href="{{ '/member/profile/details/'.$user->username }}">{{ $user->name }}</a></p>
                    </div>

                    @endif
                </div>
              </article>
            </section>
          </div>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection
