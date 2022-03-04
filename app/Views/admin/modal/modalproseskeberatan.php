<!-- Modal -->
<div class="modal fade" id="modal_proses_keberatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Proses keberatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/proses_keberatan'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggapan" class="form-label">Tanggapan</label>
                        <textarea class="form-control" id="tanggapan" name="tanggapan" rows="3"><?php if (isset($data_proses)) : ?><?= $data_proses['tanggapan']; ?><?php endif; ?>
                        </textarea>
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