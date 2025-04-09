<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex justify-content-between align-items-center">

    <div class="logo">
      <h1 class="text-light"><a href=""><img src="<?= base_url('img/epelita.png'); ?>" class="img-fluid" alt=""> <span>e-Pelita</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="<?= base_url('moderna_assets'); ?>/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <?php if (session()->get('user_pengaduan_login') == true) : ?>
          <li class="text-white">Selamat datang <b><?= session()->get('nama_pengaduan'); ?></b></li>
        <?php endif; ?>

        <li><a class="active" href="<?= base_url('pengaduan'); ?>"><span class="link">Home</span></a></li>

        <li><a href="<?= base_url(''); ?>" class="link">E-Pelita</a></li>
        <?php if (session()->get('user_pengaduan_login') == true) : ?>
          <li class="dropdown"><a href="#"><span class="link">Pengaduan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('pengaduan/v_pengaduan'); ?>" class="link">Daftar</a></li>
              <li><a href="<?= base_url('pengaduan/v_form'); ?>" class="link">Tambah</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          <li><a href="<?= base_url('aduauth/logout'); ?>"><span class="link">Logout</span></a></li>
        <?php else : ?>
          <li><a href="<?= base_url('aduauth'); ?>"><span class="link">Login</span></a></li>
        <?php endif; ?>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>