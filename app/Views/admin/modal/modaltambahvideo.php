<!-- Modal -->
<div class="modal fade modalTambahVideo" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Link Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/tambah_video'); ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Masukkan uraian video...">
                    </div>
                    <div class="form-group">
                        <label for="embed_id">Embed Id</label>
                        <input type="text" class="form-control" name="embed_id" id="embed_id" placeholder="Masukkan id embed video...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>