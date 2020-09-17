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
                          <th><img width="150px" src="{{url('public/image/'.$berita->aset)}}"></th>
                          <td>{{ $berita->content }}</td>
                          <td>{{ $berita->tanggal }}</td>
                          <td>
                              <a href="{{'/editnews/'.$berita->id}}">Edit</a>
                              <form action="{{'/deletenews/'.$berita->id}}" method="POST">
                                @csrf
                                <button type="submit">Hapus</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </table>
                  <a href="{{route('storePage')}}">Tambah berita</a>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


