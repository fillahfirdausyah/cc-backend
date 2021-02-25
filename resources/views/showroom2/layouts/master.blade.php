<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
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
                        <a href="index.html" class="logo">CC<em> Showroom</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="cars.html">Cars</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="team.html">Team</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="faq.html">FAQ</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li> 
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

    @yield('content')
    
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

  </body>
</html>