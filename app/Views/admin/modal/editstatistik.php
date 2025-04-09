<!-- Modal -->
<div class="modal fade" id="modal_edit_statistik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="<?= base_url('admineppid/edit_statistik'); ?>" id="form-tambah-standar" method="post" enctype="multipart/form-data" class="mt-3">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header bg-primary text-white">Edit Statistik dan Rekapitulasi <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button></h5>

                            <div class="card-body">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun" name="tahun" disabled>
                                            <?php $tahun = date('Y'); ?>
                                            <?php for ($i = 0; $i < 10; $i++) : ?>
                                                <option value="<?= $tahun - $i; ?>" <?= ($data_statistik['tahun'] == $tahun - $i) ? 'selected' : ''; ?>><?= $tahun - $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <label for="statistik">Statistik</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="statistik" name="statistik">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_statistik['statistik']; ?></label>
                                        </div>
                                    </div>
                                    <label for="rekapitulasi">Rekapitulasi</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="rekapitulasi" name="rekapitulasi">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_statistik['rekapitulasi']; ?></label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="statistik_lama" value="<?= $data_statistik['statistik']; ?>">
                                <input type="hidden" name="rekapitulasi_lama" value="<?= $data_statistik['rekapitulasi']; ?>">
                                <input type="hidden" name="id" value="<?= $data_statistik['id']; ?>">

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