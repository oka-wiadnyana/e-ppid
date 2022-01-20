<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="<?= base_url('mycss/userauth2.css'); ?>">
</head>

<body>

    <div class="container">

        <div class="login-logo">
            <img src="<?= base_url('img/logo-pn.png'); ?>" alt="">
        </div>
        <div class="page-text">
            <p class="page-initial">SELAMAT DATANG DI E-PPID</p>
            <p class="page-initial">PENGADILAN NEGERI BANGLI</p>
        </div>

        <div class="login-form">
            <form action="<?= base_url('userauth/attempt_login'); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if (session()->has('success')) : ?>
                    <div class="notifikasi berhasil">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php elseif (session()->has('gagal')) : ?>
                    <div class="notifikasi gagal">
                        <?= session()->getFlashdata('gagal'); ?>
                    </div>
                <?php endif; ?>
                <h3 class="form-title">Login E-PPID</h3>
                <input class="form-input" type="text" name="email" id="email" placeholder="Masukkan email">
                <?php if (isset(session()->getFlashdata('validasi')['email'])) : ?>
                    <small><?= session()->getFlashdata('validasi')['email']; ?></small>
                <?php endif; ?>
                <input class="form-input" type="password" name="password" id="password" placeholder="Masukkan password..">
                <?php if (isset(session()->getFlashdata('validasi')['password'])) : ?>
                    <small><?= session()->getFlashdata('validasi')['password']; ?></small>
                <?php endif; ?>
                <button type="submit" class="form-button">Login</button>

                <p>Belum punya akun? <a href="<?= base_url('userauth/register'); ?>"><span>Daftar!</span></a></p>
            </form>
        </div>

    </div>

</body>

</html>