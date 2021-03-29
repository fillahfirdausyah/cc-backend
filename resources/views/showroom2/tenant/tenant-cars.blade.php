@extends('showroom2.tenant.layouts.master')

@section('title', 'Tenant')

@section('content')
<!-- /.content-header -->
    @forelse($SR as $item => $sr)
    <div class="col-lg-4">
      <div class="card">
        <div class="trainer-item">
            <div class="image-thumb">
                <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectCar[$item]) }}" height="400" width="100%">
            </div>
            <div class="card-body">
              <div class="down-content">

                <!-- Edit and Delete Button -->
                <div class="row justify-content-end">
                  <div>
                    <a href="{{ '/showroom/car/edit/'.$sr->id }}">
                      <button class="btn-sm btn-success">Edit</button>
                    </a>
                  </div>
                  <form action="{{ '/showroom/car/'.$sr->id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn-sm btn-danger" value="Delete">
                  </form>
                </div>

                  <a href="{{ '/showroom/car/'.$sr->id.'-'.$sr->slug }}"><h4>{{ $sr->judul }}</h4></a>

                  <p>
                    <i class="fa fa-car"></i> {{ $sr->kondisi }} &nbsp;&nbsp;&nbsp;
                      <i class="fa fa-cube"></i> {{ $sr->mesin }} cc &nbsp;&nbsp;&nbsp;
                      <i class="fa fa-cog"></i> {{ $sr->transmisi }} &nbsp;&nbsp;&nbsp;
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