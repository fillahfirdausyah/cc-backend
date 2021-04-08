@extends('showroom2.layouts.master')

@section('title', 'Transaksi')
    
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
  <video autoplay muted loop id="bg-video">
      <source src="{{ asset('assets/vendor/showroom/assets/images/video.mp4') }}" type="video/mp4" />
  </video>
  <div class="video-overlay header-text">
      <div class="caption">
          <h2><em>HISTORY</em></h2>
          <h2>Transaksi</h2>
      </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- Start main section -->
<section class="section mt-3" id="trainers">
<div class="container-fluid">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  
  <div class="row transaction-container ml-3 justify-content-center">
    <!-- Start content -->
    <div class="col-9">
      <div class="row">
        @forelse($transaction as $index => $t)
        <div class="transaction-card mt-2" style="background-color: #FFFBF7; border: 1px solid black;">


          <div class="row justify-content-center transaction-header mt-2" style="background-color: orange;">
            <div>
              <h2 class="text-center" style="color: white;"><em>STATUS : {{ $t->status }}</em></h2>
            </div>
          </div>

          <div class="row transaction-body">

            <div class="col-md-2 transaction-image">
              @if($t->transactionable_type == "App\Models\Merchandise")
                <img src="{{ asset('image/Tenant/merchandise/'.$collectT[$index])}}" class="img-thumbnail">
              @elseif($t->transactionable_type == "App\Models\SR")
                <img src="{{ asset('image/Tenant/car/'.$collectT[$index])}}" class="img-thumbnail">
              @endif
            </div>

            <div class="col-md-3 transaction-profile">
              <em style="color: orange;">
                {{$t->transactionable->nama_produk}} <sub>(ID pembelian = {{$t->id}})</sub>
              </em>
              <p>Rp. @convert((int)$t->transactionable->harga*$t->amount)</p><br>
              <div class="transaction-seller-profile">
                <sup>Seller</sup> {{ $t->seller->tenant->tenant_id }}
              </div>
            </div> 

            <div class="col-md-6">
              <p class="transaction-date" style="font-size: 12px;">{{ date('d F y',strtotime($t->created_at)) }}</p>
              @if($t->confirmed == NULL)
                <span class="badge badge-danger">Menunggu Konfirmasi (1x24jam)</span>
              @elseif($t->confirmed != NULL && $t->payment == NULL)
                Transfer ke {{$t->seller->tenant->rekening}}- a/n {{$t->seller->tenant->pemilik_rekening}}({{$t->seller->tenant->bank}})<br>
                <form method="post" action="/showroom/transfer" enctype="multipart/form-data" style="display: none;" id="bt-{{$t->id}}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $t->id }}">
                  <input type="file" name="payment">
                  <input type="submit" class="btn-sm btn-primary" value="Kirim">
                </form>
                <button class="btn-sm btn-success" onclick="upload('{{$t->id}}')" id="upload-{{$t->id}}">Upload Bukti Transfer</button>
              @else
                <a href="{{ asset('assets/vendor/showroom/assets/images/bukti_transfer/'.$t->payment) }}">{{$t->payment}}</a>
              @endif
            </div>

          </div>

        </div>
        @empty
        <h3>Data Kosong</h3>
        @endforelse
      </div>
      {{ $transaction->links() }}
    </div>
    <!-- End Content -->
  </div>

</div>
</section>
<!-- End main section -->

@endsection