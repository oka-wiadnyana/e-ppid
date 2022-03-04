  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>DAFTAR LAYANAN ELEKTRONIK</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/tambah_layanan_elektronik'); ?>" class="btn btn-info mb-2 tambah_link">
      <i class="fas fa-plus-circle"></i>
      Tambah layanan elektronik
    </a>
  </div>
  <div class="table-wrapper">
    <table class="table table-bordered border-secondary" id="data_layanan_elektronik">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Alias</th>
          <th scope="col">Link</th>
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
    function table_data_layanan_elektronik() {
      let table = $('#data_layanan_elektronik').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/data_layanan_elektronik_datatable'); ?>",
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
      table_data_layanan_elektronik();
      $('#data_layanan_elektronik tbody').on('click', 'tr td:nth-child(4) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
          title: `Anda Yakin menghapus link ini?`,
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
              url: "<?= base_url('admineppid/delete_layanan_elektronik'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/v_layanan_elektronik'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#data_layanan_elektronik tbody').on('click', 'tr td:nth-child(4) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
          type: "post",
          data: {
            id,
          },
          url: "<?= base_url('admineppid/modal_edit_layanan_elektronik'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_edit_layanan_elektronik').modal('show');
          console.log(res)
        });

        console.log(id)
      });


    });
  </script>

  <?= $this->endSection(); ?>