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
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="kategori">Kategori</label>
                                  <input type="text" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" name="kategori" id="kategori" placeholder="Masukan Kategori">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="card card-outline card-info">
                                    <div class="card-header">
                                      <h3 class="card-title">
                                        Bootstrap WYSIHTML5
                                        <small>Simple and cepat</small>
                                      </h3>
                                      <!-- tools box -->
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                          <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                title="Remove">
                                          <i class="fas fa-times"></i></button>
                                      </div>
                                      <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pad">
                                      <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here" name="content"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                      </div>
                                    </div>
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

@push('js-asset')
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@push('js-page')
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush