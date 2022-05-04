<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Pelita | Pengaduan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('img/epelita.png'); ?>" rel="icon">
    <link href="<?= base_url('img/epelita.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('moderna_assets'); ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('moderna_assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('moderna_assets'); ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna - v4.8.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <!-- material -->


    <!-- endmaterial -->

    <!-- Datatable -->

    <link href="<?= base_url(''); ?>/DataTables/datatables.min.css" rel="stylesheet">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .login-box {
            position: relative;

        }

        .btn-login {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 50%;
            right: 35%;
            left: 35%;
            transform: translate(0, -50%);
            width: 8rem;
            border: 2px solid #fff;
            padding: 0.5rem;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->

    <?= $this->include('adu/layout/header'); ?>

    <!-- End Header -->

    <!-- Hero -->
    <?= $this->include('adu/layout/hero'); ?>


    <!--   Main Content -->
    <?= $this->renderSection('main-content'); ?>
    <!--   End Content -->

    <!-- Footer -->
    <?= $this->include('adu/layout/footer'); ?>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




    <script src="<?= base_url(''); ?>/jquery.js" crossorigin="anonymous"></script>

    <script src="<?= base_url(''); ?>/DataTables/datatables.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="<?= base_url('moderna_assets'); ?>/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('moderna_assets'); ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('moderna_assets'); ?>/js/main.js"></script>

    <!-- material -->

    <!-- endmaterial -->

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

    <script src="<?= base_url('anyar/assets/js/speech.js'); ?>" defer class="scr-speech"></script>

    <script>
        $(document).ready(function() {
            console.log(JSON.parse(window.sessionStorage.getItem('speech')));
            if (JSON.parse(window.sessionStorage.getItem('speech')) == null) {
                Swal.fire({
                    title: 'Text To Speech',
                    text: "Ijinkan website E-PPID memainkan suara?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, mainkan!',
                    cancelButtonText: 'Jangan mainkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.sessionStorage.setItem('speech', true)
                        beginSpeech();
                    } else {
                        window.sessionStorage.setItem('speech', false)
                    }
                })
            } else if (JSON.parse(window.sessionStorage.getItem('speech')) == true) {
                onSpeech();
            }

        });
    </script>

    <script>
        (function(d) {
            var s = d.createElement("script");
            s.setAttribute("data-account", "mGaLcI2pB7");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
        })(document)
    </script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
</body>

</html>