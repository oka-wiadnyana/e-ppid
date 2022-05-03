<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<div class="clearfix"></div>
<div class="x_content">
    <br />
    <form id="form_admin" method="post" action="<?= base_url('aduauth/attempt_register/admin'); ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <h5 class="text-center">Tambah User</h5>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= old('nama'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="email" name="email" required="required" class="form-control " value="<?= old('email'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?= old('alamat'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomor_telepon">Nomor telepon <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nomor_hp" name="nomor_hp" required="required" class="form-control" value="<?= old('nomor_hp'); ?>">
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
        <div class="item form-group">
            <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Upload KTP<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input id="ktp" class="form-control" type="file" name="ktp">
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



<?= $this->endSection(); ?>