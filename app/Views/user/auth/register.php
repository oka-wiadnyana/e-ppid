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


        <div class="login-form">
            <form action="<?= base_url('userauth/attempt_register'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <h3 class="form-title">Register E-PELITA</h3>
                <div class="main-form">
                    <div class='left-side'>
                        <label for="nik">NIK</label>
                        <input class="form-input" type="text" name="nik" id="nik" placeholder="Masukkan NIK.." value="<?= old('nik'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['nik'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['nik']; ?></small>
                        <?php endif; ?>
                        <label for="nama">Nama</label>
                        <input class="form-input" type="text" name="nama" id="nama" placeholder="Masukkan nama.." value="<?= old('nama'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['nama'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['nama']; ?></small>
                        <?php endif; ?>
                        <label for="email">Email</label>
                        <input class="form-input" type="email" name="email" id="email" placeholder="Masukkan email.." value="<?= old('email'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['email'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['email']; ?></small>
                        <?php endif; ?>
                        <label for="nomor_telepon">Nomor Whatsapp</label>
                        <input class="form-input" type="text" name="nomor_telepon" id="nomor_telepon" placeholder="Masukkan nomor telepon.." value="<?= old('nomor_telepon'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['nomor_telepon'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['nomor_telepon']; ?></small>
                        <?php endif; ?>
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" placeholder="Masukkan alamat"><?= old('alamat'); ?></textarea>
                        <?php if (isset(session()->getFlashdata('validasi')['alamat'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['alamat']; ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="right-side">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input class="form-input" type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukkan pekerjaan.." value="<?= old('pekerjaan'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['pekerjaan'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['pekerjaan']; ?></small>
                        <?php endif; ?>
                        <label for="institusi">Institusi (opsional)</label>
                        <input class="form-input" type="text" name="institusi" id="institusi" placeholder="Masukkan institusi.." value="<?= old('institusi'); ?>">
                        <label for="nomor_telepon">Password</label>
                        <input class="form-input" type="password" name="password" id="password" placeholder="Masukkan password.." value="<?= old('password'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['password'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['password']; ?></small>
                        <?php endif; ?>
                        <label for="nomor_telepon">Ulangi Password</label>
                        <input class="form-input" type="password" name="password2" id="password2" placeholder="Ulangi password.." value="<?= old('password2'); ?>">
                        <?php if (isset(session()->getFlashdata('validasi')['password2'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['password2']; ?></small>
                        <?php endif; ?>
                        <label for="inputGroupFile01">Upload KTP</label>
                        <div style="margin-top: 1rem;">

                            <input type="file" class="form-control" id="inputGroupFile01" name="ktp">
                        </div>
                        <?php if (isset(session()->getFlashdata('validasi')['ktp'])) : ?>
                            <small><?= session()->getFlashdata('validasi')['ktp']; ?></small>
                        <?php endif; ?>
                    </div>

                </div>


                <button type="submit" class="form-button">Login</button>
                <p>Sudah punya akun? <a href="<?= base_url('userauth'); ?>"><span>Login!</span></a></p>
            </form>
        </div>


    </div>

</body>

</html>