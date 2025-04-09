<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>

<div class="row">
    <div class="col">
        <h3><i class="fas fa-tachometer-alt mr-2"></i>PROFIL PPID</h3>
    </div>
</div>
<div>
    <?php if (empty($dataProfil)) : ?>
        <a href="<?= base_url('admineppid/manipulate_profil_ppid'); ?>" class="btn btn-info mb-2 tambah_link">
            <i class="fas fa-plus-circle"></i>
            Tambah Profil
        </a>
    <?php else : ?>
        <a href="<?= base_url('admineppid/manipulate_profil_ppid'); ?>" class="btn btn-warning mb-2 edit_link">
            <i class="fas fa-edit"></i>
            Edit Profil
        </a>
    <?php endif; ?>
</div>
<?php if (empty($dataProfil)) : ?>
    <div class="col p-0">
        <h3>Belum ada data profil</h3>
    </div>
<?php else : ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='profil' href="#">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='tupoksi' href="#">Tupoksi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='struktur' href="#">Struktur</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button-profil" data-jenis='visimisi' href="#">Visi Misi</a>
        </li>
    </ul>

    <div id="profil_ppid" class="col">
        <?= $dataProfil['profil']; ?>
    </div>
    <div id="tupoksi" class="col">
        <?= $dataProfil['tupoksi']; ?>
    </div>
    <div id="struktur" class="col">
        <?= $dataProfil['struktur']; ?>
    </div>
    <div id="visimisi" class="col">
        <?= $dataProfil['visimisi']; ?>
    </div>
    <script>
        function showProfil(jenis = null) {
            if (jenis == 'profil' || jenis == null) {
                $('#profil_ppid').show();
                $('#tupoksi').hide();
                $('#struktur').hide();
                $('#visimisi').hide();
                $(document).find('.ck-reset_all').hide();

            } else if (jenis == 'tupoksi') {
                $('#profil_ppid').hide();
                $('#tupoksi').show();
                $('#struktur').hide();
                $('#visimisi').hide();
                $(document).find('.ck-reset_all').hide();
            } else if (jenis == 'struktur') {
                $('#profil_ppid').hide();
                $('#tupoksi').hide();
                $('#struktur').show();
                $('#visimisi').hide();
                $(document).find('.ck-reset_all').hide();
            } else {
                $('#profil_ppid').hide();
                $('#tupoksi').hide();
                $('#struktur').hide();
                $('#visimisi').show();
                $(document).find('.ck-reset_all').hide();
            }
        }

        showProfil();


        $('.button-profil').click(function(e) {
            e.preventDefault();
            let jenis = $(this).data('jenis');
            showProfil(jenis);
            console.log(jenis);
        })
    </script>

<?php endif; ?>

<?= $this->endSection(); ?>