<!-- Modal -->
<div class="modal fade" id="modal_tanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('adminpengaduan/insert_tanggapan'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="tanggapan" class="form-label">Tanggapan</label>
                        <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5"><?php if (isset($data['tanggapan'])) : ?><?= $data['tanggapan']; ?><?php endif; ?>
                        </textarea>
                    </div>
                    <label for="tanggapan" class="form-label">File Tanggapan</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file_tanggapan">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $data['id_pengaduan']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
</script>