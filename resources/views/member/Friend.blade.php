@extends('member.layouts.master')

@section('title', 'Teman')

@section('content')
<!-- sendary menu start -->
<div class="menu-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="secondary-menu-wrapper secondary-menu-2 bg-white">
                    <div class="page-title-inner">
                        <h4 class="page-title">member ({{ $friends->count() }})</h4>
                    </div>
                    <div class="filter-menu">
                        <button class="active" data-filter="*">all</button>
                        <button data-filter=".recently">recently</button>
                        <button data-filter=".relative">relative</button>
                        <button data-filter=".collage">collage</button>
                        <button data-filter=".request">request</button>
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
<div class="friends-section mt-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-box friends-zone">
                    @php $users = DB::table('users')->get(); @endphp
                    <div class="row mt--20 friends-list">
                        @foreach ($friends as $f)
                        <div class="col-lg-3 col-sm-6 recently request">
                            <div class="friend-list-view">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{ $f->foto_profile }}" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <div class="posted-author">
                                    <h6 class="author"><a href="{{ '/member/' }}{{ $f->username }}">{{ $f->name }}</a></h6>
                                    @if(Cache::has('is_online' . $f->id))
                                        <p style="color: green;">Online</p>
                                    @else
                                        <p>Offline</p>
                                        {{ \Carbon\Carbon::parse($f->last_seen)->diffForHumans() }}
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- photo section end -->    
@endsection