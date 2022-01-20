<?= $this->extend('user/layout/main.php'); ?>

<?= $this->section('main-content'); ?>

<section class="profil">
    <div class="container">

        <div class="row">
            <div class="col">
                <?php if ($dataProfil == false) : ?>
                    <h3>Belum ada data</h3>
                <?php elseif ($jenisProfil == 'profil') : ?>
                    <?= $dataProfil['profil']; ?>
                <?php elseif ($jenisProfil == 'tupoksi') : ?>
                    <?= $dataProfil['tupoksi']; ?>
                <?php elseif ($jenisProfil == 'struktur') : ?>
                    <?= $dataProfil['struktur']; ?>
                <?php elseif ($jenisProfil == 'visimisi') : ?>
                    <?= $dataProfil['visimisi']; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(document).find('.ck-reset_all').hide();

    });
</script>


<?= $this->endSection(); ?>