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
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Keuangan</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
             </div>
             <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Keuangan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ '/admin/keuangan/details' }}" method="GET">
                    <a href="{{ '/admin/keuangan/add' }}" class="btn btn-primary">Tambah Data</a>
                    <div class="input-group mb-3 col-sm-4 float-right">
                      <select name="region" id="region" class="form-control">
                        <option value="0">Semua</option>
                        @foreach ($region as $reg)
                        <option value="{{ $reg->id }}">{{ $reg->region }}</option>
                        @endforeach
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
                                <th>Nama</th>
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
                            <td>-Rp.@convert($d->jumlah)</td>
                            <td>{{ $d->kategori }}</td>
                             <p hidden>{{ $r = \App\Models\Keuangan::find($d->region_id)->region()->get() }}</p>
                             @foreach ($r as $re)
                             <td>{{ $re->region }}</td>
                             @endforeach
                            <td>{{ date('d F y',strtotime($d->created_at)) }}</td>
                            <td>
                              <a href="{{ '/admin/keuangan/edit/'}}{{ $d->id }}">
                                <i class="fas fa-edit" style="color: green"></i>
                              </a>
                              <a href="{{ '/admin/keuangan/delete/'}}"  id="confirm" class="ml-2" onclick="aksi({{ $d->id }})">
                                <i class="fas fa-trash-alt" style="color: red"></i>
                              </a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="6" class="text-center">Tidak ada data</td>
                          </tr>
                          @endforelse
                        </tbody>
                        <p class="mt-2">Halaman: {{ $data->currentPage() }}</p>
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <center>{{ $data->links() }}</center>
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
$(function() {

  $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            //INISIASI DATERANGEPICKER
            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            });
        })

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Iuran Mingguan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [10, 230, 420, 283, 82, 28]
        },
        {
          label               : 'Event',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'bar',
      data: lineChartData, 
      options: lineChartOptions
    })
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