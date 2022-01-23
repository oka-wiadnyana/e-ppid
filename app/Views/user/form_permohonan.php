<?= $this->extend('user/layout/main.php'); ?>

<?= $this->section('main-content'); ?>
<section id="permohonan">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Input permohonan informasi
            </div>
            <div class="card-body">
                <form action="<?= base_url('userpage/insert_permohonan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Informasi</label>
                        <select class="form-select" name="jenis_informasi">
                            <option selected disabled>Pilih jenis informasi..</option>
                            <?php foreach ($jenis_informasi as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis_informasi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset(session()->getFlashdata('validasi')['jenis_informasi'])) : ?>
                            <small class="invalid-validation"><?= session()->getFlashdata('validasi')['jenis_informasi']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="isi_permohonan" class="form-label">Isi permohonan</label>
                        <textarea class="form-control" id="isi_permohonan" name="isi_permohonan" rows="3"></textarea>
                        <?php if (isset(session()->getFlashdata('validasi')['isi_permohonan'])) : ?>
                            <small class="invalid-validation"><?= session()->getFlashdata('validasi')['isi_permohonan']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="file_permohonan" class="form-label">Upload file (jika ada)</label>
                        <input class="form-control" type="file" id="file_permohonan" name="file_permohonan">
                        <?php if (isset(session()->getFlashdata('validasi')['file_permohonan'])) : ?>
                            <small class="invalid-validation"><?= session()->getFlashdata('validasi')['file_permohonan']; ?></small>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="user_email" value="<?= session()->get('user_email'); ?>">

                    <div>
                        <button class="btn btn-info" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection(); ?>