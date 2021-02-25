@extends('admin.layouts.master')

@section('title', 'Tambah Foto')
    
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
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
                      <h3 class="card-title">Tambah Foto</h3>
                    </div>
                    <form action="{{ '/admin/gallery/store' }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @error('image')
                            <div class="alert alert-danger">
                              {{ $message }}  
                           </div>                                    
                        @enderror
                      <div class="card-body">
                        <div class="form-group">
                          <label for="title">Judul</label>
                          <input type="text" name="judul" class="form-control" placeholder="Judul">
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div>
                          <input type="submit" value="Tambah" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </section>
</div>
@endsection

@push('js-page')
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>   
@endpush
