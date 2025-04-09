<!-- Modal -->
<div class="modal fade" id="modal_edit_peraturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Peraturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/edit_peraturan'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="uraian">Nomor peraturan</label>
                        <input type="text" class="form-control" name="nomor_peraturan" id="nomor_peraturan" value="<?= $data_peraturan['nomor_peraturan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tentang">Tentang</label>
                        <input type="text" class="form-control" name="tentang" id="tentang" value="<?= $data_peraturan['tentang']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $data_peraturan['id']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>