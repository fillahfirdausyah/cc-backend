@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Berita') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ '/admin/updatenews/'.$news->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('JUDUL') }}</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" name="judul" value="{{ $news->judul }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('CONTENT') }}</label>

                            <div class="col-md-6">
                                <textarea name="content" cols="60" rows="20" value="{{ $news->content}}"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('TANGGAL') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" name="tanggal" value="{{$news->tanggal}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aset" class="col-md-4 col-form-label text-md-right">{{ __('ASET') }}</label>

                            <div class="col-md-6">
                                <input id="aset" type="file" name="aset" value="{{ $news->aset }}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif