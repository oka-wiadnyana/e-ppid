<div class="modal" id="modal_edit_keberatan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit keberatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('userpage/edit_keberatan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Keberatan</label>
                        <select class="form-select" name="jenis_keberatan">
                            <?php foreach ($jenis_keberatan as $j) : ?>
                                <option value="<?= $j['id']; ?>" <?= ($j['id'] == $jenis_keberatan_id) ? 'selected' : ''; ?>><?= $j['jenis_keberatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_keberatan" class="form-label">Isi keberatan</label>
                        <textarea class="form-control" id="isi_keberatan" name="isi_keberatan" rows="3" value="<?= $isi_keberatan; ?>"><?= $isi_keberatan; ?></textarea>
                    </div>
                    <input type="hidden" name="permohonan_id" value="<?= $permohonan_id; ?>">
                    <div>
                        <button class="btn btn-info text-white" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>