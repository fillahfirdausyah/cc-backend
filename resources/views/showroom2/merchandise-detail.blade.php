@extends('showroom2.layouts.master')

@section('title', 'Merchandise Details')
    
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url('{{asset('assets/img/merchandise.jpg')}}')">
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

      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        @foreach(json_decode($merchan->gambar) as $m)
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="{{ asset('assets/vendor/showroom/assets/images/'.$m)}}" style="width:100%">
          <div class="text">Caption Text</div>
        </div>
        @endforeach

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>

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
            @if($wishlist == NULL)
            <form action="/showroom/wishlist" method="post">
              @csrf
                <input type="hidden" id="produk_id" name="produk_id" value="{{ $merchan->id }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
                <input type="hidden" id="jenis" name="jenis" value="merchandise">
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
                        <p>{{ $merchan->user->tenant->email }}</p>
                    </div>

                    <div class="col-sm-6">
                      <p><a href="{{ '/member/details/'.$user->username }}">{{ $user->name }}</a></p>
                    </div>

                    <div class="col-sm-6">
                      <label>Telepon</label>
                      <p>{{ $merchan->user->tenant->telepon }}</p>
                    </div>

                </div>

              </article>


              <article id='tabs-3'>
                <h4>Ulasan</h4>

                <div class="row">
                  @foreach($comment->comment as $c)
                   <div class="col-sm-12">
                        <label>{{ $c->user->name }}</label>
                   
                        <p>{{ $c->comment}}</p>
                        <form action="{{ '/showroom/merchandise/comment/'.$c->id}}" method="post">
                          @method('delete')
                          @csrf
                       @if ($c->user->id == Auth::id())
                        <button class="btn-sm btn-danger">Delete</button>
                       @endif
                        </form>
                   </div>
                   @endforeach
                   <div class="col-sm-12">
                    <hr>
                      <form action="/showroom/merchandise/comment" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $merchan->id }}">
                        <div class="form-group">
                            <label>Tambahkan Ulasan</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                          <button class="btn btn-primary">Tambah</button>
                      </form>

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
