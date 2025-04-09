<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<form action="" id="form-tambah-link">
    <?= csrf_field(); ?>

    <div class="row">
        <div class="col">
            <h3><i class="fas fa-tachometer-alt mr-2"></i>TAMBAH PERATURAN</h3>
        </div>

    </div>
    <div class="row mb-2">
        <div class="col">
            <a href="" class="btn btn-success" id="tambah-input"><i class="fas fa-plus"></i> Tambah Input</a>

            <button type="submit" class="btn btn-info" id="simpan-input"><i class="fas fa-file"></i> Simpan peraturan</button>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor</th>
                <th scope="col">Tentang</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="input-aturan-table">
            <tr>
                <th scope="row" class="nomor">1</th>

                <td><input class="form-control" type="text" id="nomor" name="nomor[]" placeholder="Masukkan nomor peraturan..."></td>
                <td><input class="form-control" type="text" id="tentang" name="tentang[]" placeholder="Masukkan hal peraturan..."></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    </div>
</form>
<script>
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