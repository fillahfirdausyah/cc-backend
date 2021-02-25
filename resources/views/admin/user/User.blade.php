@extends('admin.layouts.master')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
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
                      <th>Status Verifikasi.</th>
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
                              @if ($d->email_verified_at == null)
                              <span class="badge badge-danger"> Belum Terverifikasi </span>
                              @else
                              <span class="badge badge-success"> Terverifikasi </span>
                              @endif
                            </td>
                            <td>
                                <a href="{{ '/admin/user/edit/'}}{{ $d->id }}">
                                  <i class="fas fa-edit" style="color: green"></i>
                                </a>
                                 | 
                                <a href="{{ '/admin/user/delete/'}}{{ $d->id }}" id="confirm" onclick="aksi({{$d->id}})">
                                  <i class="fas fa-trash-alt" style="color: red"></i>
                                </a>
                                |
                                @if ($d->email_verified_at == null)
                                <a href="{{ '/admin/user/verify/' }}{{ $d->id }}">
                                  <i class="fas fa-user-check" style="color: green"></i>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

  </script>
@endpush