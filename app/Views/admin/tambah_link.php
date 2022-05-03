<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<form action="" id="form-tambah-link">
    <?= csrf_field(); ?>

    <div class="row">
        <div class="col">
            <h3><i class="fas fa-tachometer-alt mr-2"></i>TAMBAH LINK</h3>
        </div>

    </div>
    <div class="row mb-2">
        <div class="col">
            <a href="" class="btn btn-success" id="tambah-uraian"><i class="fas fa-plus"></i> Tambah Input</a>

            <button type="submit" class="btn btn-info" id="simpan-uraian"><i class="fas fa-file"></i> Simpan link</button>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Level 1</th>
                <th scope="col">Level 2</th>
                <th scope="col">Level 3 </th>
                <th scope="col">Uraian</th>
                <th scope="col">Link</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="input-link-table">
            <tr>
                <th scope="row" class="nomor">1</th>
                <td>
                    <select class="form-control" id="level1" name="level1[]">
                        <option value="" selected disabled>Pilih Level 1...</option>
                        <?php foreach ($level1 as $l) : ?>
                            <option value="<?= $l['level1']; ?>"><?= $l['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><select class="form-control" id="level2" name="level2[]">

                    </select></td>
                <td><select class="form-control" id="level3" name="level3[]">

                    </select></td>
                <td><input class="form-control" type="text" id="uraian" name="uraian[]" placeholder="Masukkan uraian..."></td>
                <td><input class="form-control" type="text" id="link" name="link[]" placeholder="Masukkan link..."></td>
                <td></td>
            </tr>
        </tbody>
    </table>


    </div>
</form>
<script>
    $('#input-link-table').on('change', 'tr td #level1', (function(e) {
        let level2_option = $(this).parent().siblings().find('#level2').children('option');
        let level2 = $(this).parent().siblings().find('#level2');
        let valueLevel1 = $(this).val();
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/level3_level2'); ?>",
            data: {
                valueLevel1
            },
            dataType: "json",
            success: function(response) {

                level2_option.remove();

                optLevel2(response, level2);
                console.log(response);
            }
        });
    }))


    $('#input-link-table').on('change', 'tr td #level2', (function(e) {
        let level3_option = $(this).parent().siblings().find('#level3 option');
        let level3 = $(this).parent().siblings().find('#level3');
        let valueLevel1 = $(this).parent().siblings().find('#level1').val();
        let valueLevel2 = $(this).val();
        // console.log(valueLevel1);
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/list_level3'); ?>",
            data: {
                valueLevel1,
                valueLevel2
            },
            dataType: "json",
            success: function(response) {

                level3_option.remove();
                optLevel3(response, level3)
                console.log(response);
            }
        });
    }))



    $('#input-link-table').on('change', 'tr td #level3', (function(e) {
        let level4 = $(this).parent().siblings().find('#level4');
        let valueLevel1 = $(this).parent().siblings().find('#level1').val();
        let valueLevel2 = $(this).parent().siblings().find('#level2').val();
        let valueLevel3 = $(this).val();
        // console.log(valueLevel1);
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/get_max_level4'); ?>",
            data: {
                valueLevel1,
                valueLevel2,
                valueLevel3
            },
            dataType: "json",
            success: function(response) {
                level4.val(response);
                // optLevel3(response, '#level3')
                console.log(response);
            }
        });
    }))

    function optLevel2(level2, element) {

        $(element).append(`<option selected disabled>Pilih level 2...</option>`)
        $.each(level2, function(index, value) {
            $(element).append(`<option value=${value.level2}>${value.nama}</option>`)
        });
    }

    function optLevel3(level3, element) {

        $(element).append(`<option selected disabled>Pilih level 3...</option>`)
        $.each(level3, function(index, value) {
            $(element).append(`<option value=${value.level3}>${value.nama}</option>`)
        });
    }

    $('#tambah-uraian').click(function(e) {
        e.preventDefault();
        let nomor = parseInt($('.nomor').last().html()) + 1;
        $('#input-link-table').append(`
        <tr>
                <th scope="row" class="nomor">${nomor}</th>
                <td>
                    <select class="form-control" id="level1" name="level1[]">
                        <option value="" selected disabled>Pilih Level 1...</option>
                        <?php foreach ($level1 as $l) : ?>
                            <option value="<?= $l['level1']; ?>"><?= $l['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><select class="form-control" id="level2" name="level2[]">

                    </select></td>
                <td><select class="form-control" id="level3" name="level3[]">

                    </select></td>
                <td><input class="form-control" type="text" id="uraian" name="uraian[]" placeholder="Masukkan uraian..."></td>
                <td><input class="form-control" type="text" id="link" name="link[]" placeholder="Masukkan link..."></td>
                <td><a href="" class="btn btn-danger rounded-circle" id="delete-uraian"><i class="fas fa-trash"></i></a></td>
            </tr>`)
    })

    $('#input-link-table').on('click', 'tr td #delete-uraian', (function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    }))

    $('#form-tambah-link').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/insert_link'); ?>",
            data: $(this).serialize(),
            dataType: "json",
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
            },
            success: function(response) {
                console.log(response);
                if (response.msg == 'sukses') {
                    $(location).attr('href', '<?= base_url('admineppid/list_informasi'); ?>')
                } else {
                    $(location).attr('href', '<?= base_url('admineppid/tambah_link'); ?>')
                }
            }
        });
    })
</script>

<?= $this->endSection(); ?>