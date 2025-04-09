   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top d-flex align-items-center ">
       <div class="container d-flex align-items-center justify-content-between">

           <h1 class="logo"><a href="index.html"><img src="<?= base_url('img/epelita.png'); ?>" class="img-fluid" alt=""> E-Pelita</a></h1>
           <!-- Uncomment below if you prefer to use an image logo -->
           <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

           <nav id="navbar" class="navbar">
               <ul>
                   <li class="dropdown "><a href="#" class="<?= ($title == "Beranda") ? "active" : ""; ?>"><span class="link">Home</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage'); ?>" class="link">Beranda</a></li>
                           <li><a href="<?= base_url(''); ?>" class="link">E-Pelita</a></li>
                       </ul>
                   </li>
                   <li class="dropdown "><a href="#" class="<?= ($title == "Profil PPID") ? "active" : ""; ?>"><span class="link">Profil</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/profil_ppid/profil'); ?>" class="link">Profil PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/tupoksi'); ?>" class="link">Tugas dan Fungsi PPID</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/struktur'); ?>" class="link">Struktur Organisasi</a></li>
                           <li><a href="<?= base_url('userpage/profil_ppid/visimisi'); ?>" class="link">Visi dan Misi</a></li>
                       </ul>
                   </li>
                   <li><a class="nav-link link <?= ($title == "Daftar Regulasi") ? "active" : ""; ?>" href="<?= base_url('userpage/regulasi'); ?>">Regulasi</a></li>
                   <li class="dropdown "><a class="<?= ($title == "Informasi Publik") ? "active" : ""; ?>" href="#"><span class="link">Informasi Publik</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/listinformasi/berkala'); ?>" class="link">Informasi Berkala</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/serta_merta'); ?>" class="link">Informasi Serta Merta</a></li>
                           <li><a href="<?= base_url('userpage/listinformasi/info_setiap_saat'); ?>" class="link">Informasi Tersedia Setiap Saat</a></li>
                           <li><a href="<?= base_url('userpage/videoinformasi'); ?>" class="link">Video Informasi Publik</a></li>
                       </ul>
                   </li>
                   <li class="dropdown "><a class="<?= ($title == "Standar Pelayanan") ? "active" : ""; ?>" href="#"><span class="link">Standar Layanan</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/maklumat'); ?>" class="link">Maklumat Layanan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/prosedur'); ?>" class="link">Prosedur Permohonan Informasi</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/keberatan'); ?>" class="link">Prosedur Pengajuan Keberatan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/sengketa'); ?>" class="link">Prosedur Sengketa Informasi</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/jalur'); ?>" class="link">Jalur Dan Waktu Layanan</a></li>
                           <li><a href="<?= base_url('userpage/standar_pelayanan/biaya'); ?>" class="link">Biaya Layanan</a></li>
                       </ul>
                   </li>
                   <?php if (!session()->has('user_login')) : ?>
                       <li><a class="nav-link link" href="<?= base_url('userauth'); ?>"><span class="link">Permohonan</span></a></li>
                   <?php endif; ?>
                   <?php if (session()->get('user_login') === true) : ?>
                       <li class="dropdown <?= ($title == "Daftar Permohonan" || $title == "Daftar Keberatan") ? "active" : ""; ?>"><a href="#"><span class="link">Permohonan</span> <i class="bi bi-chevron-down"></i></a>
                           <ul>
                               <li><a href="<?= base_url('userpage/v_permohonan'); ?>" class="link">Permohonan Informasi</a></li>
                               <li><a href="<?= base_url('userpage/v_keberatan'); ?>" class="link">Keberatan</a></li>
                           </ul>
                       </li>
                   <?php endif; ?>
                   <li class="dropdown "><a class="<?= ($title == "Laporan Informasi") ? "active" : ""; ?>" href="#"><span class="link">Laporan</span> <i class="bi bi-chevron-down"></i></a>
                       <ul>
                           <li><a href="<?= base_url('userpage/v_statistik'); ?>" class="link">Laporan Akses Informasi Publik</a></li>
                           <li><a href="<?= base_url('userpage/v_laporan_layanan'); ?>" class="link">Laporan Layanan Informasi Publik</a></li>
                       </ul>
                   </li>
                   <!-- <li><a class="nav-link scrollto" href="#about">Login</a></li> -->
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
           </nav><!-- .navbar -->

       </div>
   </header><!-- End Header -->