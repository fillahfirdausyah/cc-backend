@extends('member.layouts.master')

@section('title', 'Kartu Iuran')
    

@section('content')
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
                                    <h6 class="author">{{Auth::user()->name }}</h6>
                                    <button class="edit-btn" id="btn-iuran">Edit Profile</button>
                                </div>
                                <div class="conteiner">
                                    <div class="foto-profile">
                                        <h5 class="mb-2">Foto Profile</h5>
                                        <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_profile) }}" class="rounded mx-auto d-block" alt="">
                                    </div>
                                    <hr>
                                    <div class="bio text-center">
                                        <h5>Bio</h5>
                                        <p>{{ Auth::user()->profile->bio }}</p>
                                    </div>
                                    <hr>
                                </div>
                                    <div class="section d-flex justify-content-around align-items-center">
                                        <div class="satu">
                                            <i class="fas fa-briefcase"></i>
                                            <h6>{{ Auth::user()->profile->pekerjaan }}</h6>
                                        </div>
                                        <div class="dua">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <h6>{{ Auth::user()->profile->alamat }}</h6>
                                        </div>
                                        <div class="tiga">
                                            <i class="far fa-heart"></i>
                                            <h6>{{ Auth::user()->profile->hobi }}</h6>
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
<div class="modal fade" id="add-iuran" aria-labelledby="add-iuran">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ '/member/edit/profile/' }}{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="modal-body custom-scroll">
                <div class="form-group">
                <label for="bukti">Foto Profile</label>
                <div class="custom-file">
                    <input type="file" name="foto_profile" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih Foto</label>
                </div>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" id="name" name="name" class="form-control"  value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" id="username" name="username" class="form-control"  value="{{ Auth::user()->username }}" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" id="alamat" name="alamat" class="form-control"  value="{{ Auth::user()->profile->alamat }}">
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"  value="{{ Auth::user()->profile->pekerjaan }}">
                </div>
                <div class="form-group">
                  <label>Hobi</label>
                  <input type="text" id="hobi" name="hobi" class="form-control"  value="{{ Auth::user()->profile->hobi }}">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                  <button type="submit" class="post-share-btn" id="tombol-post">Simpan</button>
              </div>
         </form>
      </div>
  </div>
</div>
<!-- about author details start -->

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