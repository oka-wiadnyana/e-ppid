  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <h3><i class="fas fa-tachometer-alt mr-2"></i>DAFTAR KEBERATAN</h3>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <a href="" class="btn btn-primary mt-2 mb-3 btn-cetak">Cetak Laporan</a>
    </div>
  </div>
  <div class="table-wrapper">
    <table class="table table-bordered border-secondary" id="data_keberatan">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nomor Register</th>
          <th scope="col">Tanggal Keberatan</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Jawaban Informasi</th>
          <th scope="col">Jenis Keberatan</th>
          <th scope="col">Isi Keberatan</th>
          <th scope="col">Tanggapan Keberatan</th>
          <th scope="col">Status</th>
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
    function table_data_keberatan() {
      let table = $('#data_keberatan').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?= base_url('admineppid/data_keberatan_datatable'); ?>",
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

          },
          {
            responsivePriority: 2,
            targets: 8,

          },
          {
            responsivePriority: 2,
            targets: 7,

          },
          {
            responsivePriority: 2,
            targets: 6,

          }
        ],
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true

      })

    }

    $(document).ready(function() {
      table_data_keberatan();
      $('#data_keberatan tbody').on('click', 'tr td:nth-child(10) .delete_btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        Swal.fire({
          title: `Anda Yakin menghapus permohonan nomor : ${nama}?`,
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
              url: "<?= base_url('admineppid/delete_permohonan'); ?>",
              dataType: "json",
            }).done(function(res) {
              $(location).attr('href', '<?= base_url('admineppid/daftar_permohonan'); ?>')
              console.log(res)
            });
          }
        })
        console.log(id)

      });

      $('#data_keberatan tbody').on('click', 'tr td:nth-child(11) .accept_btn', function(e) {
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
          url: "<?= base_url('admineppid/modal_proses_keberatan'); ?>",
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
          },
          dataType: "json",
        }).then(function(res) {
          $('#modal').html(res);
          $('#modal_proses_keberatan').modal('show');
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

    $('.btn-cetak').click(function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?= base_url('admineppid/modal_cetak_lap_keberatan'); ?>",
        dataType: "json",

      }).done(function(res) {
        $('#modal').html(res);
        $('#modal_cetak_lap_keberatan').modal('show');
        console.log(res);
      });;
    })
  </script>

  <?= $this->endSection(); ?>