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
                                    <h6 class="author">Kartu Iuran</h6>
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
<!-- about author details start -->

@endsection