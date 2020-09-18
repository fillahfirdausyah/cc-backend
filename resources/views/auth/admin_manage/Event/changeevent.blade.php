@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Event') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ '/admin/event/update/'.$event->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('JUDUL') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" name="judul" value="{{ $event->judul }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('CONTENT') }}</label>

                            <div class="col-md-6">
                                <textarea name="content" cols="60" rows="20" value="{{ $event->content}}"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('TANGGAL') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" name="tanggal" value="{{$event->tanggal}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aset" class="col-md-4 col-form-label text-md-right">{{ __('GAMBAR') }}</label>

                            <div class="col-md-6">
                                <input id="aset" type="file" name="aset" value="{{ $event->aset }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>                        
                    </form>
                    <a href="{{route('showEvent')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>