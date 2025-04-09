<div class="modal" id="modal_edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit permohonan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('userpage/edit_permohonan'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Informasi</label>
                        <select class="form-select" name="jenis_informasi">
                            <?php foreach ($list_jenis_informasi as $j) : ?>
                                <option value="<?= $j['id']; ?>" <?= ($j['jenis_informasi'] == $jenis_informasi) ? 'selected' : ''; ?>><?= $j['jenis_informasi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi_permohonan" class="form-label">Isi permohonan</label>
                        <textarea class="form-control" id="isi_permohonan" name="isi_permohonan" rows="3" value="<?= $isi_permohonan; ?>"><?= $isi_permohonan; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file_permohonan" class="form-label">Upload file baru (jika ada)</label>
                        <input class="form-control" type="file" id="file_permohonan" name="file_permohonan">
                    </div>

                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="file_lama" value="<?= $file_permohonan; ?>">

                    <div>
                        <button class="btn btn-info text-white" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>