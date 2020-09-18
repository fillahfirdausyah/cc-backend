@extends('adminlte::page')

@section('title','Profile')

@section('content_header')
<h2>WELCOME</h2>

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1>List of Users</h1>
			<table class="table">
				<thead>
				    <tr>
				      <th scope="col">id</th>
				      <th scope="col">Nama</th>
				      <th scope="col">E-mail</th>
				      <th scope="col">Aksi</th>
				    </tr>
				</thead>
				@foreach($users as $u)
				<tbody>
					<tr>
				      <th scope="row">1</th>
				      <td>
				      	<span>{{ $u->name }}<br></span>
				      	<img src="{{url('public/image/'.$u->aset)}}">
				      </td>
				      <td>{{ $u->email }}</td>      
				      <td>
				      	<a href="{{ '/admin/user/edit/'.$u->id }}">Edit</a>
				      	<form method="post" action="{{ '/admin/user/delete/'.$u->id }}">
				      		@csrf
				      		<button>Delete</button>
				      	</form>
				      </td>
				    </tr>
				</tbody>		
			</table>
				@endforeach				
		</div>
	</div>
</div>
@stop

@section('css')
<!-- Put CSS here -->
@stop

@section('js')
<!-- Put JS script here -->
@stop