@extends('member.layouts.master')

@section('title', 'Kartu Iuran')
    

@section('content')
 <!-- about author details start -->
 <div class="about-author-details">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="about-description">
                    <div class="tab-content">
                        <div class="card tab-pane fade active show" id="one">
                            <div class="work-zone">
                                <div class="author-desc-title d-flex justify-content-between">
                                    <h6 class="author">Kartu Iuran</h6>
                                    <button class="edit-btn" id="btn-iuran">Tambah Iuran</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table m-0" id="table-daerah">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Member</th>
                                        <th>Jumlah</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                      </tr>
                                      </thead>
                                      @foreach ($iuran as $i)
                                      <tbody>
                                      <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $i->nama }}</td>
                                        <td>-Rp.@convert($i->jumlah)</td>
                                        <td>{{ $i->kategori }}</td>
                                        <td>{{ date('d F y',strtotime($i->created_at)) }}</td>
                                        @if ($i->status == 'Lunas')
                                        <td><span class="badge badge-success">{{ $i->status }}</span></td>
                                        @else
                                        <td><span class="badge badge-danger">{{ $i->status }}</span></td>
                                        @endif
                                      </tr>
                                    </tbody>
                                      @endforeach
                                    </table>
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
              <h5 class="modal-title">Tambah Iuran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ '/member/kartu/iuran/store/' }}{{ Auth::user()->region[0]->id }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="modal-body custom-scroll">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control"  value="{{ Auth::user()->name }}" readonly="true">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" id="email" name="email" class="form-control"  value="{{ Auth::user()->email }}" readonly="true">
                </div>
                <div class="form-group">
                  <label>Region</label>
                  <input type="text" id="region" name="region" class="form-control"  value="{{ Auth::user()->region[0]->region }}" readonly="true">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Rp..">
                </div>
                <div class="form-group">
                  <label for="region">Kategori</label>
                  <select name="kategori" class="form-control" id="kategori">
                    <option>Mingguan</option>
                    <option>Event</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="bukti">Bukti Transfer</label>
                  <div class="custom-file">
                    <input type="file" name="bukti" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                  <button type="submit" class="post-share-btn" id="tombol-post">tambah</button>
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