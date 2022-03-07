<!-- Modal -->
<div class="modal fade" id="modal_cetak_lap_keberatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cetak Laporan Keberatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admineppid/cetak_laporan_keberatan'); ?>" method="post" target="_blank">
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
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Perkara dan Putusan</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Penyelesaian sengketa</h5>
                            <label for="perk_sengketa" class="form-label">Penyelesaian sengketa ke Komisi Informasi</label>
                            <input type="text" class="form-control" name="perk_sengketa" id="perk_sengketa">
                            <h5 class="card-title">Hasil Mediasi di Komisi Informasi</h5>
                            <label for="perk_berhasil" class="form-label">Berhasil</label>
                            <input type="text" class="form-control" name="perk_berhasil" id="perk_berhasil">
                            <label for="perk_gagal" class="form-label">Gagal</label>
                            <input type="text" class="form-control" name="perk_gagal" id="perk_gagal">
                            <h5 class="card-title">Status putusan komisi informasi</h5>
                            <label for="perk_menguatkan" class="form-label">Menguatkan Pengadilan</label>
                            <input type="text" class="form-control" name="perk_menguatkan" id="perk_menguatkan">
                            <label for="perk_menolak" class="form-label">Menguatkan Pemohon Informas</label>
                            <input type="text" class="form-control" name="perk_menolak" id="perk_menolak">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Kepegawaian</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Penyelesaian sengketa</h5>
                            <label for="kepeg_sengketa" class="form-label">Penyelesaian sengketa ke Komisi Informasi</label>
                            <input type="text" class="form-control" name="kepeg_sengketa" id="kepeg_sengketa">
                            <h5 class="card-title">Hasil Mediasi di Komisi Informasi</h5>
                            <label for="kepeg_berhasil" class="form-label">Berhasil</label>
                            <input type="text" class="form-control" name="kepeg_berhasil" id="kepeg_berhasil">
                            <label for="kepeg_gagal" class="form-label">Gagal</label>
                            <input type="text" class="form-control" name="kepeg_gagal" id="kepeg_gagal">
                            <h5 class="card-title">Status putusan komisi informasi</h5>
                            <label for="kepeg_menguatkan" class="form-label">Menguatkan Pengadilan</label>
                            <input type="text" class="form-control" name="kepeg_menguatkan" id="kepeg_menguatkan">
                            <label for="kepeg_menolak" class="form-label">Menguatkan Pemohon Informas</label>
                            <input type="text" class="form-control" name="kepeg_menolak" id="kepeg_menolak">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Pengawasan</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Penyelesaian sengketa</h5>
                            <label for="peng_sengketa" class="form-label">Penyelesaian sengketa ke Komisi Informasi</label>
                            <input type="text" class="form-control" name="peng_sengketa" id="peng_sengketa">
                            <h5 class="card-title">Hasil Mediasi di Komisi Informasi</h5>
                            <label for="peng_berhasil" class="form-label">Berhasil</label>
                            <input type="text" class="form-control" name="peng_berhasil" id="peng_berhasil">
                            <label for="peng_gagal" class="form-label">Gagal</label>
                            <input type="text" class="form-control" name="peng_gagal" id="peng_gagal">
                            <h5 class="card-title">Status putusan komisi informasi</h5>
                            <label for="peng_menguatkan" class="form-label">Menguatkan Pengadilan</label>
                            <input type="text" class="form-control" name="peng_menguatkan" id="peng_menguatkan">
                            <label for="peng_menolak" class="form-label">Menguatkan Pemohon Informas</label>
                            <input type="text" class="form-control" name="peng_menolak" id="peng_menolak">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Anggaran dan aset</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Penyelesaian sengketa</h5>
                            <label for="ang_sengketa" class="form-label">Penyelesaian sengketa ke Komisi Informasi</label>
                            <input type="text" class="form-control" name="ang_sengketa" id="ang_sengketa">
                            <h5 class="card-title">Hasil Mediasi di Komisi Informasi</h5>
                            <label for="ang_berhasil" class="form-label">Berhasil</label>
                            <input type="text" class="form-control" name="ang_berhasil" id="ang_berhasil">
                            <label for="ang_gagal" class="form-label">Gagal</label>
                            <input type="text" class="form-control" name="ang_gagal" id="ang_gagal">
                            <h5 class="card-title">Status putusan komisi informasi</h5>
                            <label for="ang_menguatkan" class="form-label">Menguatkan Pengadilan</label>
                            <input type="text" class="form-control" name="ang_menguatkan" id="ang_menguatkan">
                            <label for="ang_menolak" class="form-label">Menguatkan Pemohon Informas</label>
                            <input type="text" class="form-control" name="ang_menolak" id="ang_menolak">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Lainnya</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Penyelesaian sengketa</h5>
                            <label for="lain_sengketa" class="form-label">Penyelesaian sengketa ke Komisi Informasi</label>
                            <input type="text" class="form-control" name="lain_sengketa" id="lain_sengketa">
                            <h5 class="card-title">Hasil Mediasi di Komisi Informasi</h5>
                            <label for="lain_berhasil" class="form-label">Berhasil</label>
                            <input type="text" class="form-control" name="lain_berhasil" id="lain_berhasil">
                            <label for="lain_gagal" class="form-label">Gagal</label>
                            <input type="text" class="form-control" name="lain_gagal" id="lain_gagal">
                            <h5 class="card-title">Status putusan komisi informasi</h5>
                            <label for="lain_menguatkan" class="form-label">Menguatkan Pengadilan</label>
                            <input type="text" class="form-control" name="lain_menguatkan" id="lain_menguatkan">
                            <label for="lain_menolak" class="form-label">Menguatkan Pemohon Informas</label>
                            <input type="text" class="form-control" name="lain_menolak" id="lain_menolak">
                        </div>
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