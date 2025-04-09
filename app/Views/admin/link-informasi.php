  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>LINK INFORMASI</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/tambah_link'); ?>" class="btn btn-info mb-2 tambah_link">
      <i class="fas fa-plus-circle"></i>
      Tambah Link
    </a>
  </div>
  <div class="table-wrapper">

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Level1</th>
          <th scope="col">Level2</th>
          <th scope="col">Level3</th>
          <th scope="col">Level4</th>
          <th scope="col">Uraian</th>
          <th scope="col">Link</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($listLink as $link) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $link['level1']; ?></td>
            <td><?= $link['level2']; ?></td>
            <td><?= $link['level3']; ?></td>
            <td><?= $link['level4']; ?></td>
            <td><?= $link['uraian']; ?></td>
            <td><a href="<?= $link['link']; ?>" class="btn btn-info" style="border-radius:50%" target="_blank"><i class="fas fa-external-link-alt"></i></a></td>
            <td><a href="" class="btn btn-warning edit_btn" data-id="<?= $link['id']; ?>" style="border-radius:50%"><i class="fas fa-edit"></i></a><a href="" class="btn btn-danger delete_btn" data-id="<?= $link['id']; ?>" data-uraian="<?= $link['uraian']; ?>" style="border-radius:50%"><i class="fas fa-trash"></i></a></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <!-- End Main Content -->

  <!-- modal -->
  <div id="modal_edit"></div>


  <script>
    $('.edit_btn').each(function() {
      $(this).click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
          type: "post",
          data: {
            id
          },
          url: "<?= base_url('admineppid/modal_edit'); ?>",
          dataType: "json",
        }).then(function(res) {
          // $('#modal_edit').css('z-index', 1000);
          $('#modal_edit').html(res);
          $('.modal').modal('show');
          console.log(res)
        });
      })
    })


    $('.delete_btn').click(function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      let uraian = $(this).data('uraian');
      Swal.fire({
        title: `Anda Yakin menghapus tombol ${uraian}?`,
        text: "Anda tidak dapat mengulanginya lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "post",
            data: {
              id
            },
            url: "<?= base_url('admineppid/delete_link'); ?>",
            dataType: "json",
          }).done(function(res) {
            $(location).attr('href', '<?= base_url('admineppid/list_informasi'); ?>')
            console.log(res)
          });
        }
      })
      console.log(id)
    })
  </script>


  <?= $this->endSection(); ?>