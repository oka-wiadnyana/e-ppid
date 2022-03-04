  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>DAFTAR PERATURAN</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/tambah_peraturan'); ?>" class="btn btn-info mb-2 tambah_link">
      <i class="fas fa-plus-circle"></i>
      Tambah peraturan
    </a>
  </div>
  <div class="table-wrapper">
    <table class="table table-bordered border-secondary" id="data_peraturan">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nomor Peraturan</th>
          <th scope="col">Tentang</th>
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
      let table = $('#data_peraturan').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/data_peraturan_datatable'); ?>",
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
      $('#data_peraturan tbody').on('click', 'tr td:nth-child(4) .delete_btn', function(e) {
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

      $('#data_peraturan tbody').on('click', 'tr td:nth-child(4) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
          type: "post",
          data: {
            id,
          },
          url: "<?= base_url('admineppid/modal_edit_peraturan'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_edit_peraturan').modal('show');
          console.log(res)
        });

        console.log(id)
      });

      $('#data_permohonan tbody').on('click', 'tr td:nth-child(11) .reject_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let nomor_register = $(this).data('register');
        let email = $(this).data('email');
        $.ajax({
          type: "post",
          data: {
            id,
            nomor_register,
            email
          },
          url: "<?= base_url('admineppid/modal_tolak_permohonan'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_tolak_permohonan').modal('show');
          console.log(res)
        });

        console.log(id)
      });


      $('.tambah_level1').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= base_url('admineppid/modal_tambah_level1'); ?>",
          dataType: "json",
        }).done(function(res) {
          $('#modal_tambah').html(res);
          $('.modalTambahLevel1').modal('show');
          console.log(res);
        });
      })
    });
  </script>

  <?= $this->endSection(); ?>