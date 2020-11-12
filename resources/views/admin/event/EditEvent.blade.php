@extends('admin.layouts.master')

@section('title', 'Edit Berita')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Berita</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Berita</li>
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
                        <form role="form" action="{{ '/admin/event/update/' }}{{ $data->id }}" method="POST">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ $data->judul, old('judul') }}" name="judul" id="judul" placeholder="Judul Event">
                                @error('judul')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control" rows="3" name="content" placeholder="Enter ...">
                                            {{ $data->content, old('content') }}
                                        </textarea>
                                        @error('content')
                                              <div class="alert alert-danger">
                                                {{ $message }}  
                                              </div>                                    
                                          @enderror
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