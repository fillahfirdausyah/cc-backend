@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BERITA') }}</div>
                    <div class="card-body">
                  <table>
                      @foreach($news as $berita)
                      <tr>
                          <th>{{ $berita->judul }}</th>
                          <th>{{ $berita->aset }}</th>
                      </tr>
                      <tr>
                          <td>{{ $berita->content }}</td>
                      </tr>
                      <tr>
                          <td>{{ $berita->tanggal }}</td>
                      </tr>
                      @endforeach
                  </table>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


