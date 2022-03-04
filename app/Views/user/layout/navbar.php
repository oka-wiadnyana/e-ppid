   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top d-flex align-items-center ">
       <div class="container d-flex align-items-center justify-content-between">

           <h1 class="logo"><a href="index.html">E-PPID</a></h1>
           <!-- Uncomment below if you prefer to use an image logo -->
           <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

           <nav id="navbar" class="navbar">
               <ul>
                   <li><a class="nav-link scrollto <?= ($title == "Beranda") ? "active" : ""; ?>" href="<?= base_url('userpage'); ?>">Beranda</a></li>
                   <li class="dropdown "><a href="#" class="<?= ($title == "Profil PPID") ? "active" : ""; ?>"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/profil_ppid/profil'); ?>">Profil PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/tupoksi'); ?>">Tugas dan Fungsi PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/struktur'); ?>">Struktur Organisasi</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/visimisi'); ?>">Visi dan Misi</a></li>
                       </ul>
                   </li>
                   <li><a class="nav-link <?= ($title == "Daftar Regulasi") ? "active" : ""; ?>" href="<?= base_url('userpage/regulasi'); ?>">Regulasi</a></li>
                   <li class="dropdown "><a class="<?= ($title == "Informasi Publik") ? "active" : ""; ?>" href="#"><span>Informasi Publik</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/listinformasi/berkala'); ?>">Informasi Berkala</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/serta_merta'); ?>">Informasi Serta Merta</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/info_setiap_saat'); ?>">Informasi Tersedia Setiap Saat</a></li>
                           <li><a href="<?= base_url('userpage/videoinformasi'); ?>">Video Informasi Publik</a></li>
                       </ul>
                   </li>
                   <li class="dropdown "><a class="<?= ($title == "Standar Pelayanan") ? "active" : ""; ?>" href="#"><span>Standar Layanan</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/maklumat'); ?>">Maklumat Layanan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/prosedur'); ?>">Prosedur Permohonan Informasi</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/keberatan'); ?>">Prosedur Pengajuan Keberatan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/sengketa'); ?>">Prosedur Sengketa Informasi</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/jalur'); ?>">Jalur Dan Waktu Layanan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/biaya'); ?>">Biaya Layanan</a></li>
                       </ul>
                   </li>
                   <?php if (session()->get('user_login') === true) : ?>
                       <li class="dropdown <?= ($title == "Daftar Permohonan" || $title == "Daftar Keberatan") ? "active" : ""; ?>"><a href="#"><span>Permohonan</span> <i class="bi bi-chevron-down"></i></a>
                           <ul>
                               <li><a href="<?= base_url('userpage/v_permohonan'); ?>">Permohonan Informasi</a></li>
                               <li><a href="<?= base_url('userpage/v_keberatan'); ?>">Keberatan</a></li>
                           </ul>
                       </li>
                   <?php endif; ?>
                   <li class="dropdown "><a class="<?= ($title == "Laporan Informasi") ? "active" : ""; ?>" href="#"><span>Laporan</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/v_statistik'); ?>">Laporan Akses Informasi Publik</a></li>
                           <li><a href="<?= base_url('userpage/v_laporan_layanan'); ?>">Laporan Layanan Informasi Publik</a></li>
                       </ul>
                   </li>
                   <!-- <li><a class="nav-link scrollto" href="#about">Login</a></li> -->
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
           </nav><!-- .navbar -->

       </div>
   </header><!-- End Header -->