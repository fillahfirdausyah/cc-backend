@extends('admin.layouts.master')

@section('title', 'Event')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Event</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Event</li>
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
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <a href="{{ '/admin/event/add' }}" class="btn btn-primary">Tambah Event</a>
                    <tr>
                      <th>Judul</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    @foreach ($data as $d)
                    <tbody>
                          <tr>
                              <td>{{ $d->judul }}</td>
                              <td>{{ $d->tanggal }}</td>
                              <td>
                                <a href="{{ '/admin/event/edit/'}}{{ $d->id }}">
                                  <i class="fas fa-edit" style="color: green"></i>
                                </a>
                                 | 
                                <a href="{{ '/admin/event/delete/'}}{{ $d->id }}">
                                  <i class="fas fa-trash-alt" style="color: red"></i>
                                </a>
                            </td>
                          </tr>
                    </tbody>
                    @endforeach
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
@endpush

@push('js-page')
<script type="text/javascript">
  // DataTables
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
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
  </script>
@endpush