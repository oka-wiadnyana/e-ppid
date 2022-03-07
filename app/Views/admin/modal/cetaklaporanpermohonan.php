<!-- Modal -->
<div class="modal fade" id="modal_cetak_lap_permohonan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cetak Laporan Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/cetak_laporan_permohonan'); ?>" method="post" target="_blank">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select class="form-control" id="bulan" name="bulan">
                            <option value="" selected disabled>Pilih bulan...</option>
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="" selected disabled>Pilih tahun...</option>
                            <?php $year = date('Y');  ?> <?php for ($i = 0; $i < 10; $i++) : ?>
                                <option value="<?= $year - $i; ?>"><?= $year - $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal laporan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <!-- <div class="form-group">
                        <label for="penyelesaian_kepegawaian" class="form-label">Rata-rata penyelesaian permohonan informasi kepegawaian</label>
                        <input type="text" class="form-control" name="penyelesaian_kepegawaian" id="penyelesaian_kepegawaian">
                    </div>
                    <div class="form-group">
                        <label for="penyelesaian_pengawasan" class="form-label">Rata-rata penyelesaian permohonan informasi pengawasan</label>
                        <input type="text" class="form-control" name="penyelesaian_pengawasan" id="penyelesaian_pengawasan">
                    </div>
                    <div class="form-group">
                        <label for="penyelesaian_anggaran_aset" class="form-label">Rata-rata penyelesaian permohonan informasi anggaran dan aset</label>
                        <input type="text" class="form-control" name="penyelesaian_anggaran_aset" id="penyelesaian_anggaran_aset">
                    </div>
                    <div class="form-group">
                        <label for="penyelesaian_lainnya" class="form-label">Rata-rata penyelesaian permohonan informasi lainnya</label>
                        <input type="text" class="form-control" name="penyelesaian_lainnya" id="penyelesaian_lainnya">
                    </div> -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>