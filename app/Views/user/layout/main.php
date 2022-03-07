<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('admin'); ?>/images/logo-ma.png" rel="icon">
  <link href="<?= base_url('admin'); ?>/images/logo-ma.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('anyar'); ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('anyar'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('anyar'); ?>/assets/css/anyar2.css" rel="stylesheet">

  <!-- My Css -->
  <link rel="stylesheet" href="<?= base_url('anyar'); ?>/assets/css/myanyar2.css">
  <link rel="stylesheet" href="<?= base_url('ckeditor5-document/ckeditor2.css'); ?> ">

  <!-- =======================================================
  * Template Name: Anyar - v4.7.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <?= $this->include('user/layout/topbar'); ?>

  <?= $this->include('user/layout/navbar'); ?>

  <?= $this->renderSection('main-content'); ?>

  <?= $this->include('user/layout/footer'); ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('anyar'); ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url('anyar'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('anyar'); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('anyar'); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('anyar'); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('anyar'); ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('anyar'); ?>/assets/js/main.js"></script>

  <!-- Datatable -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

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
    <?php elseif (session()->has('email')) : ?>
      Swal.fire({
        icon: 'success',
        text: '<?= session()->getFlashdata('email'); ?>'
      })


    <?php endif; ?>
  </script>

  <script src="<?= base_url('anyar/assets/js/speech2.js'); ?>" defer class="scr-speech"></script>

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

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/61022a8c649e0a0a5cce6fcc/1fbo7ce8i';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

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