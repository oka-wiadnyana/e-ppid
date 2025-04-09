<!-- Modal -->
<div class="modal fade modalTambahLevel3" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Level 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/tambah_level3'); ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="level1">Level 1</label>
                        <select class="form-control" id="level1" name="level1">
                            <option value="" selected disabled>Pilih Level 1...</option>
                            <?php foreach ($level1 as $l) : ?>
                                <option value="<?= $l['level1']; ?>"><?= $l['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group d-none level_2_input">
                        <label for="level2">Level 2</label>
                        <select class="form-control" id="level2" name="level2">

                        </select>
                    </div>
                    <div class="form-group d-none level_3_input">
                        <label for="level3">Level 3</label>
                        <input type="text" class="form-control" name="level3" id="level3" readonly>
                    </div>
                    <div class="form-group d-none level_3_nama">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama uraian...">
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

<script>
    $('#level1').change(function(e) {
        let valueLevel1 = $(this).val();
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/level3_level2'); ?>",
            data: {
                valueLevel1
            },
            dataType: "json",
            success: function(response) {

                $('.level_2_input').removeClass('d-none');
                $('#level2 option').remove();

                optLevel2(response, '#level2')
                console.log(response);
            }
        });
    })

    $('.modal-body').on('change', '#level2', function(e) {
        let valueLevel1 = $('#level1').val();
        let valueLevel2 = $(this).val();
        $.ajax({
            type: "post",
            url: "<?= base_url('admineppid/level3_level3'); ?>",
            data: {
                valueLevel1,
                valueLevel2
            },
            dataType: "json",
            success: function(response) {
                $('.level_3_input').removeClass('d-none');
                $('#level3').val(response);
                $('.level_3_nama').removeClass('d-none');

                // optLevel2(response, '#level2')
                console.log(response);
            }
        });
    })

    function optLevel2(level2, element) {

        $(element).append(`<option selected disabled>Pilih level 2...</option>`)
        $.each(level2, function(index, value) {
            $(element).append(`<option value=${value.level2}>${value.nama}</option>`)
        });
    }
</script>