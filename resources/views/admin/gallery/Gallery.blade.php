@extends('admin.layouts.master')


@section('title', 'Gallery')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Gallery</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ '/admin/dashboard/' }}">Home</a></li>
                <li class="breadcrumb-item active">Galley</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header mb-2">
            <div class="card-title">
              Gallery Kegiatan Komunitas
            </div>
          </div>
          <a href="{{ '/admin/gallery/tambah' }}" class="btn btn-primary">Tambah Foto</a>
          <div class="card-body">
            <div class="row">
              @foreach($gallery as $g)
                <div class="col-sm-2">
                  <a href="{{ asset('image/Admin/Gallery/'.$g->gambar) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                    <img src="{{ asset('image/Admin/Gallery/'.$g->gambar) }}" class="img-fluid mb-2" alt="white sample"/>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
</div>
    
@endsection