   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top d-flex align-items-center ">
       <div class="container d-flex align-items-center justify-content-between">

           <h1 class="logo"><a href="index.html">E-PPID</a></h1>
           <!-- Uncomment below if you prefer to use an image logo -->
           <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

           <nav id="navbar" class="navbar">
               <ul>
                   <li><a class="nav-link scrollto active" href="<?= base_url('userpage'); ?>">Beranda</a></li>
                   <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/profil_ppid/profil'); ?>">Profil PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/tupoksi'); ?>">Tugas dan Fungsi PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/struktur'); ?>">Struktur Organisasi</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/visimisi'); ?>">Visi dan Misi</a></li>
                       </ul>
                   </li>
                   <li><a class="nav-link scrollto" href="#about">Regulasi</a></li>
                   <li class="dropdown"><a href="#"><span>Informasi Publik</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/listinformasi/berkala'); ?>">Informasi Berkala</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/serta_merta'); ?>">Informasi Serta Merta</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/info_setiap_saat'); ?>">Informasi Tersedia Setiap Saat</a></li>
                           <li><a href="<?= base_url('userpage/videoinformasi'); ?>">Video Informasi Publik</a></li>
                       </ul>
                   </li>
                   <li class="dropdown"><a href="#"><span>Standar Layanan</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="#">Maklumat Layanan</a></li>
                           <li><a href="#">Prosedur Permohonan Informasi</a></li>
                           <li><a href="#">Prosedur Pengajuan Keberatan</a></li>
                           <li><a href="#">Prosedur Sengketa Informasi</a></li>
                           <li><a href="#">Jalur Dan Waktu Layanan</a></li>
                           <li><a href="#">Biaya Layanan</a></li>
                       </ul>
                   </li>
                   <li><a class="nav-link scrollto" href="#about">Laporan</a></li>
                   <!-- <li><a class="nav-link scrollto" href="#about">Login</a></li> -->
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
           </nav><!-- .navbar -->

       </div>
   </header><!-- End Header -->