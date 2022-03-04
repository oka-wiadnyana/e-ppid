<?= $this->extend('user/layout/main.php'); ?>

<?= $this->section('main-content'); ?>

<section class="profil">
    <div class="container">

        <div class="row">
            <div class="col">
                <?php if ($data_prasyarat == false) : ?>
                    <h3>Belum ada data</h3>
                <?php elseif ($jenis_prasyarat == 'prasyarat') : ?>
                    <?= $data_prasyarat['prasyarat']; ?>
                <?php elseif ($jenis_prasyarat == 'hubungi_kami') : ?>
                    <?= $data_prasyarat['hubungi_kami']; ?>
                <?php elseif ($jenis_prasyarat == 'faq') : ?>
                    <?= $data_prasyarat['faq']; ?>
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