<!-- Modal -->
<div class="modal fade" id="modal_tolak_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tolak permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/tolak_permohonan'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="jawaban" class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" rows="3"><?php if (isset($data_proses)) : ?><?= $data_proses['jawaban']; ?><?php endif; ?>
                        </textarea>
                    </div>

                    <input type="hidden" name="id" value="<?= $id; ?>">
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