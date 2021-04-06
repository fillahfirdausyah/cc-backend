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
                      <h3 class="card-title">Grafik Total Pemasukan</h3>
      
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
             <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Total Pendapatan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Region</th>
                                <th>Total</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataPemasukan as $d)
                          <tr>
                            <td>{{ $d->region }}</td>
                            <td style="color: #2de060">-Rp.@convert($d->totalPendapatan)</td>
                            {{-- <td>{{ $d }}</td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                        {{-- <p class="mt-2">Halaman: {{ $data->currentPage() }}</p> --}}
                      </table>
                    </div>
                </div>
                <!-- /.card-body -->
                  <div class="card-footer">
                </div>
              </div>
             </div>
             <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Total Pengeluaran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Region</th>
                                <th>Total</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataPengeluaran as $d)
                          <tr>
                            <td>{{ $d->region }}</td>
                            <td style="color: red">-Rp.@convert($d->totalPengeluaran)</td>
                            {{-- <td>{{ $d }}</td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                        {{-- <p class="mt-2">Halaman: {{ $data->currentPage() }}</p> --}}
                      </table>
                    </div>
                </div>
                <!-- /.card-body -->
                  <div class="card-footer">
                </div>
              </div>
             </div> 
             <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Saldo Region</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- TAMPILKAN DATA YANG BERHASIL DIFILTER -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Region</th>
                                <th>Saldo</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($saldo as $i => $s)
                          <tr>
                            <td>{{ $s['Pemasukan']['region'] }}</td>
                            <td style="color: #42a4ff">-Rp.@convert($s['Pemasukan']['pendapatan'] - $s['Pengeluaran']['pengeluaran'])</td>
                          </tr>
                          @endforeach
                        </tbody>
                        {{-- <p class="mt-2">Halaman: {{ $data->currentPage() }}</p> --}}
                      </table>
                    </div>
                </div>
                <!-- /.card-body -->
                  <div class="card-footer">
                </div>
              </div>
             </div> 
             {{-- <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">History Keuangan</h3>  
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <tr>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-warning">Pending</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <tr>
                        <td>657</td>
                        <td>Bob Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-primary">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <tr>
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-danger">Denied</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div> --}}
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

  let chart = {!!json_encode($chart)!!}
  let reg = []
  let total = []
  let warna = []
  chart.forEach(x => {
      reg.push(x.region)
      total.push(x.totalPendapatan)
  });

  for(let i = 0; i < reg.length; i++) {
    let randomColor = Math.floor(Math.random()*16777215).toString(16);
    warna.push(`#${randomColor}`);
  }

  let areaChartData = {
        labels  : reg,
        datasets: [
          {
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            weight              : 10,
            backgroundColor     : warna,
            data                : total
          },
        ]
      }

  let areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true
    }
  }
  let lineChartCanvas = $('#lineChart').get(0).getContext('2d')
  let lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
  let lineChartData = jQuery.extend(true, {}, areaChartData)
  let lineChart = new Chart(lineChartCanvas, { 
    type: 'doughnut',
    data: lineChartData, 
    options: lineChartOptions
  })
</script>  
@endpush