<!-- ======= Top Bar ======= -->
<div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between topbar-small">
        <div class="contact-info d-flex align-items-center">
            <img src="<?= base_url('img/' . session()->get('profil_logo')); ?>" alt="logo-ma" class="img-fluid logo-topbar"></i><a href="mailto:contact@example.com" class="d-none d-md-block"><?= session()->get('profil_nama'); ?> | <?= session()->get('profil_alamat'); ?></a><a href="mailto:contact@example.com" class="d-block d-sm-none"><?= session()->get('profil_nama_pendek'); ?></a>
        </div>
        <div class="cta">
            <?php if (session()->has('user_login')) : ?>
                <a href="<?= base_url('userauth/logout'); ?>" class="scrollto">Logout</a>
            <?php else : ?>
                <a href="<?= base_url('userauth'); ?>" class="scrollto">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>