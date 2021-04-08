@extends('showroom2.tenant.layouts.master')

@section('title', 'Tenant')

@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ count($SR) }}</h3>

                <p>Cars</p>
              </div>
              <div class="icon">
                <i class="fa fa-car" aria-hidden="true"></i>
              </div>
              <a href='/showroom/upload/car' class="small-box-footer">Add <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ count($merchan) }}</h3>

                <p>Merchandise</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              </div>
              <a href='/showroom/upload/merchandise' class="small-box-footer">Add <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ count($bengkel) }}</h3>

                <p>Auto Shop</p>
              </div>
              <div class="icon">
                <i class="fa fa-cog" aria-hidden="true"></i>
              </div>
              <a href='/showroom/upload/autoshop' class="small-box-footer">Add <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- /.row -->
        <!-- Main row -->


        <div class="row">
          <div id="notif"></div>
          <div class="container">
            <div class="table-responsive">
              <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->

              <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Pembeli</th>
                        <th>Nama barang</th>
                        <th>ID barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 
                 @forelse($transaksi as $t)
                  <tr>
                    <td>{{ $t->buyer->name }}</td>
                    <td>{{ $t->transactionable->nama_produk }}</td>
                    <td>{{ $t->transactionable->id }}</td>
                    <td>{{ $t->amount }}</td>
                    <td>Rp. @convert((int)$t->transactionable->harga*$t->amount)</td>                    
                    <td>{{ date('d F y',strtotime($t->created_at)) }}</td>
                    @if($t->confirmed == NULL)
                    <td colspan="3">
                      <form method="post" action="/showroom/confirm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $t->id }}">
                        <button type="submit" class="btn btn-success">Konfirmasi Barang Tersedia</button>
                      </form>
                    </td>
                    @else
                      @if ($t->payment != NULL)
                      <td><a href="{{ asset('assets/vendor/showroom/assets/images/bukti_transfer/'.$t->payment) }}"><a href="{{ asset('assets/vendor/showroom/assets/images/bukti_transfer/'.$t->payment) }}">{{$t->payment}}</a></a></td>
                      @else
                      <td><span class="badge badge-danger">Belum Ada bukti</span></td>
                      @endif
                      <td>{{ $t->status }}</td>
                      <td>
                        @if($t->status == 'pending' && $t->payment != NULL)
                        <form method="post" action="/showroom/full">
                          @csrf
                          <input type="hidden" name="transaction_id" value="{{ $t->id }}">
                          <button type="submit" class="btn-sm btn-success">Tandai Lunas & Dikirim</button>
                        </form>
                        @elseif($t->payment == NULL)
                        <p>Menunggu bukti bayar (1x24 jam)</p>
                        @else
                          <span class="badge badge-success">-</span>
                        @endif
                      </td>
                     @endif
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
        </div>
    </section>
  </div>
@endsection
