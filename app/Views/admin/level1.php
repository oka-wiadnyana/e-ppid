  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>REFERENSI LEVEL1</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/modal_tambah_video'); ?>" class="btn btn-info mb-2 tambah_level1">
      <i class="fas fa-plus-circle"></i>
      Tambah Level 1
    </a>
  </div>
  <div class="table-wrapper">

    <table class="table" id="table_level1">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Level1</th>
          <th scope="col">Nama</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
  <!-- End Main Content -->

  <!-- modal -->
  <div id="modal_edit"></div>
  <div id="modal_tambah"></div>


  <script>
    function list_level1_datatable() {
      let table = $('#table_level1').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/level1_datatable'); ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "target": 0,
          "orderable": false
        }]

      })

    }


    $(document).ready(function() {
      list_level1_datatable();
      $('#table_level1 tbody').on('click', 'tr td:nth-child(4) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        Swal.fire({
          title: `Anda Yakin menghapus level : ${nama}?`,
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
              url: "<?= base_url('admineppid/delete_level1'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/v_level1'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#table_level1 tbody').on('click', 'tr td:nth-child(4) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
          type: "post",
          data: {
            id
          },
          url: "<?= base_url('admineppid/modal_edit_level1'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal_edit').html(res);
          $('#modalEditLevel1').modal('show');
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