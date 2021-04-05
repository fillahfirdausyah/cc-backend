<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth_id" content="{{ Auth::id() }}">
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
                            <li><a href="/showroom"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li><a href="/showroom/cars"><i class="fa fa-car" aria-hidden="true"></i> Cars</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i> Others</a>
                              
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
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i></a>
                                <div class="dropdown-menu mr-5">
                                    <a class="dropdown-item">Notifikasi 1</a>
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
                                    <a class="dropdown-item" href="/showroom/transaction">Transaction</a>
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

    @stack('js')
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

    <!-- pusher -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    
    <!-- Global Init -->
    <script src="{{ asset('assets/vendor/showroom/assets/js/custom.js') }}"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    Pusher.logToConsole = true;
    var id = document.querySelector('meta[name="auth_id"]').content;

    var pusher = new Pusher('056152f21466ab3e8829', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('notif-buyer'+id);
    channel.bind('Notif-Buyer', function(data) {
      alert(JSON.stringify(data));
    });

    var channel = pusher.subscribe('notif-seller'+id);
    channel.bind('Notif-Seller', function(data) {
      alert(JSON.stringify(data));
    });

    function interest(){
        document.getElementById('buy').style.display = 'block';
        document.getElementById('interest').style.display = 'none';
    }

    function upload(id){
        var i = id;
        document.getElementById('bt-'+i).style.display = 'block';
        document.getElementById('upload-'+i).style.display = 'none';
    }


    function myFunction(){
        alert('yey');
    }

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