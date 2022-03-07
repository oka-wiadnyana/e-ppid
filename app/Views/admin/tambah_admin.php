<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<div class="clearfix"></div>
<div class="x_content">
    <br />
    <form id="form_admin" method="post" action="<?= base_url('adminauth/attempt_register'); ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <h5 class="text-center">Tambah Admin</h5>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= old('nama'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NIP <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nip" name="nip" required="required" class="form-control" value="<?= old('nip'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label for="jabatan" class="col-form-label col-md-3 col-sm-3 label-align">Jabatan <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <select id="jabatan" name="jabatan" class="form-control" required value="<?= old('jabatan'); ?>">
                    <option value="" selected disabled>Pilih Jabatan</option>
                    <option value="Atasan PPID">Atasan PPID</option>
                    <option value="PPID Kepaniteraan">PPID Kepaniteraan</option>
                    <option value="PPID Kesekretariatan">PPID Kesekretariatan</option>
                    <option value="Penanggung Jawab Informasi">Penanggung Jawab Informasi</option>
                    <option value="Petugas Meja Informasi">Petugas Meja Informasi</option>
                </select>
            </div>
        </div>
        <div class="item form-group">
            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input id="email" class="form-control" type="email" name="email" value="<?= old('email'); ?>">
            </div>
        </div>

        <div class="item form-group">
            <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input id="password" class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="item form-group">
            <label for="password2" class="col-form-label col-md-3 col-sm-3 label-align">Ulangi Password <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input id="password2" class="form-control" type="password" name="password2">
            </div>
        </div>
        <div class="input-group mb-3">
            <label for="foto_profil" class="col-form-label col-md-3 col-sm-3 label-align">Foto Profil</label>
            <div class="custom-file col-md-6 col-sm-6 ml-2">
                <input type="file" class="custom-file-input form-control " id="foto-profil" name="foto_profil">
                <label class="custom-file-label" for="inputGroupFile01">Choose file (jpg, png)</label>
            </div>
        </div>


        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).on('change', '.custom-file-input', function(event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    })
</script>

<?= $this->endSection(); ?>