<?= $this->extend('admin/layout/main'); ?>

<?= $this->section('main-content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


<!-- Main Content -->

<div class="row">
  <div class="col">
    <h3><i class="fas fa-tachometer-alt mr-2"></i>DAFTAR PENGADUAN</h3>
  </div>
</div>

<div class="table-wrapper">
  <table class="table table-bordered border-secondary" id="data_pengaduan">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal laporan</th>
        <th scope="col">Nama</th>
        <th scope="col">Periha</th>
        <th scope="col">Tempat</th>
        <th scope="col">Waktu</th>
        <th scope="col">Terlapor</th>
        <th scope="col">status</th>
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
  function table_pengaduan() {
    let table = $('#data_pengaduan').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= base_url('adminpengaduan/datatable_pengaduan'); ?>",
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
    table_pengaduan();
    $('#data_user').on('click', 'tr td:nth-child(9) .delete_btn', function(e) {
      e.preventDefault();
      let id = $(this).data('id');

      Swal.fire({
        title: `Anda Yakin menghapus user ini?`,
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
            url: "<?= base_url('userauth/delete_user'); ?>",
            dataType: "json",
          }).done(function(res) {
            $(location).attr('href', '<?= base_url('admineppid/v_user'); ?>')
            console.log(res)
          });
        }
      })
      console.log(id)

    });

    $('#data_pengaduan tbody').on('click', 'tr td:nth-child(9) .proses_btn', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      console.log(id);
      $.ajax({
        type: "post",
        data: {
          id,

        },
        url: "<?= base_url('adminpengaduan/modal_tanggapan'); ?>",
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        },
        dataType: "json",
      }).then(function(res) {
        $('#modal').html(res);
        $('#modal_tanggapan').modal('show');
        console.log(res)
      });

      console.log(id)
    });

    $('#data_pengaduan tbody').on('click', 'tr td:nth-child(9) .uraian-btn', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      console.log('ok');

      $.ajax({
        type: "post",
        data: {
          id,

        },
        url: "<?= base_url('adminpengaduan/modal_uraian'); ?>",
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        },
        dataType: "json",
      }).then(function(res) {
        $('#modal').html(res);
        $('#modal_uraian').modal('show');
        console.log(res)
      });


    });

    $('#data_pengaduan tbody').on('click', 'tr td:nth-child(8) .status-btn', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      console.log('ok');

      $.ajax({
        type: "post",
        data: {
          id,

        },
        url: "<?= base_url('adminpengaduan/modal_status'); ?>",
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
        },
        dataType: "json",
      }).then(function(res) {
        $('#modal').html(res);
        $('#modal_status').modal('show');
        console.log(res)
      });


    });



  });
</script>

<?= $this->endSection(); ?>