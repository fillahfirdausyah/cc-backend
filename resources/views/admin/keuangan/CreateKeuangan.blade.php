@extends('admin.layouts.master')

@section('title', 'Tambah Iuran')
    
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
                      <h3 class="card-title">Catatan Keuangan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ '/admin/keuangan/store' }}" method="POST">
                      @csrf
                      <div class="card-body">
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
                            <label>Nama</label>
                            <select name="nama" id="pilihan_nama" class="form-control" onchange="getEmail()">
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" id="email" name="email" class="form-control" placeholder="Email" readonly="true">
                      </div>
                        <div class="form-group">
                          <label for="jumalah">Jumlah</label>
                          <input type="number" class="form-control" name="jumlah" id="jumalah" placeholder="Rp..">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                              <option>Mingguan</option>
                              <option>Event</option>
                            </select>
                        </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
<script>
  function filter_nama(){
    let region_id = $('#daerah').children("option:selected").val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url:'/admin/keuangan/nama/',
        type: 'post',
        data: {id: region_id },
        dataType: "json",
        success: function(response){
          $('#pilihan_nama').html(response);
        }
      });
  }

  function getEmail() {

    let userID = $('#pilihan_nama').children("option:selected").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $.ajax({
        url:'/admin/keuangan/getemail/',
        type: 'post',
        data: {id: userID },
        dataType: "json",
        success: function(response){
          $('#email').val(response);
        }
      });
  }
</script>
@endpush