  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>LINK VIDEO</h3>
    </div>
  </div>
  <div>
    <a href="<?= base_url('admineppid/modal_tambah_video'); ?>" class="btn btn-info mb-2 tambah_video">
      <i class="fas fa-plus-circle"></i>
      Tambah Video
    </a>
  </div>
  <div class="table-wrapper">

    <table class="table" id="table_video">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Uraian</th>
          <th scope="col">Embed Id</th>
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
    function list_video_datatable() {
      let table = $('#table_video').DataTable({
        "processing": true,
        "serverSide": true,
        "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/video_datatable'); ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "target": 0,
          "orderable": false
        }]

      })

    }


    $(document).ready(function() {
      list_video_datatable();
      $('#table_video tbody').on('click', 'tr td:nth-child(4) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let embed_id = $(this).data('embed');
        Swal.fire({
          title: `Anda Yakin menghapus id : ${embed_id}?`,
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
              url: "<?= base_url('admineppid/delete_video'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/list_video'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#table_video tbody').on('click', 'tr td:nth-child(4) .edit_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
          type: "post",
          data: {
            id
          },
          url: "<?= base_url('admineppid/modal_edit_video'); ?>",
          dataType: "json",
        }).then(function(res) {
          $('#modal_edit').html(res);
          $('.modal').modal('show');
          console.log(res)
        });

        console.log(id)
      });


      $('.tambah_video').click(function(e) {
        e.preventDefault();
        $.ajax({
          url: "<?= base_url('admineppid/modal_tambah_video'); ?>",
          dataType: "json",
        }).done(function(res) {
          $('#modal_tambah').html(res);
          $('.modalTambahVideo').modal('show');
        });
      })
    });
  </script>


  <?= $this->endSection(); ?>