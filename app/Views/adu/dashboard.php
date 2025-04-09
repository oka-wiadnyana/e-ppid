<?= $this->extend('adu/layout/main'); ?>

<?= $this->section('main-content'); ?>
<main id="main">

  <!-- ======= Services Section ======= -->
  <section class="services">
    <div class="container">

      <div class="row">
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
          <div class="icon-box icon-box-pink">
            <div class="icon"><i class='bx bx-qr'></i></div>
            <h4 class="title"><a href="">What</a></h4>
            <p class="description">Perihal yang diadukan jelas, sehingga memudahkan didalam pemeriksaan ataupun investigasi aduan </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box icon-box-cyan">
            <div class="icon"><i class="bx bx-building"></i></div>
            <h4 class="title"><a href="">Where</a></h4>
            <p class="description">Masyarakat diharapkan dapat menjelaskan secara detail mengenai tempat kejadian peristiwa yang diadukan </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box icon-box-green">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">When</a></h4>
            <p class="description">Waktu kejadian perihal yang dilaporkan jelas dan terang</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box icon-box-pink">
            <div class="icon"><i class="bx bx-user"></i></div>
            <h4 class="title"><a href="">Who</a></h4>
            <p class="description">Sedapat mungkin identitas terlapor jelas, sehingga memudahkan tim dalam melakukan investigasi </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box icon-box-blue">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">How</a></h4>
            <p class="description">Masyarakat diharapkan dapat mnjelaskan secara singkat bagaimana peristiwa yang diadukan itu terjadi</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box icon-box-green">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="">Evidence</a></h4>
            <p class="description">Bukti-bukti yang diajukan adalah bukti-bukti yang berkorelasi dengan kejadian yang diadukan</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Why Us Section ======= -->
  <?php if (session()->get('user_pengaduan_login') != true) : ?>
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box login-box">
            <img src="<?= base_url('moderna_assets'); ?>/img/why-us.jpg" class="img-fluid" alt="">
            <div class="btn-login ">
              <a href="<?= base_url('aduauth'); ?>" class="btn btn-primary btn-lg btn-block m-0" data-vbtype="video" data-autoplay="true">Login</a>
            </div>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><a href="<?= base_url('aduauth'); ?>"><i class="bx bx-fingerprint"></i></a></div>
              <h4 class="title">LOGIN</h4>
              <p class="description">Klik tombol login disamping atau pada bilah navigasi diatas untuk memulai pengaduan </p>
            </div>



          </div>
        </div>

      </div>
    </section>

  <?php endif; ?>
  <!-- End Why Us Section -->



</main><!-- End #main -->

<?= $this->endSection(); ?>