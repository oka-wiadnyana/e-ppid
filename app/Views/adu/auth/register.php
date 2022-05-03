<!--
=========================================================
* Material Kit 2 - v3.0.2
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(''); ?>/img/logo-pn.png">
    <link rel="icon" type="image/png" href="<?= base_url(''); ?>/img/logo-pn.png">
    <title>
        E-Pelita | Register
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('material_assets'); ?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url('material_assets'); ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('material_assets'); ?>/css/material-kit.css?v=3.0.2" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sign-in-basic">

    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">

                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"> Register</h4>
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">E-Pelita Pengaduan</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            <form class="text-start" method="post" action="<?= base_url('aduauth/attempt_register'); ?>" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama">
                                        </div>
                                        <label class="form-label">Alamat</label>
                                        <div class="input-group input-group-outline my-3 mt-0">

                                            <textarea type="text" class="form-control" name="alamat" col="3"></textarea>
                                        </div>
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Nomor HP</label>
                                            <input type="text" class="form-control" name="nomor_hp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Konfirmasi password</label>
                                            <input type="password" class="form-control" name="password2">
                                        </div>
                                        <label class="form-label">Upload KTP</label>
                                        <div class="input-group input-group-outline my-3 mt-0">
                                            <input type="file" class="form-control" name="ktp">
                                        </div>
                                    </div>

                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"> <i class="fa fa-file" aria-hidden="true"></i> Register</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    <a href="<?= base_url('aduauth'); ?>">Sudah mempunyai akun?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url('material_assets'); ?>/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url('material_assets'); ?>/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url('material_assets'); ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="<?= base_url('material_assets'); ?>/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="<?= base_url('material_assets'); ?>/js/material-kit.min.js?v=3.0.2" type="text/javascript"></script>
    <script>
        <?php if (session()->has('fail')) : ?>
            <?php $errors = session()->getFlashdata('fail');
            $msg = "";
            foreach ($errors as $e) {
                $msg .= $e . ', ';
            }
            ?>
            Swal.fire({
                icon: 'error',
                text: '<?= $msg; ?>'

            })
        <?php elseif (session()->has('success')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session()->getFlashdata('success'); ?>'
            })
        <?php endif; ?>
    </script>
</body>

</html>