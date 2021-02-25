<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Car Community</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/dist/css/adminlte.min.css') }}" rel="stylesheet">

  @stack('css-asset')

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  {{-- Assets New Slider --}}
  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> --}}
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}"> --}}

  <!-- =======================================================
  * Template Name: Resi - v2.1.0
  * Template URL: https://bootstrapmade.com/resi-free-bootstrap-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-between">
  
        <h1 class="logo"><a href="index.html">Car Community</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="#header">Home</a></li>
            <li><a href="#services">News</a></li>
            <li><a href="#team">Event</a></li>
            <li><a href="#portfolio">Gallery</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
  
          </ul>
        </nav><!-- .nav-menu -->
        
        @if (Route::has('login'))
          @auth
          <a href="{{ '/dashboard' }}" class="get-started-btn scrollto">Dashboard</a>
        @else
          <a href="{{ '/login' }}" class="get-started-btn scrollto">Login</a>
        @endif
        @endif
  
      </div>
    </header><!-- End Header -->
  
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
  
      <div class="container">
        <div class="row">
          <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Car Community Platfrom Komunitas Otomotif</h1>
            <ul>
              <li><i class="ri-check-line"></i> Banyak Event</li>
              <li><i class="ri-check-line"></i> Berita Seputar Otomotif</li>
              <li><i class="ri-check-line"></i> Perkumpulan Komunitas</li>
            </ul>
            <div class="mt-3">
              <a href="{{ '/register' }}" class="btn-get-started scrollto">Bergabung</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/fast_car.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
  
    </section><!-- End Hero -->
  
    <main id="main">

       <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
          <div class="section-title">
            <h2>Event</h2>
          </div>
          <div class="row">
            @foreach ($event as $e)
            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="{{ asset($e->cover) }}" class="img-fluid" alt="">
                  <div class="social">
                    <p>{{ $e->kategori }}</p>
                  </div>
                </div>
                <div class="member-info">
                  <h4>{{ $e->judul }}</h4>
                  <span>{{ date('d F y', strtotime($e->tanggal)) }}</span>
                </div>
              </div>
            </div>
            </div>
            @endforeach
          </div>
        </div>
      </section><!-- End Team Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
            <div class="text-center">
                <h1 class="heading-title">News</h1>
            </div>
            <div class="row mt-5 news-cc">
              @foreach ($news as $n)
              <div class="col-lg-4 col-md-4 align-items-stretch">
                <div class="img">
                  <center><img src="{{ asset($n->cover) }}" class="img-fluid"></center>
                </div>
                  <center><a href="{{ '/news/' }}{{ $n->slug }}" class="mt-2 desk" style="font-weight: bold;">{{ $n->judul }}</a></center>
                  <center><p class="mt-1">{{ \carbon\Carbon::parse($n->created_at)->diffForHumans() }}</p></center>
              </div>
              @endforeach
            </div>
            <div class="text-center">
              <a href="" class="btn-more-details scrollto">Selengkapnya</a>
            </div>
        </div>
      </section><!-- End Services Section -->

            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
              <div class="container">
                <div class="text-center">
                  <h1 class="heading-title">Gallery</h1>
                </div>
                <div class="row">
                  <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                      <li data-filter="*" class="filter-active">All</li>
                      <li data-filter=".filter-app">App</li>
                      <li data-filter=".filter-card">Card</li>
                      <li data-filter=".filter-web">Web</li>
                    </ul>
                  </div>
                </div>
        
                <div class="row portfolio-container">
                  
                  @foreach ($gallery as $g) 
                  <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                      <img src="{{ asset('image/Admin/Gallery/'.$g->gambar) }}" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                          <a href="{{ asset('image/Admin/Gallery/'.$g->gambar) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
        
                  {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div> --}}
        
                </div>
        
              </div>
            </section><!-- End Portfolio Section -->
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="col-lg-6">
              <h2>Car Community</h2>
              <h3>Menyatukan komunitas otomotif dan menyalurkan hobi dengan event-event yang seru</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
              </ul>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container">
  
          <div class="row">
  
            <div class="col-lg-4">
              <div class="box">
                <span>01</span>
                <h4>Lorem Ipsum</h4>
                <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box">
                <span>02</span>
                <h4>Repellat Nihil</h4>
                <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box">
                <span>03</span>
                <h4> Ad ad velit qui</h4>
                <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Why Us Section -->
  
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts section-bg">
        <div class="container">
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="icofont-people"></i>
                <span data-toggle="counter-up">232</span>
                <p>User</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="icofont-speech-comments"></i>
                <span data-toggle="counter-up">64</span>
                <p>Event</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="icofont-gears"></i>
                <span data-toggle="counter-up">35</span>
                <p>Bengkel Cabang</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="icofont-users-alt-5"></i>
                <span data-toggle="counter-up">15</span>
                <p>Komunitas</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Counts Section -->
  
      {{-- <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container">
  
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <div class="icon-box">
                <i class="ri-store-line" style="color: #ffbb2c;"></i>
                <h3><a href="">Lorem Ipsum</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                <h3><a href="">Dolor Sitema</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
              <div class="icon-box">
                <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                <h3><a href="">Sed perspiciatis</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
              <div class="icon-box">
                <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                <h3><a href="">Magni Dolores</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-database-2-line" style="color: #47aeff;"></i>
                <h3><a href="">Nemo Enim</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                <h3><a href="">Eiusmod Tempor</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                <h3><a href="">Midela Teren</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                <h3><a href="">Pira Neve</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-anchor-line" style="color: #b2904f;"></i>
                <h3><a href="">Dirada Pack</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-disc-line" style="color: #b20969;"></i>
                <h3><a href="">Moton Ideal</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-base-station-line" style="color: #ff5828;"></i>
                <h3><a href="">Verdo Park</a></h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4">
              <div class="icon-box">
                <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                <h3><a href="">Flavor Nivelanda</a></h3>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Features Section --> --}}
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container">
  
          <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
  
              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@example.com<br>contact@example.com</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                  </div>
                </div>
              </div>
  
            </div>
  
            <div class="col-lg-6 mt-4 mt-lg-0">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer">
  
      <div class="footer-top">
        <div class="container">
          <div class="row">
  
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Car Community.</h3>
              <p>
                A108 Adam Street <br>
                New York, NY 535022<br>
                United States <br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              </ul>
            </div>
  
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="container d-md-flex py-4">
  
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; Copyright <strong><span>Car Community</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/resi-free-bootstrap-html-template/ -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  
  </body>