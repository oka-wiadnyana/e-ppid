<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Anyar Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('anyar'); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('anyar'); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link rel="stylesheet" href="<?= base_url('anyar'); ?>/assets/css/myanyar.css">
  <link rel="stylesheet" href="<?= base_url('ckeditor5-document/ckeditor2.css'); ?> ">

  <!-- =======================================================
  * Template Name: Anyar - v4.7.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

</body>

</html>