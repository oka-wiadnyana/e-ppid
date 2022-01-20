  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>REFERENSI LEVEL 3</h3>
    </div>
  </div>
  <div>
    <a href="" class="btn btn-info mb-2 tambah_level3">
      <i class="fas fa-plus-circle"></i>
      Tambah Level 3
    </a>
  </div>
  <div class="table-wrapper">

    <table class="table" id="table_level3">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Level 1</th>
          <th scope="col">Level 2</th>
          <th scope="col">Level 3</th>
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
    function list_level3_datatable() {
      let table = $('#table_level3').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/level3_datatable'); ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "target": 0,
          "orderable": false
        }]

      })

    }


    $(document).ready(function() {
      list_level3_datatable();
      $('#table_level3 tbody').on('click', 'tr td:nth-child(6) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let level1 = $(this).data('level1');
        let level2 = $(this).data('level2');
        let level3 = $(this).data('level3');
        Swal.fire({
          title: `Anda Yakin menghapus level1 : ${level1}, level2 : ${level2}, dan level3 : ${level3}?`,
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
              url: "<?= base_url('admineppid/delete_level3'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/v_level3'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#table_level3 tbody').on('click', 'tr td:nth-child(6) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
          type: "post",
          data: {
            id
          },
          url: "<?= base_url('admineppid/modal_edit_level3'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal_edit').html(res);
          $('#modalEditLevel3').modal('show');
          console.log(res)
        });

        console.log(id)
      });


      $('.tambah_level3').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= base_url('admineppid/modal_tambah_level3'); ?>",
          dataType: "json",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          }
        }).done(function(res) {
          $('#modal_tambah').html(res);
          $('.modalTambahLevel3').modal('show');
        });
      })
    });
  </script>


  <?= $this->endSection(); ?>