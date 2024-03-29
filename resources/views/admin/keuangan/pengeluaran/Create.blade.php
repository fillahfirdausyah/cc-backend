@extends('admin.layouts.master')

@section('title', 'Tambah Pengeluaran')
    
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
              <li class="breadcrumb-item active">Keuangan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Catatan Pengeluaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ '/admin/keuangan/pengeluaran/store' }}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pengeluaran</label>
                            <input type="text" class="form-control" name="nama" id="pengeluaran">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <select id="daerah" name="region" class="form-control" onchange="filter_nama()">
                              <option value="kosong">Pilih...</option>
                              @foreach ($region as $reg)
                                  <option value="{{ $reg->id }}">{{ $reg->region }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="saldo">Saldo Region</label>
                          <input type="number" class="form-control" id="saldo" readonly>
                        </div>
                        <div class="form-group">
                          <label for="jumalah">Jumlah Pengeluaran</label>
                          <input type="number" class="form-control" name="jumlah" max="0" id="jumlah" placeholder="Rp..">
                        </div>
                        <div class="form-group">
                            <label>Kategori Pengeluaran</label>
                            <select name="kategori" class="form-control">
                              <option>Mingguan</option>
                              <option>Event</option>
                            </select>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Buat Pengeluaran</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
              </div>
          </div>
        </div>
    </section>
</div>
<script src></script>
@endsection

@push('js-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('assets/js/simple.money.format.js') }}"></script>
<script>
  function filter_nama(){
    let region_id = $('#daerah').children("option:selected").val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url:'/admin/keuangan/getsaldo/',
        type: 'post',
        data: {id: region_id },
        dataType: "json",
        success: function(res){
            let pemasukan = 0;
            let pengeluaran = 0;
            let saldo = 0;
            res.keuangan.forEach(x => {
               if(x.tipe_transaksi === 'pemasukan') {
                pemasukan += x.jumlah
               }

               if(x.tipe_transaksi === 'pengeluaran') {
                 pengeluaran += x.jumlah
               }
            });
            saldo = pemasukan - pengeluaran;
            $('#saldo').val(saldo);
            $('#jumlah').attr('max', saldo);
            console.log(saldo)
        }
      });
  }
</script>
@endpush