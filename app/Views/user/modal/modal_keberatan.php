<div class="modal" id="modal_keberatan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Permohonan Keberatan No. Reg. : <?= $nomor_register; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('userpage/insert_keberatan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Keberatan</label>
                        <select class="form-select" name="jenis_keberatan">
                            <option selected disabled>Pilih jenis keberatan..</option>
                            <?php foreach ($jenis_keberatan as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jenis_keberatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_keberatan" class="form-label">Isi Keberatan</label>
                        <textarea class="form-control" id="isi_keberatan" name="isi_keberatan" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div>
                        <button class="btn btn-info text-white" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>