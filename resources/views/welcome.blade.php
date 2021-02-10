<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsip Surat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/logo/logo.ico')}}" rel="icon">
  <link href="{{asset('landing/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('landing/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('landing/assets/css/style.css')}}" rel="stylesheet">

  <style>
    .nama{
      color: coral;
    }

    .men{
      color: black;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">ARSIP SURAT <span class="nama">SMKN 2 TELUK KUANTAN</span></a></h1>
    
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li><a href="#services">Features</a></li>
          <li><a href="#contact">Contact</a></li>
          @guest
          @if (Route::has('login'))
              <li>
                  <a  href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li>
                  <a href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif

          @else
          <li><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="drop-down"><a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}</a>
            <ul>
              
              <li>                  <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
            </form>
            </li>
            </ul>
          </li>




          @endguest

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h3><strong>Selamat Datang di Arsip Surat SMKN 2 Teluk Kuantan</strong></h3>
      <h1>Database Penyimpanan Surat</h1>
      {{-- <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
    </div>
  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
          <h3>Features Yang Tersedia</h3>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="ri-inbox-archive-line"></i></div>
              <h4 class="title"><a href="">Arsip Surat</a></h4>
              <p class="description">Database Penyimpanan Surat Masuk & Surat Keluar</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Laporan</a></h4>
              <p class="description">Menampilkan Laporan Data surat Masuk dan Surat Keluar</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="ri-send-plane-fill"></i></div>
              <h4 class="title"><a href="">Disposisi</a></h4>
              <p class="description">Pengiriman Surat Antar Pengguna Web</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="icofont-mail"></i></div>
              <h4 class="title"><a href="">Template Surat</a></h4>
              <p class="description">Pembuatan Surat Secara Instan</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->



    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <br><br><br>
          <br>
          <br>
          <br>
        </div>

      </div>
    </section><!-- End Cta Section -->







    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          </div>

        <div>
          
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6516248104517!2d101.56051771533721!3d-0.5237506354188135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2a4dd1f9fd9251%3A0xf7ffe66340829c25!2sSenior%20High%20School!5e0!3m2!1sen!2sid!4v1612777473273!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat:</h4>
                <p>Jl. Raja Ali Haji (Perumnas), Teluk Kuantan, Koto Taluk, Kuansing, Kabupaten Kuantan Singingi, Riau 2956</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>Smkn2telukkuantan@sch.id</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Telepon:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

       
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

  

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright SMKN 2 Teluk Kuantan 2021. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('landing/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('landing/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('landing/assets/js/main.js')}}"></script>

</body>

</html>
