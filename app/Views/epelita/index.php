<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Pelita</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('img/epelita.png'); ?>" rel="icon">
  <link href="<?= base_url('bootslander_assets'); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('bootslander_assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('bootslander_assets'); ?>/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: Bootslander - v4.7.2
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex align-items-center">
        <!-- <div class="p-2">
          <img src="<?= base_url('img/' . session()->get('profil_logo')); ?>" alt="logo-ma" class="img-fluid logo-topbar">
        </div> -->
        <h1 class=""><a href="index.html"><img src="<?= base_url('img/epelita.png'); ?>" class="img-fluid" alt=""> <span>E-Pelita</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url('bootslander_assets'); ?>/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto link" href="#hero"><span class="link">Home</span></a></li>

          <li class="dropdown"><a href="#"><span class="link">Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('userpage'); ?>" class="link">Informasi</a></li>

              <li><a href="<?= base_url('pengaduan'); ?>" class="link">Pengaduan</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h2 class="text-center text-white mb-0 p-0" style="font-size: 1.5rem;"><strong>Selamat datang di</strong></h2>

            <h1 class="text-center mt-0"><span>E-Pelita</span></h1>
            <h2 class="text-center">E-Pelita (Pelayanan, Informasi, Tanggap, Aduan), merupakan layanan informasi dan pengaduan Pengadilan Tinggi Denpasar </h2>

          </div>
        </div>

      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">

          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Layanan E-Pelita </h3>
            <p>Layanan E-Pelita terdiri 2 (dua) kanal utama, yaitu kanal Informasi dan Kanal Pengaduan</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><a href="<?= base_url('userpage'); ?>"><i class="bx bx-file"></i></a></div>
              <h4 class="title"><a href="<?= base_url('userpage'); ?>">E-Pelita Informsi</a></h4>
              <p class="description">E-Pelita Informasi, yang merupakan sarana keterbukaan informasi publik Pengadilan Tinggi Denpasar, sekaligus sebagai meja informasi elektonik untuk mengajukan permohonan informasi dan keberatan atas informasi secara online. Untuk memulai silahkan klik logo disamping</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><a href="<?= base_url('pengaduan'); ?>"><i class="bx bx-tachometer"></i></a></div>
              <h4 class="title"><a href="<?= base_url('pengaduan'); ?>">E-Pelita Pengaduan</a></h4>
              <p class="description">E-Pelita Pengaduan merupakan sarana pengaduan elektronik untuk mengajukan pengaduan atas layanan aparatur Pengadilan Tinggi Denpasar maupun Pengadilan Negeri se-Bali. Untuk pengaduan dugaan pelanggaran kode etik dapat dilakukan langsung melalui aplikasi <a href="https://www.siwas.mahkamahaagung.go.id">SIWAS</a> atau silahkan langsung ke meja pengaduan Pengadilan Tinggi Denpasar. Silahkan klik logo disamping untuk memulai aplikasi</p>
            </div>



          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Our Great Team</p>
        </div>

        <div class="row" data-aos="fade-left">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="<?= base_url('bootslander_assets'); ?>/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="<?= base_url('bootslander_assets'); ?>/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="<?= base_url('bootslander_assets'); ?>/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="<?= base_url('bootslander_assets'); ?>/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Team Section -->





  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>E-Pelita</h3>
              <p class="mb-2">Aplikasi Keterbukaan Informasi dan Pengaduan Elektronik <?= session()->get('profil_nama'); ?> </p>

              <p>
                <?= session()->get('profil_alamat_break') ?><br>
                <strong>Phone:</strong><?= session()->get('profil_nomor_telepon') ?><br>
                <strong>Email:</strong><?= session()->get('profil_email') ?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?= session()->get('profil_link_youtube') ?>" class="twitter"><i class="bx bxl-youtube"></i></a>
                <a href="<?= session()->get('profil_link_facebook') ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?= session()->get('profil_link_instagram') ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Link Terkait</h4>
            <ul>
              <?php if (session()->has('link_terkait')) : ?>
                <?php foreach (session()->get('link_terkait') as $d) : ?>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?= $d['link'] ?>" target='blank'><?= $d['alias']; ?></a></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Layanan elektronik</h4>
            <ul>
              <?php if (session()->has('layanan_elektronik')) : ?>
                <?php foreach (session()->get('layanan_elektronik') as $d) : ?>
                  <li><i class="bx bx-chevron-right"></i> <a href="<?= $d['link'] ?>" target='blank'><?= $d['alias']; ?></a></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>E-Pelita</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        <br>
        Reused By <?= session()->get('profil_nama_pendek'); ?>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('bootslander_assets'); ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('bootslander_assets'); ?>/js/main.js"></script>

  <script src="<?= base_url('anyar/assets/js/speech.js'); ?>" defer class="scr-speech"></script>

  <script>
    $(document).ready(function() {
      console.log(JSON.parse(window.sessionStorage.getItem('speech')));
      if (JSON.parse(window.sessionStorage.getItem('speech')) == null) {
        Swal.fire({
          title: 'Text To Speech',
          text: "Ijinkan website E-Pelita memainkan suara?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, mainkan!',
          cancelButtonText: 'Jangan mainkan!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.sessionStorage.setItem('speech', true)
            beginSpeech();
          } else {
            window.sessionStorage.setItem('speech', false)
          }
        })
      } else if (JSON.parse(window.sessionStorage.getItem('speech')) == true) {
        onSpeech();
      }

    });
  </script>
  <script>
    (function(d) {
      var s = d.createElement("script");
      s.setAttribute("data-account", "mGaLcI2pB7");
      s.setAttribute("src", "https://cdn.userway.org/widget.js");
      (d.body || d.head).appendChild(s);
    })(document)
  </script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
</body>

</html>