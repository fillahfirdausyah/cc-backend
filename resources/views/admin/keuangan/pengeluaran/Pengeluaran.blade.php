@extends('admin.layouts.master')

@section('title', 'Keuangan')
    
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keuangan </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
              <li class="breadcrumb-item active">Keuangan </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pengeluaran Keuangan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ '/admin/keuangan/details' }}" method="GET">
                    <a href="{{ '/admin/keuangan/pengeluaran/add' }}" class="btn btn-primary">Buat Pengeluaran</a>
                    <div class="input-group mb-3 col-sm-4 float-right">
                      <select name="region" id="region" class="form-control">
                        <option value="0">Semua</option>
                        <option value="">haha</option>
                      </select>
                        <select name="kategori" id="kategori" class="form-control">
                          <option>Semua</option>
                          <option>Mingguan</option>
                          <option>Event</option>
                        </select>
                        <input type="text" id="created_at" name="date" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>Kategori</th>
                                <th>Region</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($data as $d)
                          <tr> 
                            <td>{{ $d->nama }}</td>
                            <td style="color: red">-Rp.@convert($d->jumlah)</td>
                            <td>{{ $d->kategori }}</td>
                            <p hidden>{{ $r = \App\Models\Keuangan::find($d->id)->region()->get() }}</p>
                             @foreach ($r as $re)
                             <td>{{ $re->region }}</td>
                             @endforeach
                            <td>{{ date('d F y',strtotime($d->created_at)) }}</td>
                            <td>Lorem ipsum dolor sit amet.</td>
                          </tr>
                          @empty
                          <tr>
                            <td>Tidak ada data</td>
                          </tr>
                          @endforelse
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                </div>
              </div>
             </div>
          </div>
        </div>
    </section>
</div>

@endsection

@push('css-page')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('js-asset')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('js-page')
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
  $(document).ready(function() {
      let start = moment().startOf('month')
      let end = moment().endOf('month')

      //INISIASI DATERANGEPICKER
      $('#created_at').daterangepicker({
          startDate: start,
          endDate: end
      });

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  })
 
function aksi(id){
      event.preventDefault();
      const url = document.getElementById('confirm').getAttribute('href')
      swal({
        title: 'Yaking ingin menghapus?',
        text: "Data akan dihapus permanen",
        icon: 'warning',
        buttons: true,
        dangerMode: false,
      }).then(function(result){
        if(result){
         window.location.href = url + id;
        }
      });
    }
</script>  
@endpush