  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>DATA LAPORAN LAYANAN INFORMASI</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/tambah_laporan'); ?>" class="btn btn-info mb-2 tambah_link">
      <i class="fas fa-plus-circle"></i>
      Tambah Laporan
    </a>
  </div>

  <div class="table-wrapper">
    <table class="table table-bordered border-secondary" id="data_statistik">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tahun</th>
          <th scope="col">Laporan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data_laporan == null) : ?>
          <tr>
            <td colspan="4" class="text-center">No Data</td>
          </tr>
        <?php endif; ?>
        <?php $no = 1; ?>
        <?php foreach ($data_laporan as $d) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['tahun']; ?></td>
            <td><a class='btn btn-primary' href="<?= base_url('admineppid/file_check_laporan/' . $d['laporan']); ?>" target="_blank">Lihat</a></td>
            <td><a href='' class='btn btn-info edit_btn' data-id="<?= $d['id']; ?>" style='border-radius:50%'><i class='fas fa-check-square'></i></a><a href='' class='btn btn-danger delete_btn' data-id="<?= $d['id']; ?>" style='border-radius:50%'><i class='fas fa-trash-alt'></i></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
  <!-- End Main Content -->

  <!-- modal -->
  <div id="modal"></div>
  <!-- <div id="modal_tambah"></div> -->


  <script>
    $(document).ready(function() {

      $('.delete_btn').click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
          title: `Anda Yakin menghapus data ini?`,
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
              url: "<?= base_url('admineppid/delete_laporan'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/v_laporan_layanan'); ?>');
              console.log(res);
            });
          }
        })
        console.log(id)

      });

      $('.edit_btn').click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
          type: "post",
          data: {
            id,
          },
          url: "<?= base_url('admineppid/modal_edit_laporan'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_edit_laporan').modal('show');
          console.log(res)
        });

        console.log(id)
      });
    })
  </script>

  <?= $this->endSection(); ?>