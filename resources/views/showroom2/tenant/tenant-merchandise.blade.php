@extends('showroom2.tenant.layouts.master')

@section('title', 'Tenant')

@section('content')
<!-- /.content-header -->
   @forelse($merchan as $item => $m)
    <div class="col-lg-4">
      <div class="card">
        <div class="trainer-item">
            <div class="image-thumb">
                <img src="{{ asset('image/Tenant/merchandise/'.$collectM[$item]) }}" width="100%" height="300">
            </div>
            <div class="card-body">
              <div class="down-content">

                <!-- Edit and Delete Button -->
                <div class="row justify-content-end">
                  <div>
                    <a href="{{ '/showroom/merchandise/edit/'.$m->id }}">
                      <button class="btn btn-success">Edit</button>
                    </a>
                  </div>
                  <form action="{{ '/showroom/merchandise/'.$m->id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                </div>

                  <a href="{{ '/showroom/merchandise/'.$m->id.'-'.$m->slug }}"><h4>{{ $m->nama_produk }}</h4></a>

                  <p>
                    <i class="fa fa-location-arrow"></i> {{ $m->region->region }} &nbsp;&nbsp;&nbsp;
                      <i class="fa fa-flag"></i> {{ $m->kategori }} &nbsp;&nbsp;&nbsp;
                      <i class="fa fa-plus"></i> {{ $m->kondisi }} &nbsp;&nbsp;&nbsp;
                  </p>
              </div>
            </div>
        </div>
      </div>
    </div>
    @empty
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6 align-self-center">
                <h3><i class="fa fa-dropbox fa-5x" aria-hidden="true"></i><em> Waduh Kosong Nih </em></h3>
            </div>
        </div>
    </div>
    @endforelse
<!-- End content -->
@endsection