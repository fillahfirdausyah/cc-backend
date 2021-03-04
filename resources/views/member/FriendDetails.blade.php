@extends('member.layouts.detail')

@section('title', 'Detail Teman')
    

@section('content')
@foreach ($friends as $f)
 <!-- about author details start -->
 <div class="about-author-details">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="about-description" style="background-color: transparent">
                    <div class="tab-content">
                        <div class="card tab-pane fade active show" id="one">
                            <div class="work-zone">
                                <div class="author-desc-title d-flex justify-content-between align-items-center">
                                    <h6 class="author">{{ $f->name }}</h6>
                                </div>
                                <div class="conteiner">
                                    <div class="foto-profile">
                                        <h5 class="mb-2">Foto Profile</h5>
                                        <img src="{{ asset('image/Member/Profile/'.$f->profile->foto_profile) }}" class="rounded mx-auto d-block" alt="Foto Profile">
                                    </div>
                                    <hr>
                                    <div class="bio text-center">
                                        <h5>Bio</h5>
                                        <p>{{ $f->profile->bio }}</p>
                                    </div>
                                    <hr>
                                </div>
                                    <div class="section d-flex justify-content-around align-items-center">
                                        <div class="satu">
                                            <i class="fas fa-briefcase"></i>
                                            <h6>{{ $f->profile->pekerjaan }}</h6>
                                        </div>
                                        <div class="dua">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <h6>{{ $f->profile->alamat }}</h6>
                                        </div>
                                        <div class="tiga">
                                            <i class="far fa-heart"></i>
                                            <h6>{{ $f->profile->hobi }}</h6>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about author details start -->    
@endforeach
@endsection

@push('js-page')
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
<script>
$('#btn-iuran').click(function() {
  $('#add-iuran').modal('show');
})

$('#kategori').removeAttr('style')
$('.nice-select').hide()

$(document).ready(function () {
    bsCustomFileInput.init();
});


</script>
@endpush