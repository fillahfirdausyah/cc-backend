@extends('showroom2.tenant.layouts.master')

@section('title', 'Tenant')

@section('content')
<!-- /.content-header -->
@forelse($bengkel as $item => $b)

  <div class="col-lg-4">
    <div class="card">
      <div class="trainer-item">
          <div class="image-thumb">
              <img src="{{ asset('assets/vendor/showroom/assets/images/'.$collectB[$item]) }}" width="100%" height="300">
          </div>
          <div class="card-body">
            <div class="down-content">

              <!-- Edit and Delete button -->
              <div class="row justify-content-end">
                <div>
                  <a href="{{ '/showroom/autoshop/edit/'.$b->id }}">
                    <button class="btn-sm btn-primary mr-2">Edit</button>
                  </a>
                </div>
                <form action="{{ '/showroom/autoshop/'.$b->id }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn-sm btn-danger" value="Delete">
                </form>
              </div>

                <a href="{{ '/showroom/autoshop/'.$b->id.'-'.$b->slug }}"><h4>{{ $b->nama }}</h4></a>

                <p>
                    <i class="fa fa-location-arrow"></i> {{ $b->daerah->region }} &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$b->waktu_buka)->format('h:i A')}} -
                    {{\Carbon\Carbon::createFromFormat('H:i:s',$b->waktu_tutup)->format('h:i A')}} &nbsp;&nbsp;&nbsp;
                </p>
            </div>
          </div>
      </div>
    </div >
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