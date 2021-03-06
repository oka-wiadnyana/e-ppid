 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex justify-cntent-center align-items-center">
     <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

         <!-- Slide 1 -->
         <div class="carousel-item active">
             <div class="carousel-container">
                 <h2 class="animate__animated animate__fadeInDown">Selamat datang di <span>E-Pelita Informasi</span></h2>
                 <p class="animate__animated animate__fadeInUp">E-Pelita Informasi merupakan media layanan informasi, sebagai bentuk keterbukaan informasi publik <?= ucwords(session()->get('profil_nama')); ?> dan amanat Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</p>
             </div>
         </div>

         <!-- Slide 2 -->
         <div class="carousel-item">
             <div class="carousel-container">
                 <h2 class="animate__animated animate__fadeInDown">Permohonan Informasi Elektronik</h2>
                 <p class="animate__animated animate__fadeInUp">E-Pelita Informasi dilengkapi dengan fitur permohonan informasi secara elektronik, sehingga dapat memudahkan masyarakat untuk mendapatkan informasi sesuai dengan yang diinginkan dari <?= ucwords(session()->get('profil_nama')); ?></p>
             </div>
         </div>

         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
         </a>

     </div>
 </section><!-- End Hero -->

 <main id="main">

     <!-- ======= Icon Boxes Section ======= -->
     <section id="icon-boxes" class="icon-boxes">
         <div class="container">

             <div class="row">
                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                     <div class="icon-box">
                         <div class="icon"><i class='bx bxs-food-menu'></i></div>
                         <h4 class="title"><a href="<?= base_url('userpage/listinformasi/berkala'); ?>">Informasi Berkala</a></h4>
                         <p class="description">Informasi yang wajib diperbaharui kemudian disediakan dan diumumkan kepada publik secara rutin </p>
                     </div>
                 </div>

                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bx-file"></i></div>
                         <h4 class="title"><a href="<?= base_url('userpage/listinformasi/serta_merta'); ?>">Informasi Serta Merta</a></h4>
                         <p class="description">informasi yang diumumkan secara serta merta tanpa penundaan</p>
                     </div>
                 </div>

                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bx-tachometer"></i></div>
                         <h4 class="title"><a href="<?= base_url('userpage/listinformasi/info_setiap_saat'); ?>">Informasi Wajib Tersedia</a></h4>
                         <p class="description">Informasi yang wajib tersedia setiap saat dan dapat diakses publik </p>
                     </div>
                 </div>

                 <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
                     <div class="icon-box">
                         <div class="icon"><i class="bx bx-layer"></i></div>
                         <h4 class="title"><a href="" id="btn-modal">Informasi Tanggap Cepat</a></h4>
                         <p class="description">Layanan informasi cepat yang disediakan oleh <?= session()->get('profil_nama'); ?> dengan menggunakan Whatsapp Bot</p>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- End Icon Boxes Section -->

     <!-- ======= Cta Section ======= -->
     <section id="cta" class="cta">
         <div class="container">

             <div class="row" data-aos="zoom-in">
                 <div class="col-lg-4 text-center text-lg-start">
                     <h3>Total Permintaan Layanan Informasi</h3>
                     <p class="display-2 jumlah-layanan count"><?= $total; ?></p>
                 </div>
                 <div class="col-lg-4 text-center text-lg-start">
                     <h3>Permintaan Layanan Informasi Yang Diterima</h3>
                     <p class="display-2 jumlah-layanan count"><?= $diterima; ?></p>
                 </div>
                 <div class="col-lg-4 text-center text-lg-start">
                     <h3>Permintaan Layanan Informasi Yang Ditolak</h3>
                     <p class="display-2 jumlah-layanan count"><?= $ditolak; ?></p>
                 </div>

             </div>

         </div>
     </section><!-- End Cta Section -->

     <!-- Video section -->
     <section>
         <div class="container video-container">
             <iframe width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= session()->get('profil_link_video_dashboard'); ?>" allowfullscreen>
             </iframe>
         </div>
     </section>



     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">

     </section><!-- End Contact Section -->

 </main><!-- End #main -->
 <div id="modal_container"></div>

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 <script>
     $('.count').each(function() {
         $(this).animate({
             Counter: $(this).text()
         }, {
             duration: 5000,
             easing: 'swing',
             step: function(now) {
                 $(this).text(Math.ceil(now));
             }
         });
     });


     $('#btn-modal').click(function(e) {
         e.preventDefault();
         $.ajax({

             url: "<?= base_url('userpage/modal_message'); ?>",
             dataType: "json",
         }).then(function(res) {
             // $('#modal_edit').css('z-index', 1000);

             $('#modal_container').html(res);
             $('#modal_message').modal('show');
             console.log(res)
         });
     })
 </script>



 <?= $this->endSection(); ?>