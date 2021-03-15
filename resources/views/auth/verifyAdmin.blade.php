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
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

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
        </nav>
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
            <img src="{{ asset('assets/img/pic-banner.svg') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
  
    </section><!-- End Hero -->
  
    <main id="main">
        
            {{-- Modal Region --}}
            <div class="modal fade" id="modalData" aria-labelledby="add-iuran">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Verifikasi Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ '/member/home/verify/store' }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                            <div class="modal-body custom-scroll">
                                <center>
                                    <h2>Hallo Selamat Datang</h2>
                                    <p>Anda belum melakukan verifikasi data. Verfikasi Untuk Melanjutkan</p>
                                </center>
                                <br>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control is-valid"  value="{{ Auth::user()->name }}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control is-valid"  value="{{ Auth::user()->email }}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label>Domisili</label>
                                    <input type="text" id="region" name="domisili" class="form-control" placeholder="Domisili....">
                                </div>
                                <div class="form-group">
                                    <label for="bukti">Foto STNK</label>
                                    <div class="custom-file">
                                    <input type="file" name="stnk" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Iuran Pertama</label>
                                    <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Rp..">
                                </div>
                                <div class="form-group">
                                    <label for="bukti">Bukti Transfer</label>
                                    <div class="custom-file">
                                    <input type="file" name="bukti" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-primary" id="tombol-post">tambah</button>
                            </div>
                       </form>
                    </div>
                </div>
              </div>
            {{-- End Modal Region --}}
  
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
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
  
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#modalData').modal('show');
        bsCustomFileInput.init();
    })
    </script>
  
  </body>