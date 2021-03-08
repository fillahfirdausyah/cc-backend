@extends('showroom2.layouts.master')

@section('title', 'Auto shop Details')
    
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url('{{asset('assets/img/autoshop.jpg')}}')">
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

      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        @foreach(json_decode($bengkel->gambar) as $b)
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="{{ asset('assets/vendor/showroom/assets/images/'.$b)}}" style="width:100%">
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
          @can('ud-bengkel', $bengkel)
          <div><a href="{{ '/showroom/autoshop/edit/'.$bengkel->id }}"><button class="btn btn-primary mr-2">Edit</button></a></div>
          <form action="{{ '/showroom/autoshop/'.$bengkel->id }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">
          </form>
          @else
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($wishlist == NULL)
            <form action="/showroom/wishlist" method="post">
              @csrf
                <input type="hidden" id="produk_id" name="produk_id" value="{{ $bengkel->id }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
                <input type="hidden" id="jenis" name="jenis" value="autoshop">
                <button class="btn btn-primary" type="submit"><i class="fa fa-bookmark"></i> Add to Bookmark</button>
            </form>
            @else
            <form action="/showroom/wishlist" method="post">
              @method('delete')
              @csrf
                <input type="hidden" id="wishlist_id" name="id" value="{{ $wishlist->id }}">
                <button class="btn btn-primary"><i class="fa fa-trash"></i> Delete from Bookmark</button>
            </form>
            @endif
          @endcan
        </div>

        <div class="row" id="tabs">
          <div class="col-lg-4">
            <ul>
              <li><a href='#tabs-1'><i class="fa fa-info-circle"></i> Informasi Bengkel</a></li>
              <li><a href='#tabs-2'><i class="fa fa-plus-circle"></i> Layanan</a></li>
              <li><a href='#tabs-3'><i class="fa fa-phone"></i> Kontak </a></li>
              <li><a href='#tabs-4'><i class="fa fa-star"></i> Ulasan</a></li>
            </ul>
          </div>
          <div class="col-lg-8">
            <section class='tabs-content' style="width: 100%;">
              <article id='tabs-1'>
                <h4>Informasi Bengkel</h4>
                
                <div class="col-sm-6">
                  <label>Jam Buka</label> 
                    <p> 
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$bengkel->waktu_buka)->format('h:i A')}} -
                      {{\Carbon\Carbon::createFromFormat('H:i:s',$bengkel->waktu_tutup)->format('h:i A')}} 
                    </p>
                </div>

                <div class="col-sm-6">
                  <label>Hari Kerja</label>
                  <p>{{ $bengkel->hari }}</p>
                </div>

                <div class="col-sm-12">
                  <label>Alamat</label>
                  <p>{{ $bengkel->alamat }}</p>
                </div>

               </article>
              <article id='tabs-2'>
                <h4>Layanan</h4>

                <div class="row"> 
                  @foreach(json_decode($bengkel->layanan) as $b)
                    <div class="col-sm-6">
                        <p>{{ $b }}</p>
                    </div>
                  @endforeach
                </div>
              </article>

              <article id='tabs-3'>
                <h4>Kontak</h4>

                <div class="row">   
                    <div class="col-sm-6">
                        <label>Nama</label>

                        <p>{{ $bengkel->user->tenant->nama }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>E-mail</label>
                        <p><a href="#">{{ $bengkel->user->tenant->email }}</a></p>
                    </div>
                    <div class="col-sm-6">
                      <label>Nomor Telepon</label>
                      <p>{{ $bengkel->kontak }}</p>
                    </div>
                </div>

              </article>


              <article id='tabs-4'>
                <h4>Ulasan</h4>

                <div class="row">
                  @foreach($comment->comment as $c)
                   <div class="col-sm-12">
                        <label>{{ $c->user->name }}</label>
                   
                        <p>{{ $c->comment}}</p>
                   </div>
                   @endforeach
                   <div class="col-sm-12">
                    <hr>
                      <form action="/showroom/autoshop/comment" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="post_id" value="{{ $bengkel->id }}">
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