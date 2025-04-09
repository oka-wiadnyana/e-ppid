<!-- Modal -->
<div class="modal fade" id="modal_proses_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Proses permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/proses_permohonan'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label for="status_jawaban" class="form-label">Status Jawaban</label>
                    <select class="custom-select custom-select-sm" name="status">
                        <?php if (!isset($data_proses)) : ?>
                            <option disabled selected>Pilih status jawaban</option>
                        <?php endif; ?>
                        <option value="Sepenuhnya" <?= (isset($data_proses) && $data_proses['status_jawaban'] == "Sepenuhnya") ? 'selected' : ''; ?>>Sepenuhnya</option>
                        <option value="Sebagian" <?= (isset($data_proses) && $data_proses['status_jawaban'] == "Sebagian") ? 'selected' : ''; ?>>Sebagian</option>
                    </select>
                    <div class="form-group">
                        <label for="jawaban" class="form-label">Jawaban</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" rows="3"><?php if (isset($data_proses)) : ?><?= $data_proses['jawaban']; ?><?php endif; ?>
                        </textarea>
                    </div>

                    <?php if (isset($data_proses) && $data_proses['lampiran_jawaban'] != null) : ?>
                        <label for="lampiran" class="form-label">File sebelumnya</label>
                        <input class="form-control" type="text" id="lampiran_sebelumnya" value="<?= $data_proses['lampiran_jawaban']; ?>">

                        <label for="hapus_file" class="form-label">Jawaban ini tanpa file?</label>
                        <select class="custom-select custom-select-sm" name="hapus_file">
                            <option value="Y">Tanpa File</option>
                            <option value="T">Dengan File</option>
                        </select>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="lampiran" class="form-label">Upload file (jika ada)</label>
                        <input class="form-control" type="file" id="lampiran" name="lampiran">
                    </div>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="nomor_register" value="<?= $nomor_register; ?>">
                    <input type="hidden" name="email" value="<?= $email; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>