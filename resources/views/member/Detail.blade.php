@extends('member.layouts.detail')


@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="widget-area profile-sidebar">
                    <!-- widget single item start -->
                    <div class="card widget-item">
                        <h4 class="widget-title">{{ $user->name }}</h4>
                        <div class="widget-body">
                            <div class="about-author">
                                <p>{{ $user->bio }}</p>
                                <ul class="author-into-list">
                                    <li><a href="#"><i class="bi bi-office-bag"></i>{{ $user->pekerjaan }}</a></li>
                                    {{-- <li><a href="#"><i class="bi bi-home"></i>Melbourne, Australia</a></li> --}}
                                    <li><a href="#"><i class="bi bi-location-pointer"></i>{{ $user->alamat }}</a></li>
                                    <li><a href="#"><i class="bi bi-heart-beat"></i>{{ $user->hobi }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- widget single item end -->
                </aside>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">
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
                                    <img src="{{ asset($user->foto_profile) }}" alt="profile picture">
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
                            <button class="post-meta-like">
                                <i class="bi bi-heart-beat"></i>
                                <span>You and 207 people like this</span>
                                <strong>207</strong>
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

    $('#modal').click(function() {
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
</script>
@endpush