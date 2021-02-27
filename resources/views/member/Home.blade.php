@extends('member.layouts.master')


@section('title', 'Home')

@section('content')
    <!-- Region if the user is a new member -->
    @if($userRegion->count() <= 0)
        <div class="row mb-2 mt-2 justify-content-center">
            <div class="col-4 p-2 border border-info">
            <p class="text-center">Click <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalPUregion"> Choose Region </button> before you get started</p>
            </div>
        </div>
    @endif
    <div class="modal fade" tabindex="-1" role="dialog" id="modalPUregion">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center">Welcome</h4>
          </div>
          <form action="/member/daerah/new" method="post">
            @csrf
          <div class="modal-body">
            <p class="text-center">Please choose your region</p>
            <div class="row justify-content-center">
                <input type="hidden" name="uid" value="{{ $user->id }}">
                <div class="col-6 input-group mb-3 justify-content-center">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Region</label>
                    </div>
                    <select name="region" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        @foreach($region as $r)
                        <option value="{{ $r->id }}">{{ $r->region }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="col-2 btn ml-3 border" data-dismiss="modal">Close</button>
            <input type="submit" class="col-2 btn mr-3 border" value="Save">
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Region if the user is a new member end  -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="widget-area profile-sidebar">
                    <!-- widget single item start -->
                    <div class="card widget-item">
                        <h4 class="widget-title">{{ $user->name }}</h4>
                        <div class="widget-body">
                            <div class="about-author">
                                <p>{{ $user->profile->bio }}</p>
                                <ul class="author-into-list">
                                    <li><a href="#"><i class="bi bi-office-bag"></i>{{ $user->profile->pekerjaan }}</a></li>
                                    {{-- <li><a href="#"><i class="bi bi-home"></i>Melbourne, Australia</a></li> --}}
                                    <li><a href="#"><i class="bi bi-location-pointer"></i>{{ $user->profile->alamat }}</a></li>
                                    <li><a href="#"><i class="bi bi-heart-beat"></i>{{ $user->profile->hobi }}</a></li>
                                </ul>
                            </div>
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
                                    <img src="{{ $user->profile->foto_profile }}" alt="profile picture">
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
                        {{-- Post --}}
                        <div class="modal fade" id="form-post" aria-labelledby="form-post">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Bagikan Aktivitasmu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="post-content" method="POST">
                                        <div class="modal-body custom-scroll">
                                                <textarea name="content" class="share-field-big custom-scroll" placeholder="Katakan Sesuatu"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                                            <button type="submit" class="post-share-btn" id="tombol-post">post</button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        {{-- Edit --}}
                        {{-- <div class="modal fade" id="edit-post" aria-labelledby="form-post">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Postingan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="edit-content" action="{{ '/member/post/' }}{{ $p->id }}" method="POST">
                                        <div class="modal-body custom-scroll">
                                                <textarea id="content-edit" name="content" class="share-field-big custom-scroll" placeholder="Katakan Sesuatu"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="post-share-btn" data-dismiss="modal">cancel</button>
                                            <button type="submit" class="post-share-btn" id="tombol-post">Edit</button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Modal end -->
                    </div>
                </div>
                <!-- share box end -->
                @foreach ($post as $p)
                <!-- post status start -->
                <div class="card" id="card-post">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="{{ asset($user->profile->foto_profile) }}" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">{{ $user->name }}</a></h6>
                            <span class="post-time">{{ \carbon\Carbon::parse($p->created_at)->diffForHumans() }}</span>
                        </div>

                        <div class="post-settings-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                            <div class="post-settings arrow-shape">
                                <ul>
                                    <li><button>Copy link post</button></li>
                                    <li><button onclick="editPost({{ $p->id }})">edit post</button></li>
                                    <li><button onclick="hapusPost({{ $p->id }})">Hapus</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- post title start -->
                    <div class="post-content">
                        <p class="post-desc">
                            {{ $p->content }}
                        </p>
                        <div class="post-meta">
                            <button class="post-meta-like" data-postid="{{ $p->id }}">
                                <i class="bi bi-heart-beat"></i>
                                <span class="countLike-{{ $p->id }}">{{ $like->where('post_id', $p->id)->count() }}</span>
                                <strong>207</strong>
                            </button>
                            <ul class="comment-share-meta">
                                <li>
                                    <button class="post-comment">
                                        <i class="bi bi-chat-bubble"></i>
                                        <span>{{ $p->comments->count() }}</span>
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
                    {{-- <div class="row">
                        <form action="/post/comment" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $p->id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <label for="komen">Komen</label>
                            <input type="text" name="comment" id="komen">
                            <input type="submit" name="" value="kirim">
                        </form>
                    </div> --}}
                    {{-- @foreach($p->comments as $c)
                        @foreach($c->user as $u)
                            <div class="row mt-2 mb-2 border rounded-top p-1">
                                <h6 class="author"><a href="">{{ $u->name }}</a></h6>
                                <div class="post-content">
                                    <p class="post-desc">{{ $c->comment }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <form action="{{'/post/comment/delete/'}}{{$c->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" name="" value="Hapus">
                                </form>
                            </div>
                            <div class="row mt-2 mb-2">
                            <form action="/post/comment" method="post">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $p->id }}">
                                <input type="hidden" name="parent_id" value="{{ $c->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <label for="komen">Balas</label>
                                <input type="text" name="comment" id="komen">
                                <input type="submit" name="" value="kirim">
                            </form>
                            </div>
                        @endforeach
                    @endforeach --}}
                </div>
                <!-- post status end -->
                @endforeach
                {{-- <div class="post-thumb-gallery img-gallery">
                    <div class="row no-gutters">
                        <div class="col-8">
                            <figure class="post-thumb">
                                <a class="gallery-selector" href="assets/images/post/post-large-2.jpg">
                                    <img src="assets/images/post/post-2.jpg" alt="post image">
                                </a>
                            </figure>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <figure class="post-thumb">
                                        <a class="gallery-selector" href="assets/images/post/post-large-3.jpg">
                                            <img src="assets/images/post/post-3.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-12">
                                    <figure class="post-thumb">
                                        <a class="gallery-selector" href="assets/images/post/post-large-4.jpg">
                                            <img src="assets/images/post/post-4.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-12">
                                    <figure class="post-thumb">
                                        <a class="gallery-selector" href="assets/images/post/post-large-5.jpg">
                                            <img src="assets/images/post/post-5.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="{{ asset($user->foto_profile) }}" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">Jon Wileyam</a></h6>
                            <span class="post-time">15 min ago</span>
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
                        <p class="post-desc pb-0">
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for
                        </p>
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

                <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="assets/images/profile/profile-small-4.jpg" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">william henry</a></h6>
                            <span class="post-time">35 min ago</span>
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
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                            in their infancy.
                        </p>
                        <div class="plyr__video-embed plyr-video">
                            <iframe src="https://www.youtube.com/embed/WeA7edXsU40" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

                <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="assets/images/profile/profile-small-8.jpg" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">Mili Raoulin</a></h6>
                            <span class="post-time">50 min ago</span>
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
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                            in their infancy.
                        </p>
                        <div class="post-thumb-gallery img-gallery">
                            <div class="row no-gutters">
                                <div class="col-6">
                                    <figure class="post-thumb">
                                        <a class="gallery-selector" href="assets/images/post/post-large-6.jpg">
                                            <img src="assets/images/post/post-6.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-6">
                                    <figure class="post-thumb">
                                        <a class="gallery-selector" href="assets/images/post/post-large-7.jpg">
                                            <img src="assets/images/post/post-7.jpg" alt="post image">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="post-meta">
                            <button class="post-meta-like">
                                <i class="bi bi-heart-beat"></i>
                                <span>You and 230 people like this</span>
                                <strong>230</strong>
                            </button>
                            <ul class="comment-share-meta">
                                <li>
                                    <button class="post-comment">
                                        <i class="bi bi-chat-bubble"></i>
                                        <span>65</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="post-share">
                                        <i class="bi bi-share"></i>
                                        <span>04</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- post status end -->

                <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="assets/images/profile/profile-small-6.jpg" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">Robart Faul</a></h6>
                            <span class="post-time">40 min ago</span>
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
                        <p class="post-desc pb-0">
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for Many desktop publishing packages and web page
                            editors now use Lorem Ipsum as their default model text, and a search for Many
                            desktop publishing duskam azer.
                        </p>
                        <div class="post-meta">
                            <button class="post-meta-like">
                                <i class="bi bi-heart-beat"></i>
                                <span>You and 250 people like this</span>
                                <strong>250</strong>
                            </button>
                            <ul class="comment-share-meta">
                                <li>
                                    <button class="post-comment">
                                        <i class="bi bi-chat-bubble"></i>
                                        <span>80</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="post-share">
                                        <i class="bi bi-share"></i>
                                        <span>10</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- post status end -->

                <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="assets/images/profile/profile-small-2.jpg" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">merry watson</a></h6>
                            <span class="post-time">20 min ago</span>
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
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for 'lorem ipsum' will uncover many web sites still
                            in their infancy.
                        </p>
                        <div class="post-thumb-gallery">
                            <figure class="post-thumb img-popup">
                                <a href="assets/images/post/post-large-1.jpg">
                                    <img src="assets/images/post/post-1.jpg" alt="post image">
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

                <!-- post status start -->
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="assets/images/profile/profile-small-3.jpg" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">Jon Wileyam</a></h6>
                            <span class="post-time">15 min ago</span>
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
                        <p class="post-desc pb-0">
                            Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                            default model text, and a search for
                        </p>
                        <div class="post-meta">
                            <button class="post-meta-like">
                                <i class="bi bi-heart-beat"></i>
                                <span>You and 204 people like this</span>
                                <strong>204</strong>
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
                <!-- post status end --> --}}
            </div>
        </div>{{-- End container --}}
    </div>{{-- End COntainer --}}
    
@endsection

@push('js-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

    $('#modal-first').click(function() {
        $('#form-post').modal('show');
    });

    if($('#form-post').length > 0) {
        $('#post-content').validate({
        submitHandler: function (form) {
            let actionType = $('#tombol-post').val();
            $('#tombol-post').html('Memposting....');

            $.ajax({
                data: $('#post-content').serialize(),
                url:  '{{ '/member/post/store' }}',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    $('#post-content').trigger('reset');
                    $('#form-post').modal('hide');
                    $('#tombol-post').html('Post');
                    location.reload();
                },
                error: function(data) {
                    console.log('Error: ', data);
                }
            });
        }
    });
    }

    function hapusPost(id) {

        $.ajax({
            url: '{{ '/member/post/delete/' }}' + id,
            type: 'GET',
            success: function(data) {
                console.log('berhasil');
                location.reload();
            }
        })
    }

    function editPost(id) {
        $.ajax({
            url: '{{ '/member/post/edit/' }}' + id,
            type: 'GET',
            success: function(data) {
                $('#edit-post').modal('show');
                $('#content-edit').html(data.content);
            }
        });

        return id;
    }

    $('.post-meta-like').on('click', function(event) {
        event.preventDefault();
        const postId = event.target.parentNode.dataset['postid'];

        $.ajax({
            type: 'POST',
            url: '{{ '/member/post/like/' }}' + postId,
            success: function(data) {
                // console.log(data);
                $('.countLike-' + postId).html(data);
            }
        });
    });
</script>
@endpush