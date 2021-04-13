@extends('member.layouts.detail')


@section('title', 'Profile')

@section('content')
    @foreach ($friends as $f)
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="widget-area profile-sidebar">
                    <!-- widget single item start -->
                    <div class="card widget-item">
                        <h4 class="widget-title">{{ $f->name }}</h4>
                        <div class="widget-body">
                            <div class="about-author">
                                <p>{{ $f->profile->bio }}</p>
                                <ul class="author-into-list">
                                    <li><a href="#"><i class="bi bi-calendar"></i>{{ $f->nopung }}</a></li>
                                    <li><a href="#"><i class="bi bi-office-bag"></i>{{ $f->profile->pekerjaan }}</a></li>
                                    {{-- <li><a href="#"><i class="bi bi-home"></i>Melbourne, Australia</a></li> --}}
                                    <li><a href="#"><i class="bi bi-location-pointer"></i>{{ $f->profile->alamat }}</a></li>
                                    <li><a href="#"><i class="bi bi-heart-beat"></i>{{ $f->profile->hobi }}</a></li>
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
                                    <img src="{{ asset('image/Member/Profile/'.$f->profile->foto_profile) }}" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <!-- share content box start -->
                        <div class="share-content-box w-100">
                            <form class="share-text-box">
                                <textarea name="share" class="share-text-field" aria-disabled="true" readonly="true" placeholder="Katakan Sesuatu" id="modal-first"></textarea>
                                <a href="javascript:void(0)" class="btn-share">Share</a>
                            </form>
                        </div>
                        <!-- share content box end -->
                        <!-- Modal start -->
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
                @if ($p->foto == 'null')
                <!-- post status start -->
                <div class="card" id="card-post">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="{{ asset('image/Member/Profile/'.$f->profile->foto_profile) }}" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="profile.html">{{ $f->name }}</a></h6>
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
                                <strong class="countLike-{{ $p->id }}">{{ $like->where('post_id', $p->id)->count() }}</strong>
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
                @else 
                <div class="card">
                    <!-- post title start -->
                    <div class="post-title d-flex align-items-center">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="#">
                                <figure class="profile-thumb-middle">
                                    <img src="{{ asset('image/Member/Profile/'.$f->profile->foto_profile) }}" alt="profile picture">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <div class="posted-author">
                            <h6 class="author"><a href="{{ '/member/profile/' }}">{{ $p->user->name }}</a></h6>
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
                        <div class="post-thumb-gallery">
                            <figure class="post-thumb img-popup">
                                <a href="{{ asset('image/Member/Post/'.$p->foto) }}">
                                    <img src="{{ asset('image/Member/Post/'.$p->foto) }}" alt="post image">
                                </a>
                            </figure>
                        </div>
                        <div class="post-meta">
                            <button class="post-meta-like" data-postid="{{ $p->id }}">
                                <i class="bi bi-heart-beat"></i>
                                <span class="countLike-{{ $p->id }}">{{ $like->where('post_id', $p->id)->count() }}</span>
                                <strong class="countLike-{{ $p->id }}">{{ $like->where('post_id', $p->id)->count() }}</strong>
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
                @endif
                @endforeach
            </div>
        </div>{{-- End container --}}
    </div>
    {{-- End COntainer --}}
    @endforeach
    
@endsection

@push('js-page')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
<script>
     $(document).ready(function () {
        bsCustomFileInput.init();
    });

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

    // if($('#form-post').length > 0) {
    //     $('#post-content').validate({
    //     submitHandler: function (form) {
    //         let actionType = $('#tombol-post').val();
    //         $('#tombol-post').html('Memposting....');

    //         $.ajax({
    //             data: $('#post-content').serialize(),
    //             url:  '{{ '/member/post/store' }}',
    //             type: 'POST',
    //             dataType: 'json',
    //             success: function(data) {
    //                 $('#post-content').trigger('reset');
    //                 $('#form-post').modal('hide');
    //                 $('#tombol-post').html('Post');
    //                 location.reload();
    //             },
    //             error: function(data) {
    //                 console.log('Error: ', data);
    //             }
    //         });
    //     }
    // });
    // }

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