<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<div class="clearfix"></div>
<div class="x_content">
    <br />
    <form id="form_admin" method="post" action="<?= base_url('userauth/attempt_register/admin'); ?>">
        <?= csrf_field(); ?>
        <h5 class="text-center">Tambah User</h5>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nik" name="nik" required="required" class="form-control " value="<?= old('nik'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= old('nama'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="email" name="email" required="required" class="form-control" value="<?= old('email'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomor_telepon">Nomor_telepon <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="nomor_telepon" name="nomor_telepon" required="required" class="form-control" value="<?= old('nomor_telepon'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?= old('alamat'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan">pekerjaan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="pekerjaan" name="pekerjaan" required="required" class="form-control" value="<?= old('pekerjaan'); ?>">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="institusi">Institusi</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="institusi" name="institusi" class="form-control" value="<?= old('institusi'); ?>">
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

        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>



<?= $this->endSection(); ?>