<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('admin'); ?>/images/logo-ma.png" type="image/ico" />

    <title>Admin | E-PPID</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('admin'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('admin'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('admin'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('admin'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url('admin'); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url('admin'); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('admin'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('admin'); ?>/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('ckeditor5-document/ckeditor2.css'); ?> ">
    <script src="<?= base_url('ckeditor5-document'); ?>/ckeditor.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- sidebar menu -->
            <?= $this->include('admin/layout/sidebar'); ?>
            <!-- /sidebar menu -->
            <!-- top navigation -->
            <?= $this->include('admin/layout/navbar'); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <?= $this->renderSection('main-content'); ?>
            </div>
            <!-- /page content -->
        </div>

    </div>


    <!-- jQuery -->
    <script src="<?= base_url('admin'); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('admin'); ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('admin'); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('admin'); ?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('admin'); ?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('admin'); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('admin'); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('admin'); ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?= base_url('admin'); ?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('admin'); ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('admin'); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('admin'); ?>/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('admin'); ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('admin'); ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('admin'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('admin'); ?>/build/js/custom.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

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
        let jml_notif_permohonan = 0;
        let jml_notif_keberatan = 0;

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('admineppid/count_permohonan_baru'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-permohonan").show();
                    $(".notif-permohonan").html(event.data);
                    jml_notif_permohonan = parseInt(event.data);
                    let jml_notif = jml_notif_keberatan + jml_notif_permohonan;

                    $(".total-notif").show();
                    $(".total-notif").html(jml_notif);

                    console.log(event.data);
                    console.log(jml_notif);

                } else {
                    let jml_notif = jml_notif_keberatan + jml_notif_permohonan;
                    $(".total-notif").hide();
                    $(".total-notif").html(jml_notif);
                    $(".notif-permohonan").html('');
                    $(".notif-permohonan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);
                    console.log(jml_notif);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('admineppid/count_keberatan_baru'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-keberatan").show();
                    $(".notif-keberatan").html(event.data);
                    jml_notif_keberatan = parseInt(event.data);
                    console.log(event.data);
                    let jml_notif = jml_notif_keberatan + jml_notif_permohonan;
                    $(".total-notif").show();
                    $(".total-notif").html(jml_notif);

                } else {
                    $(".notif-keberatan").html('');
                    $(".notif-keberatan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data)

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }
    </script>




</body>

</html>