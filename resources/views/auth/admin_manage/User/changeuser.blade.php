@extends('adminlte::page')

@section('title','Profile')

@section('content_header')
<h2>EDIT</h2>

@section('content')
<div class="content">
	<div class="row justify-content-center">
		<div class="col-md-8">			
			<form method="POST" action="{{ '/admin/user/update/'.$users->id}}" enctype="multipart/form-data">
				@csrf
				
                <!-- Nama -->
				<div class="form-group row">
                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('NAMA') }}</label>

                    <div class="col-md-6">
                        <input id="nama" type="text" name="nama"class="form-control @error('nama') is-invalid @enderror" value="{{ $users->name }}" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" name="nama" class="form-control @error('email') is-invalid @enderror" value="{{ $users->email }}" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                    <div class="col-md-6">
                        <input id="role" type="role" name="nama" class="form-control @error('role') is-invalid @enderror" value="{{ $users->role }}" autofocus>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- input gambar -->
                <div class="form-group mb-3">
                    <label for="aset" class="col-md-4 col-form-label text-md-right">Foto</label>

                    <div class="col-md-6">
                        <input type="file" name="aset" id="aset" name="aset" class="">
                    </div>
                </div>

                <!-- submit form -->
				<div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Daftar') }}
                        </button>
                    </div>
                </div>
			</form>
            <a href="/admin/user">Kembali</a>	
		</div>
	</div>
</div>
@stop
