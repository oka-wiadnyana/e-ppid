  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>DAFTAR STANDAR LAYANAN</h3>
    </div>
  </div>
  <?php if ($data_standar == null) : ?>
    <div>
      <a href="<?= base_url('admineppid/tambah_standar_layanan'); ?>" class="btn btn-info mb-2 tambah_link">
        <i class="fas fa-plus-circle"></i>
        Tambah Standar Layanan
      </a>
    </div>
  <?php endif; ?>
  <div class="table-wrapper">
    <table class="table table-bordered border-secondary" id="data_standar_layanan">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Maklumat Pelayanan</th>
          <th scope="col">Prosedur Permohonan</th>
          <th scope="col">Prosedur Keberatan</th>
          <th scope="col">Prosedur Sengketa</th>
          <th scope="col">Jalur dan Waktu</th>
          <th scope="col">Biaya</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

  </div>
  <!-- End Main Content -->

  <!-- modal -->
  <div id="modal"></div>
  <!-- <div id="modal_tambah"></div> -->


  <script>
    function table_data_permohonan() {
      let table = $('#data_standar_layanan').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/data_standar_datatable'); ?>",
          "type": "POST"
        },
        "columnDefs": [{
            "target": 0,
            "orderable": false,
          },
          {
            responsivePriority: 1,
            targets: 0,

          },
          {
            responsivePriority: 1,
            targets: -1,

          }
        ],
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true

      })

    }

    $(document).ready(function() {
      table_data_permohonan();
      $('#data_standar_layanan tbody').on('click', 'tr td:nth-child(8) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        Swal.fire({
          title: `Anda Yakin menghapus peraturan ini?`,
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
              url: "<?= base_url('admineppid/delete_peraturan'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/v_peraturan'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#data_standar_layanan tbody').on('click', 'tr td:nth-child(8) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
          type: "post",
          data: {
            id,
          },
          url: "<?= base_url('admineppid/modal_edit_standar'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_edit_standar').modal('show');
          console.log(res)
        });

        console.log(id)
      });
    })
  </script>

  <?= $this->endSection(); ?>