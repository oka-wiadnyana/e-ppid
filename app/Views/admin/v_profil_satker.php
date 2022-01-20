  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>


  <!-- Main Content -->

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Profil Satker</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form method="post" action="<?= base_url('admineppid/manipulate_profil_satker'); ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <fieldset disabled='disabled'>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Pengadilan</label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama" name="nama" class="form-control " <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['nama']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Pendek </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama_pendek" name="nama_pendek" class="form-control" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['nama_pendek']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="alamat" class="form-control" type="text" name="alamat" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['alamat']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="nomor_telepon" class="form-control" type="text" name="nomor_telepon" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['nomor_telepon']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nomor Fax</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="nomor_fax" class="form-control" type="text" name="nomor_fax" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['nomor_fax']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="email" class="form-control" type="text" name="email" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['email']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Website</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="website" class="form-control" type="text" name="website" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_satker']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Link Youtube</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="youtube" class="form-control" type="text" name="youtube" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_youtube']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Link Facebook</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="facebook" class="form-control" type="text" name="facebook" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_facebook']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Link Instagram</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="instagram" class="form-control" type="text" name="instagram" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_instagram']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Link Twitter</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="twitter" class="form-control" type="text" name="twitter" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_twitter']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Embed Id Video Dashboard</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="embed_id" class="form-control" type="text" name="embed_id" <?php if (isset($profilSatker)) : ?> value="<?= $profilSatker['link_video_dashboard']; ?>" <?php endif; ?>>
                </div>
              </div>
              <div class="item form-group">
                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Logo PN</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="logo" class="form-control" type="file" name="logo">
                </div>

              </div>
              <?php if (isset($profilSatker)) : ?>
                <div class="item form-group">
                  <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Logo sebelumnya</label>
                  <div class="col-md-6 col-sm-6 ">
                    <img src="<?= base_url('img/' . $profilSatker['logo']); ?>" class="img-fluid" alt="" width="50vmin">
                  </div>
                </div>
                <input type="hidden" name="logo-lama" value="<?= $profilSatker['logo']; ?>">
                <input type="hidden" name="id" value="<?= $profilSatker['id']; ?>">
              <?php endif; ?>

            </fieldset>

            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-primary" id="cancel-edit" type="button">Cancel</button>
                <button class="btn btn-primary" id="button-edit" type="button">Edit</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#button-edit').click(function(e) {
      $('fieldset').removeAttr('disabled');

    })
    $('#cancel-edit').click(function(e) {
      $('fieldset').attr('disabled', 'disabled');

    })
  </script>

  <?= $this->endSection(); ?>