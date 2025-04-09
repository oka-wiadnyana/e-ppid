<?= $this->extend('user/layout/main.php'); ?>

<?= $this->section('main-content'); ?>

<section id="informasi">
    <div class="container">
        <div class="row">
            <h1 class="text-center fw-bolder">Video Informasi Publik</h1>
            <hr>
        </div>
        <form action="<?= base_url('userpage/videoInformasi'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="input-group mt-3 mb-3">
                <input type="text" class="form-control" placeholder="<?= session()->get('keyword') != '' ? 'Anda sedang mencari : ' . session()->get('keyword') : 'Cari video'; ?>" name="cari-data">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="submit-cari">Cari</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php foreach ($listVideo as $video) : ?>
                <div class="col-md-4 p-2">

                    <div class="shadow p-2">
                        <div class="embed-responsive embed-responsive-1by1 text-center">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['embed_id']; ?>" allowfullscreen></iframe>
                        </div>

                        <div class="video-title-wrapper shadow">
                            <p class="text-center"><?= $video['uraian']; ?></p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('cust_pagination', 'default_full') ?>
    </div>
</section>




<?= $this->endSection(); ?>