@extends('admin.layouts.master')

@section('title', 'Keuangan')
    
@section('content')
<div class="content-wrapper">

  <div class="modal fade" id="modalData" aria-labelledby="add-iuran">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table m-0" id="table-acc-mobil">
                  <tbody id="keuanganData">
                  <tr>
                    <td><b>Nama</b></td>
                    <td>#</td>
                  </tr>
                  <tr>
                    <td><b>Domisili</b></td>
                    <td>#</td>
                  </tr>
                  <tr>
                    <td><b>Foto STNK</b></td>
                    <td><img src="" class="img-thumbnail" alt=""></td>
                  </tr>
                  <tr>
                    <td><b>Iuran Pertama</b></td>
                    <td>#</td>
                  </tr>
                  <tr>
                    <td><b>Bukti</b></td>
                    <td><img src="" class="img-thumbnail" alt=""></td>
                  </tr>
                </tbody>
                </table>
              </div>
            </div>
            <form id="verifKeuangan" action="#">
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="tombol-post">Verifikasi</button>
            </div>
            </form>
        </div>
    </div>
  </div>


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
                  <h3 class="card-title">Data Pemasukan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ '/admin/keuangan/pemasukan/details' }}" method="GET">
                    <a href="{{ '/admin/keuangan/pemasukan/add' }}" class="btn btn-primary">Tambah Data Pemasukan</a>
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
                                <th>E-mail</th>
                                <th>Jumlah</th>
                                <th>Kategori</th>
                                <th>Region</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($data as $d)
                          <tr>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->email }}</td>
                            <td>-Rp.@convert($d->jumlah)</td>
                            <td>{{ $d->kategori }}</td>
                             <p hidden>{{ $r = \App\Models\Keuangan::find($d->id)->region()->get() }}</p>
                             @foreach ($r as $re)
                             <td>{{ $re->region }}</td>
                             @endforeach
                            <td>{{ date('d F y',strtotime($d->created_at)) }}</td>
                            @if ($d->status == 'Lunas')
                            <td><span class="badge badge-success">{{ $d->status }}</span></td>
                            <td>
                              <a href="{{ '/admin/keuangan/pemasukan/edit/'}}{{ $d->id }}">
                                <i class="fas fa-edit" style="color: green"></i>
                              </a>
                              <a href="{{ '/admin/keuangan/pemasukan/delete/'}}"  id="confirm" class="ml-2" onclick="aksi({{ $d->id }})">
                                <i class="fas fa-trash-alt" style="color: red"></i>
                              </a>
                            </td>
                            @else
                            <td><span class="badge badge-danger">{{ $d->status }}</span></td>
                            <td>
                              <a href="#" title="Verivikasi" data-kid="{{ $d->id }}" class="lihatData">
                                <i class="fas fa-eye" style="color: green"></i>
                              </a>
                            </td>
                            @endif
                          </tr>
                          @empty
                          <tr>
                              <td colspan="8" class="text-center">Tidak ada data</td>
                          </tr>
                          @endforelse
                        </tbody>
                        {{-- <p class="mt-2">Halaman: {{ $data->currentPage() }}</p> --}}
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    {{-- <center>sshs</center> --}}
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

    let elLihatData = $('.lihatData');

    elLihatData.click(function(e) {
      e.preventDefault();

      uid = elLihatData.data('kid');  
      
      $.ajax({
        data: uid,
        url: '/admin/keuangan/pemasukan/show/' + uid,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('#modalData').modal('show');

          $('#keuanganData').html(`
          <tr>
            <td><b>Nama</b></td>
            <td><b>:</b></td>
            <td>${data.nama}</td>
          </tr>
          <tr>
            <td><b>Email</b></td>
            <td><b>:</b></td>
            <td>${data.email}</td>
          </tr>
          <tr>
            <td><b>Jumlah</b></td>
            <td><b>:</b></td>
            <td>${data.jumlah}</td>
          </tr>
          <tr>
            <td><b>Kategori</b></td>
            <td><b>:</b></td>
            <td>${data.kategori}</td>
          </tr>
          <tr>
            <td><b>Region</b></td>
            <td><b>:</b></td>
            <td>${data.region.region}</td>
          </tr>
          <tr>
            <td><b>Bukti Transfer</b></td>
            <td><b>:</b></td>
            <td><img src="{{ asset('image/Member/Keuangan') }}/${data.bukti}" class="img-thumbnail" alt=""></td>
          </tr>
          `)
          let regid = data.region.id;
          $('#verifKeuangan').attr('action', '/admin/keuangan/pemasukan/verify/' + uid + '/' + regid);
        }
      })
    })
</script>  
@endpush