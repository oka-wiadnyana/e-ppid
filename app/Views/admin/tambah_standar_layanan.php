<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<form action="<?= base_url('admineppid/insert_standar_layanan'); ?>" id="form-tambah-standar" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Standar Layanan</h5>
                <div class="card-body">
                    <div class="col-md-6">
                        <label for="maklumat">Maklumat layanan</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="maklumat" name="maklumat">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <label for="prosedur">Prosedur Permohonan Informasi</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="prosedur" name="prosedur">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
                            </div>
                        </div>

                        <label for="keberatan">Prosedur pengajuan keberatan</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="keberatan" name="keberatan">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sengketa">Prosedur sengketa informasi</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="sengketa" name="sengketa">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
                            </div>
                        </div>
                        <label for="jalur">Jalur dan waktu layanan</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="jalur" name="jalur">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
                            </div>
                        </div>

                        <label for="biaya">Biaya Layanan</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="biaya" name="biaya">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
                </div>
            </div>
        </div>

    </div>

</form>
<script>
    $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })

    $('#tambah-input').click(function(e) {
        e.preventDefault();
        let nomor = parseInt($('.nomor').last().html()) + 1;
        $('#input-aturan-table').append(`
        <tr>
                <th scope="row" class="nomor">${nomor}</th>
                <td><input class="form-control" type="text" id="nomor" name="nomor[]" placeholder="Masukkan nomor peraturan..."></td>
                <td><input class="form-control" type="text" id="tentang" name="tentang[]" placeholder="Masukkan hal peraturan..."></td>
                <td><a href="" class="btn btn-danger rounded-circle" id="delete-uraian"><i class="fas fa-trash"></i></a></td>
            </tr>`)
    })

    $('#input-aturan-table').on('click', 'tr td #delete-uraian', (function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    }))

    $('#form-tambah-link').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/insert_peraturan'); ?>",
            data: $(this).serialize(),
            dataType: "json",
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
            },
            success: function(response) {
                if (response.msg == 'success') {
                    $(location).attr('href', '<?= base_url('admineppid/v_peraturan'); ?>')
                } else {
                    $(location).attr('href', '<?= base_url('admineppid/tambah_peraturan'); ?>')
                }
            }
        });
    })
</script>

<?= $this->endSection(); ?>