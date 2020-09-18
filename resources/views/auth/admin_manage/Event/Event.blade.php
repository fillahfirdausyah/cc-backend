@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EVENT') }}</div>
                    <div class="card-body">
                  <table>
                      @foreach($event as $e)
                      <tr>
                          <th>{{ $e->judul }}</th>
                          <th><img width="150px" src="{{url('public/image/'.$e->aset)}}"></th>
                          <td>{{ $e->content }}</td>
                          <td>{{ $e->tanggal }}</td>
                          <td>
                              <a href="{{'/admin/event/edit/'.$e->id}}">Edit</a>
                               <form action="{{'/admin/event/delete/'.$e->id}}" method="POST"> 
                                 @csrf 
                                 <button type="submit">Hapus</button> 
                               </form> 
                          </td>
                      </tr>
                      @endforeach
                  </table>
                  <a href="{{route('storePageEvent')}}">Tambah Event</a>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


