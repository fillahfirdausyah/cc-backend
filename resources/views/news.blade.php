@extends('layouts.master')

@push('css-asset')
    <link rel="stylesheet" href="{{ asset('assets/css/news.css') }}">
@endpush

@section('news-hero')
        <div class="row" id="news-hero">
            <div class="col-xl-9">
                <h3>{{ $news->judul }}</h3>
                <p>{{ date('d F y',strtotime($news->created_at)) }}</p>
                <div class="hero-img">
                    <img src="{{ asset($news->cover) }}" width="700">
                </div>
                <p>{{ $news->content }}</p>
            </div>
            <div class="col-xl-3">
                <div class="berita-lain">
                    <h3>Berita Lainya</h3>
                    @foreach ($random as $r)
                    <div class="kanan">
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ asset($r->cover) }}" class="mt-2" width="100" height="100" alt="">
                            </div>
                            <div class="col-7">
                                <a href="{{ '/news/' }}{{ $r->slug }}">{{ $r->judul }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection