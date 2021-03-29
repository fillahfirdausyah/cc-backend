@extends('showroom2.layouts.master')

@section('title', 'Transaksi')
    
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/vendor/showroom/assets/images/video.mp4') }}" type="video/mp4" />
    </video>

    {{-- <img src="{{ asset('assets/vendor/showroom/assets/images/product-5-720x480.jpg') }}" id="bg-video" alt=""> --}}

    <div class="video-overlay header-text">
        <div class="caption">
            <h2><em>HISTORY</em></h2>
            <h2>Transaksi</h2>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<section class="section" id="trainers">
  <div class="container-fluid">

  <div class="table-responsive">
  <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID Pembelian</th>
            <th>Nama barang</th>
            <th>ID barang</th>
            <th>Tenant id</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Bukti Transfer</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
     
     @forelse($transaction as $t)
      <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->item->nama_produk }}</td>
        <td>{{ $t->item->id }}</td>
        <td>{{ $t->seller->tenant->tenant_id }}</td>
        <td>{{ $t->amount }}</td>
        <td>Rp. @convert((int)$t->item->harga*$t->amount)</td>                    
        <td>{{ date('d F y',strtotime($t->created_at)) }}</td>
        @if($t->confirmed == NULL)
          <td colspan="2"><span class="badge badge-danger">Menunggu Konfirmasi (1x24jam)</span></td>
        @elseif($t->confirmed != NULL && $t->payment == NULL)
          <td colspan="2">
            Silahkan Transfer ke {{$t->seller->tenant->rekening}}-{{$t->seller->tenant->bank}}<br>
            <form method="post" action="/showroom/transfer" enctype="multipart/form-data" style="display: none;" id="bt-{{$t->id}}">
              @csrf
              <input type="hidden" name="id" value="{{ $t->id }}">
              <input type="file" name="payment">
              <input type="submit" class="btn-sm btn-primary" value="Kirim">
            </form>
            <button class="btn-sm btn-success" onclick="upload('{{$t->id}}')" id="upload-{{$t->id}}">Upload Bukti Transfer</button>
          </td>
        @else
          <td>
            <a href="{{ asset('assets/vendor/showroom/assets/images/bukti_transfer/'.$t->payment) }}">{{$t->payment}}</a>
          </td>
          <td>{{ $t->status }}</td>

        @endif
        <td>
          @if($t->status == 'lunas & dikirim')
            @if($t->status != 'diterima')
              <form method="post" action="/showroom/received" class="d-inline">
                @csrf
                <input type="hidden" name="id" value="{{ $t->id }}">
                <button type="submit" class="btn-sm btn-success">Diterima</button>
              </form>
              <button class="btn-sm btn-danger d-inline">laporkan</button>
            @else
              <span class="badge badge-danger">-</span>
            @endif
          @endif
        </td>
      </tr>
      @empty
      <tr>
          <td colspan="8" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
    {{-- <p class="mt-2">Halaman: {{ $transaksi->currentPage() }}</p> --}}
  </table>
</div>

</div>
</section>
<!-- ***** Fleet Ends ***** -->

@endsection
@push('js')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
  
  // var pusher = new Pusher('5655f5e5ff7fea17d766', {
  //   cluster: 'ap1'
  // });

  // var channel = pusher.subscribe('notif-showroom.'+4);
  // channel.bind('NotifBuyer.'+4, function(data) {
  //   console.log('yey');
  //   // app.messages.push(JSON.stringify(data));
  // });

</script>
@endpush