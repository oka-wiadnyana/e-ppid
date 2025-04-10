<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <!-- menu profile quick info -->
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>E-PPID Admin</span></a>
        </div>

        <div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?= base_url('admin/img_profile/' . session()->get('admin_foto')); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat datang, </span>
                <h2><?= session()->get('admin_nama'); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <?php if (session()->get('admin_jabatan') == 'Atasan PPID/KPT/WKPT' || session()->get('admin_jabatan') == 'PPID Kepaniteraan/Panitera' || session()->get('admin_jabatan') == 'PPID Kesekretariatan/Sekretaris' || session()->get('admin_jabatan') == 'Panmud Hukum' || session()->get('admin_jabatan') == 'admin') : ?>
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="<?= base_url('admineppid'); ?>"><i class="fa fa-home"></i> Home </a>
                        </li>

                        <li><a href="<?= base_url('admineppid/v_profil_satker'); ?>"><i class="fa fa-users"></i> Profil Satker</a></li>

                        <li><a><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Footer <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('admineppid/v_prasyarat'); ?>">Prasyarat & others</a></li>
                                <li><a href="<?= base_url('admineppid/v_link_terkait'); ?>">Link Terkait</a></li>
                                <li><a href="<?= base_url('admineppid/v_layanan_elektronik'); ?>">Layanan Elektronik</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-users"></i> Akun <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('admineppid/v_admin'); ?>">Admin</a></li>
                                <li><a href="<?= base_url('admineppid/v_user'); ?>">User Informasi</a></li>
                                <!-- <li><a href="<?= base_url('adminpengaduan/v_user'); ?>">User Pengaduan</a></li> -->
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <!-- Informasi -->
                <h3>Informasi</h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-edit"></i> Permohonan <span class="badge badge-danger total-notif"></span><span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('admineppid/daftar_permohonan'); ?>">Permohonan baru <span class="badge badge-danger notif-permohonan"></span></a></li>
                            <li><a href="<?= base_url('admineppid/daftar_keberatan'); ?>">Daftar Keberatan <span class="badge badge-danger notif-keberatan"></span></a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Informasi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('admineppid/list_informasi'); ?>">Informasi berkala</a></li>
                            <li><a href="<?= base_url('admineppid/list_video'); ?>">Informasi video</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('admineppid/v_profil_ppid'); ?>"><i class="fa fa-user"></i> Profil PPID</a></li>

                    <li><a href="<?= base_url('admineppid/v_peraturan'); ?>"><i class="fa fa-book"></i> Regulasi</a></li>
                    <li><a href="<?= base_url('admineppid/v_standar_layanan'); ?>"><i class="fa fa-file"></i> Standar Layanan</a></li>
                    <li><a><i class="fa fa-desktop"></i> Referensi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('admineppid/v_level1'); ?>">Level 1</a></li>
                            <li><a href="<?= base_url('admineppid/v_level2'); ?>">Level 2</a></li>
                            <li><a href="<?= base_url('admineppid/v_level3'); ?>">Level 3</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-file-archive-o" aria-hidden="true"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <!-- <li><a href="<?= base_url('admineppid/v_statistik'); ?>">Laporan Akses</a></li> -->
                            <li><a href="<?= base_url('admineppid/v_laporan_layanan'); ?>">Laporan Layanan</a></li>
                        </ul>
                    </li>

                </ul>

                <!-- Pengaduan -->
                <!-- <?php if (session()->get('admin_jabatan') == 'Atasan PPID/KPT/WKPT' || session()->get('admin_jabatan') == 'PPID Kepaniteraan/Panitera' || session()->get('admin_jabatan') == 'PPID Kesekretariatan/Sekretaris' || session()->get('admin_jabatan') == 'Panmud Hukum' || session()->get('admin_jabatan') == 'admin') : ?>
                    <h3>Pengaduan</h3>
                    <ul class="nav side-menu">

                        <li><a><i class="fa fa-edit"></i> Pengaduan <span class="badge badge-danger notif-pengaduan-parent"></span><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?= base_url('adminpengaduan/v_daftar_pengaduan'); ?>">Permohonan baru <span class="badge badge-danger notif-pengaduan"></span></a></li>

                            </ul>
                        </li>


                    </ul>
                <?php endif; ?> -->
            </div>


        </div>

    </div>
</div>