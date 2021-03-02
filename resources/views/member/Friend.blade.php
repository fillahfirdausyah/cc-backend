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
                        @foreach($userRegion as $ur)
                        @if($loop->index <= 4)
                        <a class="ml-2 mr-3" href="{{'/member/teman/'}}{{$ur->id}}"><button>{{ $ur->region }}</button></a>
                        @endif
                        @endforeach
                    </div>
                    <div class="post-settings-bar">
                        <div class="post-settings arrow-shape">
                            <ul>
                            @foreach($userRegion as $ur)
                            @if($loop->index > 4)
                                <li><a class="ml-2 mr-3" href="{{'/member/teman/'}}{{$ur->id}}"><button>{{ $ur->region }}</button></a></li>
                            @endif
                            @endforeach
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
                    <div class="row mt--20 friends-list just">
                    <!-- start friend -->
                    @php $users = DB::table('users')->get(); @endphp
                        @foreach ($friends as $f)
                        <div class="col-lg-3 col-sm-6 recently request">
                            <div class="friend-list-view">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{ $f->profile->foto_profile }}" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->
                                <div class="posted-author">
                                    <h6 class="author"><a href="{{ '/member/details/' }}{{ $f->username }}">{{ $f->name }}</a></h6>
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
                        <!-- endfriend -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- photo section end -->    
@endsection