<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/showroom/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/showroom/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/showroom/assets/css/style.css') }}">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/showroom" class="logo">CC<em> Showroom</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/showroom">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cars</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/showroom/cars">Cars</a>
                                    <a class="dropdown-item" href="/showroom/upload/car">Sell Car</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Others</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/showroom/autoshop">Autoshops</a>
                                    <a class="dropdown-item" href="/showroom/merchandise">Merchandise</a>
                                    <a class="dropdown-item" href="/showroom/wishlist">Wishlist & Bookmarks</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="faq.html">FAQ</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                    <a class="dropdown-item" href="contact.html">Contact</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i></a>
                                <div class="dropdown-menu mr-5">
                                    <div class="row">
                                        <div>
                                            <p class="dropdown-item active">{{
                                                Auth::user()->name
                                            }}<br>{{ Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="/tenant">Tenant</a>
                                    <a class="dropdown-item" href="/showroom/list/car">Your Cars</a>
                                    <a class="dropdown-item" href="">Website</a>
                                    <a class="dropdown-item" href="/member/home">Social Network</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                        </form> 
                                </div>
                            </li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div>
    @yield('content')
    </div>
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/showroom/assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/showroom/assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/showroom/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/vendor/showroom/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/showroom/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/showroom/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/showroom/assets/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/showroom/assets/js/mixitup.js') }}"></script> 
    <script src="{{ asset('assets/vendor/showroom/assets/js/accordions.js') }}"></script>
    
    <!-- Global Init -->
    <script src="{{ asset('assets/vendor/showroom/assets/js/custom.js') }}"></script>
    
    <script type="text/javascript">

    let slide = document.getElementById("slide-show");

    console.log(slide);

    slide.classList.add('active');

    //--- Start slideshow --------------------------------// 

    // var slideIndex = 1;
    // showSlides(slideIndex);

    // // Next/previous controls
    // function plusSlides(n) {
    //   showSlides(slideIndex += n);
    // }

    // // Thumbnail image controls
    // function currentSlide(n) {
    //   showSlides(slideIndex = n);
    // }

    // function showSlides(n) {
    //   var i;
    //   var slides = document.getElementsByClassName("mySlides");
    //   var dots = document.getElementsByClassName("dot");
    //   if (n > slides.length) {slideIndex = 1}
    //   if (n < 1) {slideIndex = slides.length}
    //   for (i = 0; i < slides.length; i++) {
    //       slides[i].style.display = "none";
    //   }
    //   for (i = 0; i < dots.length; i++) {
    //       dots[i].className = dots[i].className.replace(" active", "");
    //   }
    //   slides[slideIndex-1].style.display = "block";
    //   dots[slideIndex-1].class += " active";
    // }
    
    //--- End slideshow --------------------------------//

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function wishlist(){
        var user_id = $("#user_id").val();
        var produk_id = $("#produk_id").val();
        var jenis = $("#jenis").val();
        $.ajax({
          url:"/showroom/wishlist",
          method:"post",
          data:{ jenis:jenis, user_id:user_id , produk_id:produk_id},
          success: function(){
            $("#wishlist-button").css("display", "none");
          }
        });
    }

    function delete_wishlist(){
        var wishlist_id = $("#wishlist_id").val();
        $.ajax({
          url:"/showroom/wishlist",
          method:"delete",
          data:{ wishlist_id:wishlist_id},
          success: function(){
            $("#btn_delete_wishlist").css("display", "none");
          }
        });
    }

    </script>
  </body>
</html>