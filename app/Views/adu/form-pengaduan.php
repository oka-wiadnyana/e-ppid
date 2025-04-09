<?= $this->extend('adu/layout/main'); ?>
<?= $this->section('main-content'); ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- <link href="<?= base_url('material_assets'); ?>/css/nucleo-icons.css" rel="stylesheet" />
<link href="<?= base_url('material_assets'); ?>/css/nucleo-svg.css" rel="stylesheet" /> -->

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link id="pagestyle" href="<?= base_url('material_assets'); ?>/css/material-kit2.min.css?v=3.0.2" rel="stylesheet" />

<style>
    .async-hide {
        opacity: 0 !important
    }
</style>

<section>

    <div class="container py-4">
        <div class="row  shadow-lg bg-white rounded">
            <div class="col-lg-10 mx-auto d-flex justify-content-center flex-column">
                <h3 class="text-center">Tambah Pengaduan</h3>
                <form id="contact-form" method="post" autocomplete="off" action="<?= base_url('pengaduan/insert_pengaduan'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="input-group input-group-dynamic mb-4">
                                    <label class="form-label">Hal Pengaduan</label>
                                    <input class="form-control" aria-label="First Name..." type="text" name="hal" value="<?= old('hal'); ?>">
                                </div>
                            </div>

                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Tempat Kejadian</label>
                                <input type="text" class="form-control" name="tempat_kejadian" value="<?= old('tempat_kejadian'); ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic d-flex align-items-center">
                                <label class="" style=" margin:0 0.5rem 0 0;">Waktu Kejadian</label>
                                <input type="date" class="form-control" name="waktu" value="<?= old('waktu'); ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Nama Terlapor</label>
                                <input type="text" class="form-control" name="nama_terlapor" value="<?= old('nama_terlapor'); ?>">
                            </div>
                        </div>
                        <div class="input-group mb-4 input-group-static">
                            <label>Isi Pengaduan</label>
                            <textarea class="form-control" id="message" rows="8" name="isi_pengaduan"><?= old('isi_pengaduan'); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload file (jika ada)</label>
                            <br>
                            <input type="file" id="formFile" name="file">
                        </div>
                        <input type="hidden" name="id" value="<?= session()->get('user_id'); ?>">
                        <div class="row">

                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-dark w-100">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('material_assets'); ?>/js/core/popper.min.js" type="text/javascript"></script>
<!-- <script src="<?= base_url('material_assets'); ?>/js/core/bootstrap.min.js" type="text/javascript"></script> -->
<script src="<?= base_url('material_assets'); ?>/js/plugins/perfect-scrollbar.min.js"></script>

<script src="<?= base_url('material_assets'); ?>/js/plugins/countup.min.js"></script>

<script src="<?= base_url('material_assets'); ?>/js/plugins/parallax.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url('material_assets'); ?>/js/material-kit.min.js?v=3.0.2" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<?= $this->endSection(); ?>