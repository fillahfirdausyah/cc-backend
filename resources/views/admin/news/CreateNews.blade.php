@extends('admin.layouts.master')


@section('title', 'Tambah Berita')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Berita</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah Berita</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Data Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ '/admin/news/store' }}" method="POST">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" name="judul" id="judul" placeholder="Masukan Judul">
                               
                            </div>
                            <div class="form-group">
                              <label for="kategori">Kategori</label>
                              <input type="text" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" name="kategori" id="kategori" placeholder="Masukan Kategori">
                              
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" rows="3" name="content" placeholder="Masukan Content Berita"></textarea>
                                        
                                      </div>
                                </div>
                            </div>
                            
                      </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection