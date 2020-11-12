@extends('member.layouts.master')

@section('title', 'Galery')

@section('content')
<!-- sendary menu start -->
<div class="menu-secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="secondary-menu-wrapper secondary-menu-2 bg-white">
                    <div class="page-title-inner">
                        <h4 class="page-title">photos (120)</h4>
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
                <div class="content-box">
                    <div class="content-body">
                        <div class="row mt--30 photo-filter">
                            {{-- <div class="col-sm-6 col-md-4 timeline upload folder">
                                <div class="photo-group active">
                                    <div class="gallery-toggle">
                                        <div class="gallery-overlay">
                                            <img src="{{ asset($user->foto_profile) }}" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">create folder</h3>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-6 col-md-4 folder">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="{{ asset($user->foto_profile) }}" alt="Photo Gallery">
                                            <img src="{{ asset($user->foto_profile) }}" alt="Photo Gallery">
                                            <img src="{{ asset($user->foto_profile) }}" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="{{ asset($user->foto_profile) }}" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Adda Timeline (79)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 upload">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-8.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-2.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-8.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Upload (134)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 folder">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-1.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-5.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-10.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-1.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Office Hangout (12)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 upload">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-2.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-8.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-11.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-2.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Dream Land (24)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 timeline">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-3.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-4.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-3.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Travel Zone (34)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 timeline">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-4.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-9.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-4.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Pure Nature (17)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 folder">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-5.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-7.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-2.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-5.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Family Tour (37)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 upload">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-5.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-8.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Chill Zone (06)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 folder">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-10.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-8.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-6.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-10.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Food Fun (21)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 upload">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-9.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-4.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-2.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-9.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Kitchen Cook (09)</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 timeline">
                                <div class="photo-group">
                                    <div class="gallery-toggle">
                                        <div class="d-none product-thumb-large-view">
                                            <img src="assets/images/photos/photo-11.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-7.jpg" alt="Photo Gallery">
                                            <img src="assets/images/photos/photo-1.jpg" alt="Photo Gallery">
                                        </div>
                                        <div class="gallery-overlay">
                                            <img src="assets/images/photos/photo-11.jpg" alt="Photo Gallery">
                                            <div class="view-icon"></div>
                                        </div>
                                        <div class="photo-gallery-caption">
                                            <h3 class="photos-caption">Gardening (05)</h3>
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