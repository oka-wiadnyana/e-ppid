<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Link Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/edit_video'); ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" name="new_uraian" id="new_uraian" value="<?= $data_link['uraian']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_link">Embed Id</label>
                        <input type="text" class="form-control" name="new_embed" id="new_embed" value="<?= $data_link['embed_id']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $data_link['id']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>