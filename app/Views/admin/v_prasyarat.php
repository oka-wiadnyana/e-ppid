<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>

<div class="row">
    <div class="col">
        <h3><i class="fas fa-tachometer-alt mr-2"></i>PRASYARAT & OTHERS</h3>
    </div>
</div>
<div>
    <?php if (empty($data_prasyarat)) : ?>
        <a href="<?= base_url('admineppid/manipulate_prasyarat'); ?>" class="btn btn-info mb-2 tambah_link">
            <i class="fas fa-plus-circle"></i>
            Tambah Prasyarat & Lainnya
        </a>
    <?php else : ?>
        <a href="<?= base_url('admineppid/manipulate_prasyarat'); ?>" class="btn btn-warning mb-2 edit_link">
            <i class="fas fa-edit"></i>
            Edit Prasyarat & Lainnya
        </a>
    <?php endif; ?>
</div>
<?php if (empty($data_prasyarat)) : ?>
    <div class="col p-0">
        <h3>Belum ada data prasyarat dan lainnya</h3>
    </div>
<?php else : ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='profil' href="#">Prasyarat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='hubungi_kami' href="#">Hubungi Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='faq' href="#">FAQ</a>
        </li>
    </ul>

    <div id="prasyarat" class="col">
        <?= $data_prasyarat['prasyarat']; ?>
    </div>
    <div id="hubungi_kami" class="col">
        <?= $data_prasyarat['hubungi_kami']; ?>
    </div>
    <div id="faq" class="col">
        <?= $data_prasyarat['faq']; ?>
    </div>

    <script>
        function showPrasyarat(jenis = null) {
            if (jenis == 'prasyarat' || jenis == null) {
                $('#prasyarat').show();
                $('#hubungi_kami').hide();
                $('#faq').hide();
                $(document).find('.ck-reset_all').hide();

            } else if (jenis == 'hubungi_kami') {
                $('#prasyarat').hide();
                $('#hubungi_kami').show();
                $('#faq').hide();

                $(document).find('.ck-reset_all').hide();
            } else {
                $('#prasyarat').hide();
                $('#hubungi_kami').hide();
                $('#faq').show();

                $(document).find('.ck-reset_all').hide();
            }
        }

        showPrasyarat();


        $('.button-profil').click(function(e) {
            e.preventDefault();
            let jenis = $(this).data('jenis');
            showPrasyarat(jenis);
            console.log(jenis);
        })
    </script>

<?php endif; ?>

<?= $this->endSection(); ?>