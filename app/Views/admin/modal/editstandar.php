<!-- Modal -->
<div class="modal fade" id="modal_edit_standar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="<?= base_url('admineppid/edit_standar_layanan'); ?>" id="form-tambah-standar" method="post" enctype="multipart/form-data" class="mt-3">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header bg-primary text-white">Edit Standar Layanan <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button></h5>

                            <div class="card-body">
                                <div class="col-md-6">
                                    <label for="maklumat">Maklumat layanan</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="maklumat" name="maklumat">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['maklumat']; ?></label>
                                        </div>
                                    </div>
                                    <label for="prosedur">Prosedur Permohonan Informasi</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="prosedur" name="prosedur">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['prosedur']; ?></label>
                                        </div>
                                    </div>

                                    <label for="keberatan">Prosedur pengajuan keberatan</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="keberatan" name="keberatan">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['keberatan']; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="sengketa">Prosedur sengketa informasi</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sengketa" name="sengketa">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['sengketa']; ?></label>
                                        </div>
                                    </div>
                                    <label for="jalur">Jalur dan waktu layanan</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="jalur" name="jalur">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['jalur']; ?></label>
                                        </div>
                                    </div>

                                    <label for="biaya">Biaya Layanan</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="biaya" name="biaya">
                                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_standar['biaya']; ?></label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="maklumat_lama" value="<?= $data_standar['maklumat']; ?>">
                                <input type="hidden" name="prosedur_lama" value="<?= $data_standar['prosedur']; ?>">
                                <input type="hidden" name="keberatan_lama" value="<?= $data_standar['keberatan']; ?>">
                                <input type="hidden" name="sengketa_lama" value="<?= $data_standar['sengketa']; ?>">
                                <input type="hidden" name="jalur_lama" value="<?= $data_standar['jalur']; ?>">
                                <input type="hidden" name="biaya_lama" value="<?= $data_standar['biaya']; ?>">
                                <input type="hidden" name="id" value="<?= $data_standar['id']; ?>">

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