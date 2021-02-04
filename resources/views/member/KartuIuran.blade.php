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
                        <div class="tab-pane fade active show" id="one">
                            <div class="work-zone">
                                <div class="author-desc-title d-flex">
                                    <h6 class="author"><a href="profile.html">Kartu Iuran</a></h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table m-0" id="table-daerah">
                                      <thead>
                                      <tr>
                                        <th>Nama Region</th>
                                        <th>Anggota</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      {{-- @foreach ($region as $reg) --}}
                                      <tbody>
                                      <tr>
                                        <td>asdas</td>
                                        <td>asdasd</td>
                                        <td>asdsa</td>
                                      </tr>
                                    </tbody>
                                      {{-- @endforeach --}}
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
<!-- about author details start -->

@endsection