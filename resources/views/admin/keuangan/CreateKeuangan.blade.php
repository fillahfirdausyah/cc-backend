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
                      <h3 class="card-title">Catan Keuangan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ '/admin/keuangan/store' }}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="member">Nama</label>
                          <input type="text" class="form-control" id="member" name="nama" placeholder="Nama member">
                        </div>
                        <div class="form-group">
                          <label for="jumalah">Jumlah</label>
                          <input type="number" class="form-control" name="jumlah" id="jumalah" placeholder="Rp..">
                        </div>
                        <div class="form-group">
                            <label>Region</label>
                            <select name="region" class="form-control">
                              @foreach ($region as $reg)
                                  <option value="{{ $reg->id }}">{{ $reg->region }}</option>
                              @endforeach
                            </select>
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
@endsection