@extends('member.layouts.detail')

@section('title', 'Galery')

@section('content')
<!-- sendary menu start -->
<div class="menu-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="secondary-menu-wrapper secondary-menu-2 bg-white">
                    <div class="page-title-inner">
                        <h4 class="page-title">Foto {{ $friends[0]->name }}</h4>
                    </div>
                    <div class="filter-menu">
                        <button class="active" data-filter="*">all</button>
                        <button data-filter=".timeline">timeline</button>
                        <button data-filter=".upload">upload</button>
                        <button data-filter=".folder">folder</button>
                    </div>
                    <div class="post-settings-bar">
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="post-settings arrow-shape">
                            <ul>
                                <li><button>edit profile</button></li>
                                <li><button>activity log</button></li>
                                <li><button>embed adda</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sendary menu end -->

<!-- photo section start -->
<div class="photo-section mt-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card content-box">
                    <div class="content-body">
                        <div class="row mt--30 photo-filter">
                            <div class="col-sm-6 col-md-4 timeline upload folder">
                                <div class="photo-group active">
                                    <div class="gallery-toggle">
                                        <div class="gallery-overlay">
                                            <img src="{{ asset('image/Member/Profile/'.$friends[0]->profile->foto_profile) }}" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">create folder</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 folder">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            @foreach ($gallery as $g)
                                            @if ($g->foto != 'null')
                                            <img src="{{ asset('image/Member/Post/'.$g->foto) }}" alt="Photo Gallery">
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="{{ asset('image/Member/Post/'.$g->foto) }}" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Upload {{ $g->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- photo section end -->
    
@endsection