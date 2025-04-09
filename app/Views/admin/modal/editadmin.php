<!-- Modal -->
<div class="modal fade" id="modal_edit_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
                <br />
                <form id="form_admin" method="post" action="<?= base_url('adminauth/edit_admin'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= $data_admin['nama']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nip" name="nip" required="required" class="form-control" value="<?= $data_admin['nip']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="jabatan" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="jabatan" name="jabatan" class="form-control" required>
                                <option value="" disabled>Pilih Jabatan</option>
                                <option value="Atasan PPID/KPT/WKPT" <?= ($data_admin['jabatan'] == 'Atasan Atasan PPID/KPT/WKPT') ? 'selected' : ''; ?>>Atasan PPID/KPT/WKPT</option>
                                <option value="PPID Kesekretariatan/Sekretaris" <?= ($data_admin['jabatan'] == 'PPID Kesekretariatan/Sekretaris') ? 'selected' : ''; ?>>PPID Kesekretariatan/Sekretaris</option>
                                <option value="PPID Kepaniteraan/Panitera" <?= ($data_admin['jabatan'] == 'PPID Kepaniteraan/Panitera') ? 'selected' : ''; ?>>PPID Kepaniteraan/Panitera</option>
                                <option value="Penanggung Jawab Informasi" <?= ($data_admin['jabatan'] == 'Penanggung Jawab Informasi') ? 'selected' : ''; ?>>Penanggung Jawab Informasi</option>
                                <option value="Panmud Hukum" <?= ($data_admin['jabatan'] == 'Panmud Hukum') ? 'selected' : ''; ?>>Panmud Hukum</option>
                                <option value="Petugas Meja Informasi" <?= ($data_admin['jabatan'] == 'Petugas Meja Informasi') ? 'selected' : ''; ?>>Petugas Meja Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class="form-control" type="email" value="<?= $data_admin['email']; ?>" disabled>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <label for="foto_profil" class="col-form-label col-md-3 col-sm-3 label-align">Foto Profil</label>
                        <div class="custom-file col-md-6 col-sm-6 ml-2">
                            <input type="file" class="custom-file-input form-control " id="foto-profil" name="foto_profil">
                            <label class="custom-file-label" for="inputGroupFile01"><?= $data_admin['foto_profil']; ?></label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $data_admin['id']; ?>">
                    <input type="hidden" name="foto_lama" value="<?= $data_admin['foto_profil']; ?>">

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>