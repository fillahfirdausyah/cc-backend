<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beranda</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico"> --}}

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/vendor/bootstrap.min.css') }}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/vendor/bicon.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/vendor/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/flaticon/flaticon.css') }}">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/plugins/plyr.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/plugins/slick.min.css') }}">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/plugins/nice-select.css') }}">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/plugins/perfect-scrollbar.css') }}">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/plugins/lightgallery.min.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adda/css/style.css') }}">

</head>
    <body>

    <!-- header area start -->
    <header>
        <div class="header-top sticky bg-white d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <!-- header top navigation start -->
                        <div class="header-top-navigation">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{ '/member/home/' }}">home</a></li>
                                    <li class="msg-trigger"><a class="msg-trigger-btn" href="#a">message</a>
                                        <div class="message-dropdown" id="a">
                                            <div class="dropdown-title">
                                                <p class="recent-msg">recent message</p>
                                                <div class="message-btn-group">
                                                    <button>New group</button>
                                                    <button>New Message</button>
                                                </div>
                                            </div>
                                            <ul class="dropdown-msg-list">
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-3.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content">
                                                        <h6 class="author"><a href="profile.html">Mili Raoulin</a></h6>
                                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>25 Apr 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-4.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content">
                                                        <h6 class="author"><a href="profile.html">Jhon Doe</a></h6>
                                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>15 May 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-5.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content">
                                                        <h6 class="author"><a href="profile.html">Jon Wileyam</a></h6>
                                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>20 Jun 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                            </ul>
                                            <div class="msg-dropdown-footer">
                                                <button>See all in messenger</button>
                                                <button>Mark All as Read</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="notification-trigger"><a class="msg-trigger-btn" href="#b">notification</a>
                                        <div class="message-dropdown" id="b">
                                            <div class="dropdown-title">
                                                <p class="recent-msg">Notification</p>
                                                <button>
                                                    <i class="flaticon-settings"></i>
                                                </button>
                                            </div>
                                            <ul class="dropdown-msg-list">
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-3.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content notification-content">
                                                        <a href="profile.html">Robert Faul</a>,
                                                        <a href="profile.html">william jhon</a>
                                                        <p>and 35 other people reacted to your photo</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>25 Apr 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-4.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content notification-content">
                                                        <a href="profile.html">Robert mushkil</a>,
                                                        <a href="profile.html">Terry jhon</a>
                                                        <p>and 20 other people reacted to your photo</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>20 May 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                                <li class="msg-list-item d-flex justify-content-between">
                                                    <!-- profile picture end -->
                                                    <div class="profile-thumb">
                                                        <figure class="profile-thumb-middle">
                                                            <img src="assets/images/profile/profile-small-6.jpg" alt="profile picture">
                                                        </figure>
                                                    </div>
                                                    <!-- profile picture end -->

                                                    <!-- message content start -->
                                                    <div class="msg-content notification-content">
                                                        <a href="profile.html">Horijon Mbala</a>,
                                                        <a href="profile.html">Bashu jhon</a>
                                                        <p>and 55 other people reacted to your post</p>
                                                    </div>
                                                    <!-- message content end -->

                                                    <!-- message time start -->
                                                    <div class="msg-time">
                                                        <p>15 Jan 2019</p>
                                                    </div>
                                                    <!-- message time end -->
                                                </li>
                                            </ul>
                                            <div class="msg-dropdown-footer">
                                                <button>See all in messenger</button>
                                                <button>Mark All as Read</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header top navigation start -->
                    </div>

                    <div class="col-md-2">
                        <!-- brand logo start -->
                        <div class="brand-logo text-center">
                            <a href="index.html">
                                {{-- <img src="assets/images/logo/logo.png" alt="brand logo"> --}}
                            </a>
                        </div>
                        <!-- brand logo end -->
                    </div>

                    <div class="col-md-5">
                        <div class="header-top-right d-flex align-items-center justify-content-end">
                            <!-- header top search start -->
                            <div class="header-top-search">
                                <form class="top-search-box">
                                    <input type="text" placeholder="Search" class="top-search-field">
                                    <button class="top-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <!-- header top search end -->

                            <!-- profile picture start -->
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_profile) }}" alt="profile picture">
                                        </figure>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name"><a href="#">{{ Auth::user()->name }}</a></h5>
                                            <a class="mail" href="#">{{ Auth::user()->email }}</a>
                                        </div>
                                        <div class="profile-body">
                                            <ul>
                                                @if (Auth::user()->role == 'admin')
                                                <li><a href="{{ '/dashboard' }}"><i class="flaticon-controls"></i>Admin Panel</a></li>
                                                @endif
                                                <li><a href="{{ '/showroom' }}"><i class="flaticon-car"></i>Showroom</a></li>
                                                <li><a href="{{ '/member/profile/' }}"><i class="flaticon-user"></i>Profile</a></li>
                                                <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                                <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                                            </ul>
                                            <ul>
                                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="flaticon-unlock"></i>Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                    </form> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- profile picture end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- header area start -->
    <header>
        <div class="mobile-header-wrapper sticky d-block d-lg-none">
            <div class="mobile-header position-relative ">
                <div class="mobile-menu w-100">
                    <ul>
                        <li>
                            <button class="notification request-trigger"><i class="flaticon-users"></i>
                                <span>03</span>
                            </button>
                            <ul class="frnd-request-list">
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-1.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-2.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="frnd-request-member">
                                        <figure class="request-thumb">
                                            <a href="profile.html">
                                                <img src="assets/images/profile/profile-midle-3.jpg" alt="proflie author">
                                            </a>
                                        </figure>
                                        <div class="frnd-content">
                                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                                            <p class="author-subtitle">Works at HasTech</p>
                                            <div class="request-btn-inner">
                                                <button class="frnd-btn">confirm</button>
                                                <button class="frnd-btn delete">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button class="notification"><i class="flaticon-notification"></i>
                                <span>03</span>
                            </button>
                        </li>
                        <li>
                            <button class="chat-trigger notification"><i class="flaticon-chats"></i>
                                <span>04</span>
                            </button>
                            <div class="mobile-chat-box">
                                <div class="live-chat-title">
                                    <!-- profile picture end -->
                                    <div class="profile-thumb">
                                        <a href="profile.html">
                                            <figure class="profile-thumb-small profile-active">
                                                <img src="assets/images/profile/profile-small-15.jpg" alt="profile picture">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- profile picture end -->
                                    <div class="posted-author">
                                        <h6 class="author"><a href="profile.html">Robart Marloyan</a></h6>
                                        <span class="active-pro">active now</span>
                                    </div>
                                    <div class="live-chat-settings ml-auto">
                                        <button class="chat-settings"><img src="assets/images/icons/settings.png" alt=""></button>
                                        <button class="close-btn"><img src="assets/images/icons/close.png" alt=""></button>
                                    </div>
                                </div>
                                <div class="message-list-inner">
                                    <ul class="message-list custom-scroll">
                                        <li class="text-friends">
                                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
                                            <div class="message-time">10 minute ago</div>
                                        </li>
                                        <li class="text-author">
                                            <p>Many desktop publishing packages and web page editors</p>
                                            <div class="message-time">5 minute ago</div>
                                        </li>
                                        <li class="text-friends">
                                            <p>packages and web page editors </p>
                                            <div class="message-time">2 minute ago</div>
                                        </li>
                                        <li class="text-friends">
                                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
                                            <div class="message-time">10 minute ago</div>
                                        </li>
                                        <li class="text-author">
                                            <p>Many desktop publishing packages and web page editors</p>
                                            <div class="message-time">5 minute ago</div>
                                        </li>
                                        <li class="text-friends">
                                            <p>packages and web page editors </p>
                                            <div class="message-time">2 minute ago</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="chat-text-field mob-text-box">
                                    <textarea class="live-chat-field custom-scroll" placeholder="Text Message"></textarea>
                                    <button class="chat-message-send" type="submit" value="submit">
                                        <img src="assets/images/icons/plane.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="search-trigger">
                                <i class="search-icon flaticon-search"></i>
                                <i class="close-icon flaticon-cross-out"></i>
                            </button>
                            <div class="mob-search-box">
                                <form class="mob-search-inner">
                                    <input type="text" placeholder="Search Here" class="mob-search-field">
                                    <button class="mob-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mobile-header-profile">
                    <!-- profile picture end -->
                    <div class="profile-thumb profile-setting-box">
                        <a href="javascript:void(0)" class="profile-triger">
                            <figure class="profile-thumb-middle">
                                <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_profile) }}" alt="profile picture">
                            </figure>
                        </a>
                        <div class="profile-dropdown text-left">
                            <div class="profile-head">
                                <h5 class="name"><a href="#">{{ Auth::user()->name }}</a></h5>
                                <a class="mail" href="#">{{ Auth::user()->email }}</a>
                            </div>
                            <div class="profile-body">
                                <ul>
                                    @if (Auth::user()->role == 'admin')
                                    <li><a href="{{ '/dashboard' }}"><i class="flaticon-controls"></i>Admin Panel</a></li>
                                    @endif
                                    <li><a href="{{ '/showroom' }}"><i class="flaticon-car"></i>Showroom</a></li>
                                    <li><a href="{{ '/member/profile/' }}"><i class="flaticon-user"></i>Profile</a></li>
                                    <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                    <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="flaticon-unlock"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                        </form> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- profile picture end -->
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <main>
        @if ($userRegion->count() <= 0)
             {{-- Modal Region --}}
        <div class="modal fade" id="modalRegion" aria-labelledby="add-iuran">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Region</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/member/daerah/new" method="post">
                      @csrf
                      <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                        <div class="modal-body custom-scroll">
                            <center>
                                <h2>Hallo Selamat Datang</h2>
                                <p>Anda belum memiliki region, silahkan pilih region anda terlebih dahulu</p>
                            </center>
                            <br>
                          <div class="form-group">
                            <select name="region" class="form-control" id="kategori">
                                @foreach($region as $r)
                                <option value="{{ $r->id }}">{{ $r->region }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                            <button type="submit" class="post-share-btn" id="tombol-post">tambah</button>
                        </div>
                   </form>
                </div>
            </div>
          </div>
        {{-- End Modal Region --}}
        @endif
        <div class="main-wrapper pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card card-profile widget-item p-0">
                                <div class="profile-banner">
                                    <figure class="profile-banner-small">
                                        <a href="{{ '/member/profile/' }}">
                                            <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_sampul) }}" alt="">
                                        </a>
                                        <a href="{{ '/member/profile/' }}" class="profile-thumb-2">
                                            <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_profile) }}" alt="">
                                        </a>
                                    </figure>
                                    <div class="profile-desc text-center">
                                        <h6 class="author"><a href="{{ '/member/profile/' }}">{{ Auth::user()->name }}</a></h6>
                                        <p>{{ Auth::user()->profile->bio }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- widget single item start -->

                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">latest news</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        @foreach ($news as $n)
                                        <li class="unorder-list">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb">
                                                <a href="#">
                                                    <figure class="profile-thumb-small">
                                                        <img src="{{ asset($n->cover) }}" alt="profile picture">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="#">{{ $n->judul }}</a></h3>
                                                <p class="list-subtitle">{{ \carbon\Carbon::parse($n->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        <!-- share box start -->
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{ asset('image/Member/Profile/'.Auth::user()->profile->foto_profile) }}" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    <form class="share-text-box">
                                        <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="Bagikan Sesuatu" id="modal-first"></textarea>
                                        <a href="javascript:void(0)" class="btn-share">Share</a>
                                    </form>
                                </div>
                                <!-- share content box end -->

                                <!-- Modal start -->
                                <div class="modal fade" id="form-post" aria-labelledby="form-post">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Bagikan Aktivitasmu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="post-content" method="POST" action="{{ '/member/post/store/' }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body custom-scroll">
                                                        <textarea name="content" class="share-field-big custom-scroll" placeholder="Katakan Sesuatu"></textarea>
                                                        <label for="bukti">Upload Foto</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                                                    <button type="submit" class="post-share-btn" id="tombol-post">post</button>
                                                </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </div>
                        </div>
                        <!-- share box end -->

                        @foreach ($post as $p)
                        @if ($p->foto == 'null')
                            {{-- {{ dd($u->profile->foto_profile) }} --}}
                        <!-- post status start -->
                        <div class="card">
                            <!-- post title start -->
                            <div class="post-title d-flex align-items-center">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{ asset('image/Member/Profile/'.$p->user->profile->foto_profile) }}" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <div class="posted-author">
                                    @if ($p->user->name == Auth::user()->name)
                                    <h6 class="author"><a href="{{ '/member/profile/' }}">{{ $p->user->name }}</a></h6>
                                    @else
                                    <h6 class="author"><a href="{{ '/member/profile/' }}{{ $p->user->username }}">{{ $p->user->name }}</a></h6>
                                    @endif
                                    <span class="post-time">{{ \carbon\Carbon::parse($p->created_at)->diffForHumans() }}</span>
                                </div>

                                <div class="post-settings-bar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="post-settings arrow-shape">
                                        <ul>
                                            <li><button>copy link to adda</button></li>
                                            <li><button>edit post</button></li>
                                            <li><button>embed adda</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- post title start -->
                            <div class="post-content">
                                <p class="post-desc">
                                    {{ $p->content }}
                                </p>
                                {{-- <div class="post-thumb-gallery">
                                    <figure class="post-thumb img-popup">
                                        <a href="assets/images/post/post-large-1.jpg">
                                            <img src="assets/images/post/post-1.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div> --}}
                                <div class="post-meta">
                                    <button class="post-meta-like">
                                        <i class="bi bi-heart-beat"></i>
                                        <span>You and 201 people like this</span>
                                        <strong>201</strong>
                                    </button>
                                    <ul class="comment-share-meta">
                                        <li>
                                            <button class="post-comment">
                                                <i class="bi bi-chat-bubble"></i>
                                                <span>41</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="post-share">
                                                <i class="bi bi-share"></i>
                                                <span>07</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- post status end -->
                        @else
                        <!-- post status start -->
                        <div class="card">
                            <!-- post title start -->
                            <div class="post-title d-flex align-items-center">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                            <img src="{{ asset('image/Member/Profile/'.$p->user->profile->foto_profile) }}" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <div class="posted-author">
                                    @if ($p->user->name == Auth::user()->name)
                                    <h6 class="author"><a href="{{ '/member/profile/' }}">{{ $p->user->name }}</a></h6>
                                    @else
                                    <h6 class="author"><a href="{{ '/member/profile/' }}{{ $p->user->username }}">{{ $p->user->name }}</a></h6>
                                    @endif
                                    <span class="post-time">{{ \carbon\Carbon::parse($p->created_at)->diffForHumans() }}</span>
                                </div>

                                <div class="post-settings-bar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="post-settings arrow-shape">
                                        <ul>
                                            <li><button>copy link to adda</button></li>
                                            <li><button>edit post</button></li>
                                            <li><button>embed adda</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- post title start -->
                            <div class="post-content">
                                <p class="post-desc">
                                    {{ $p->content }}
                                </p>
                                <div class="post-thumb-gallery">
                                    <figure class="post-thumb img-popup">
                                        <a href="{{ asset('image/Member/Post/'.$p->foto) }}">
                                            <img src="{{ asset('image/Member/Post/'.$p->foto) }}" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                                <div class="post-meta">
                                    <button class="post-meta-like">
                                        <i class="bi bi-heart-beat"></i>
                                        <span>You and 201 people like this</span>
                                        <strong>201</strong>
                                    </button>
                                    <ul class="comment-share-meta">
                                        <li>
                                            <button class="post-comment">
                                                <i class="bi bi-chat-bubble"></i>
                                                <span>41</span>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="post-share">
                                                <i class="bi bi-share"></i>
                                                <span>07</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- post status end -->
                        @endif
                        @endforeach
                    </div>

                    <div class="col-lg-3 order-3">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Daerah</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        @foreach ($userRegion as $r)
                                        <li class="unorder-list">
                                            <div class="unorder-list-info">
                                                <h3 class="list-title"><a href="" class="region-friend" data-regid={{ $r->id }}>{{ $r->region }}</a></h3>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Friends Zone</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper teman">
                                    </ul>
                                </div>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->

 <!-- Modernizer JS -->
 <script src="{{ asset('assets/vendor/adda/js/vendor/modernizr-3.6.0.min.js') }}"></script>
 <!-- jQuery JS -->
 <script src="{{ asset('assets/vendor/adda/js/vendor/jquery-3.3.1.min.js') }}"></script>
 <!-- Popper JS -->
 <script src="{{ asset('assets/vendor/adda/js/vendor/popper.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- Slick Slider JS -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/slick.min.js') }}"></script>
 <!-- nice select JS -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/nice-select.min.js') }}"></script>
 <!-- audio video player JS -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/plyr.min.js') }}"></script>
 <!-- perfect scrollbar js -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/perfect-scrollbar.min.js') }}"></script>
 <!-- light gallery js -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/lightgallery-all.min.js') }}"></script>
 <!-- image loaded js -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
 <!-- isotope filter js -->
 <script src="{{ asset('assets/vendor/adda/js/plugins/isotope.pkgd.min.js') }}"></script>
 <!-- Main JS -->
 <script src="{{ asset('assets/vendor/adda/js/main.js') }}"></script>   
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
 {{-- Costume File --}}
 <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
<script>
$(document).ready(function () {
    // $('#modalRegion').modal('show')

    $('#kategori').removeAttr('style')
    $('.nice-select').hide()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

    $('#modal-first').click(function() {
        $('#form-post').modal('show');
    });

    $('.region-friend').on('click', function(event) {
        event.preventDefault();
        const regId = event.target.dataset['regid'];

        $.ajax({
            type: 'GET',
            url: '{{ '/member/teman/' }}' + regId,
            success: function(data) {
                $('.teman').html("");
                $.each(data, function(key, val) {
                    let time = val.last_seen;
                    let userID = val.id;
                    console.log(val);
                    $('.teman').append(`
                        <li class="unorder-list">
                            <!-- profile picture end -->
                            <div class="profile-thumb">
                                <a href="/member/profile/${val.username}">
                                    <figure class="profile-thumb-small">
                                        <img src="{{ asset('image/Member/Profile/') }}/${val.profile.foto_profile}" alt="profile picture">
                                    </figure>
                                </a>
                            </div>
                            <!-- profile picture end -->

                            <div class="unorder-list-info">
                                <h3 class="list-title"><a href="/member/profile/${val.username}">${val.name}</a></h3>
                            </div>
                        </li>
                    `)
                })
            }
        });
    });

   

    // if($('#form-post').length > 0) {
    //     $('#post-content').validate({
    //         submitHandler: function (form) {
    //             let actionType = $('#tombol-post').val();
    //             $('#tombol-post').html('Memposting....');
    //             // let file = new FormData()
    //             $.ajax({
    //                 data: $('#post-content').serialize(),
    //                 url:  '{{ '/member/post/store' }}',
    //                 type: 'POST',
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     $('#post-content').trigger('reset');
    //                     $('#form-post').modal('hide');
    //                     $('#tombol-post').html('Post');
    //                     location.reload();
    //                 },
    //                 error: function(data) {
    //                     console.log('Error: ', data);
    //                 }
    //             });
    //         }
    //     });
    // }

    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

</body>

</html>