<!-- Modal -->
<div class="modal fade" id="modalEditLevel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Level 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/edit_level2'); ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="level1">Level 1</label>
                        <input type="text" class="form-control" name="level1" id="level1" value="<?= $data_level2['level1']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="level2">Level 2</label>
                        <input type="text" class="form-control" name="level2" id="level2" value="<?= $data_level2['level2']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_level2['nama']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $data_level2['id']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>