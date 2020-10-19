@extends('admin.layouts.master')

@section('title', 'Berita')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $data->judul }}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="card mb-3">
            <div class="card-header">
              <h3>{{ $data->judul }}</h3>
            </div>
            <div class="card-body">
              <img class="card-img-top" src="{{ asset($data->cover) }}">
              
              <p class="card-text">{{ $data->content }}</p>
              <p class="card-text"><small class="text-muted">{{ $data->created_at->format('d F, Y') }}</small></p>
            </div>
          </div>
      </section>
</div>

    
@endsection