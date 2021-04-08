@extends('admin.layouts.master')

@section('title', 'User')

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
                  <tbody id="userData">
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
            <form id="verifUser" action="#">
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="tombol-post">Verifikasi</button>
            </div>
            </form>
        </div>
    </div>
  </div>

    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 <section class="content">
     <div class="row">
         <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <a href="{{ '/admin/user/add' }}" class="btn btn-primary">Tambah User</a>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d) 
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->role}}</td>
                            <td>
                              @if ($d->verified !== null)
                              <span class="badge badge-success">Terverifikasi</span>
                              @else
                              <span class="badge badge-danger">Belum Terverifikasi</span>
                              @endif
                            </td>
                            <td>
                              @if ($d->verified !== null)
                              <a href="{{ '/admin/user/edit/'}}{{ $d->id }}">
                                <i class="fas fa-edit" style="color: green"></i>
                              </a>
                               | 
                              <a href="{{ '/admin/user/delete/'}}" id="confirm" onclick="aksi({{$d->id}})">
                                <i class="fas fa-trash-alt" style="color: red"></i>
                              </a>
                              @else
                              <a href="#" title="Verivikasi" data-uid="{{ $d->id }}" class="lihatData">
                                <i class="fas fa-eye" style="color: green"></i>
                              </a>
                              @endif
                            </td>
                        </tr>
                    @endforeach
              
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
         </div>
     </div>
 </section>
</div>
@endsection

@push('js-asset')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('js-page')
<script type="text/javascript">
  // DataTables
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
        "paging": true,
        "searching": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    function aksi(id){
      event.preventDefault();
      const url = document.getElementById('confirm').getAttribute('href');
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
      
      uid = elLihatData.data('uid');
      
      $.ajax({
        data: uid,
        url: '/admin/user/showdata/' + uid,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if(data !== 0) {
            $('#modalData').modal('show');

            $('#userData').html(`
            <tr>
              <td><b>Nama</b></td>
              <td><b>:</b></td>
              <td>${data.name}</td>
            </tr>
            <tr>
              <td><b>Domisili</b></td>
              <td><b>:</b></td>
              <td>${data.region[0].region}</td>
            </tr>
            <tr>
              <td><b>Iuran Pertama</b></td>
              <td><b>:</b></td>
              <td>${data.keuangan[0].jumlah}</td>
            </tr>
            <tr>
              <td><b>Foto STNK</b></td>
              <td><b>:</b></td>
              <td><img src="{{ asset('image/Member/Profile/Stnk') }}/${data.profile.foto_stnk}" class="img-thumbnail" alt=""></td>
            </tr>
            <tr>
              <td><b>Bukti Transfer</b></td>
              <td><b>:</b></td>
              <td><img src="{{ asset('image/Member/Keuangan') }}/${data.keuangan[0].bukti}" class="img-thumbnail" alt=""></td>
            </tr>
            `)

            $('#verifUser').attr('action', '/admin/user/verify/' + uid);
          }else {
            swal({
              title: 'Belum Ada Data',
              text: "User ini belum menginput data",
              icon: 'warning',
              buttons: false,
              dangerMode: false,
            })
          }
        }
      })
    })
  </script>
@endpush