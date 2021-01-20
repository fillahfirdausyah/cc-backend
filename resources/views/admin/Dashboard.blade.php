@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      {{-- Content --}}
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Data Region</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0" id="table-daerah">
                    <thead>
                    <tr>
                      <th>Nama Region</th>
                      <th>Anggota</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    @foreach ($region as $reg)
                    <tbody>
                    <tr id="{{ $reg->id }}">
                      <td>{{ $reg->region }}</td>
                      <td><span class="badge badge-success">{{ $reg->user->count() }}</span></td>
                      <td>
                        <a href="{{ '/admin/region/delete/' }}" id="confirm" onclick="aksi({{ $reg->id }})" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-tambah-daerah" class="btn btn-sm btn-info float-left">Tambah Daerah Baru</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $news }}</h3>

                  <p>Berita</p>
                </div>
                <div class="icon">
                  <i class="ion ion-speakerphone"></i>
                </div>
                <a href="{{ '/admin/news/list' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{ $event }}</h3>

                  <p>Event</p>
                </div>
                <div class="icon">
                  <i class="ion ion-model-s"></i>
                </div>
                <a href="{{ '/admin/event/list' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>

              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $user }}</h3>

                  <p>Junlah User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="{{ '/admin/user/list' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- End Content --}}
</div>

<div class="modal fade" id="modal-tambah-daerah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Daerah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-daerah">
      <div class="modal-body">
          <div class="form-group">
            <label for="nama-daerah">Nama Daerah</label>
            <input type="text" class="form-control" name="region" id="nama-daerah">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@push('js-asset')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('js-page')
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$(function(){
    $('#modal-tambah-daerah').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: '{{ '/admin/region/store' }}', //this is the submit URL
            type: 'POST', //or POST
            dataType: 'json',
            data: $('#form-tambah-daerah').serialize(),
            success: function(data){
              // console.log(data.region);
                $("#table-daerah > tbody").last().append(`
                <tr id="${data.id}">
                <td>${data.region}</td>
                <td><span class='badge badge-success'>0</span></td>
                <td>
                  <a href="{{ '/admin/region/delete/' }}" id="confirm" onclick="aksi(${data.id})" class="btn btn-sm btn-danger">Hapus</a>
                </td>
                </tr>`);
                $('#form-tambah-daerah').trigger('reset');
                $('#modal-tambah-daerah').modal('hide');
                swal({
                  title: 'Berhasil',
                  text: "Data Berhasil Ditambah",
                  icon: 'success',
                  buttons: false,
                  dangerMode: false,
                })
            }
        });
    });
});

function aksi(id){
      event.preventDefault();
      const url = document.getElementById('confirm').getAttribute('href') + id
      swal({
        title: 'Yaking ingin menghapus?',
        text: "Data akan dihapus permanen",
        icon: 'warning',
        buttons: true,
        dangerMode: false,
      }).then(function(result){
        if(result){
         $.ajax({
          data: id,
          url: url,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
           let row = $("#table-daerah > tbody > tr").attr("id");
           row = data;
           $("#"+row).remove();
            console.log(data, row);
            swal({
              title: 'Berhasil Menghapus',
              text: "Data Berhasil Dihapus",
              icon: 'success',
              buttons: false,
              dangerMode: false,
            })
          }
         });
        }
      });
    }
</script>
@endpush
