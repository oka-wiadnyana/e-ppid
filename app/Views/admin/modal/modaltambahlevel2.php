<!-- Modal -->
<div class="modal fade modalTambahLevel2" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Level 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/tambah_level2'); ?>">
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
                        <input type="text" class="form-control" name="level2" id="level2" placeholder="Masukkan kode level 2..." readonly>
                    </div>
                    <div class="form-group d-none level_2_nama">
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
            url: "<?= base_url('admineppid/cek_level2'); ?>",
            data: {
                valueLevel1
            },
            dataType: "json",
            success: function(response) {
                $('.level_2_input').removeClass('d-none');
                $('.level_2_nama').removeClass('d-none');
                $('#level2').val(response);
                console.log(response);
            }
        });
    })
</script>