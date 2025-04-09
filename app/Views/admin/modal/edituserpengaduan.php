<!-- Modal -->
<div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
                <br />
                <form id="form_admin" method="post" action="<?= base_url('aduauth/edit_user'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col ">
                            <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= $data_user['nama']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col ">
                            <input type="text" id="email" name="email" class="form-control" value="<?= $data_user['email']; ?>" disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomor_telepon">Nomor telepon <span class="required">*</span>
                        </label>
                        <div class="col ">
                            <input type="text" id="nomor_hp" name="nomor_hp" required="required" class="form-control" value="<?= $data_user['nomor_hp']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col ">
                            <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?= $data_user['alamat']; ?>">
                        </div>
                    </div>

                    <div class="item form-group" style="margin-top: 1rem;">
                        <label for="inputGroupFile01" class="col-form-label col-md-3 col-sm-3 label-align">KTP</label>
                        <div class="col">

                            <input type="file" class="form-control" id="inputGroupFile01" name="ktp">
                        </div>
                    </div>
                    <div class="item form-group" style="margin-top: 1rem;">
                        <label for="inputGroupFile01" class="col-form-label col-md-3 col-sm-3 label-align">KTP lama</label>
                        <div class="col">

                            <input type="text" id="ktp" class="form-control" value="<?= $data_user['ktp']; ?>" readonly name="ktp_lama">
                        </div>

                    </div>


                    <input type="hidden" name="id" value="<?= $data_user['id']; ?>">

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