<!-- Modal -->
<div class="modal fade" id="modal_edit_laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="<?= base_url('admineppid/edit_laporan'); ?>" id="form-tambah-standar" method="post" enctype="multipart/form-data" class="mt-3">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header bg-primary text-white">Edit Laporan Layanan <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button></h5>

                            <div class="card-body">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun" name="tahun" disabled>
                                            <?php $tahun = date('Y'); ?>
                                            <?php for ($i = 0; $i < 10; $i++) : ?>
                                                <option value="<?= $tahun - $i; ?>" <?= ($data_laporan['tahun'] == $tahun - $i) ? 'selected' : ''; ?>><?= $tahun - $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <label for="laporan">Laporan</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="laporan" name="laporan">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_laporan['laporan']; ?></label>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="laporan_lama" value="<?= $data_laporan['laporan']; ?>">
                                <input type="hidden" name="id" value="<?= $data_laporan['id']; ?>">

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>

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