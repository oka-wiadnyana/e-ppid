 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 <section id="daftar_permohonan">
     <div class="container">
         <table class="table table-bordered border-secondary" id="data_permohonan">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Jenis Informasi</th>
                     <th scope="col">Tanggal Permohonan</th>
                     <th scope="col">Isi Permohonan</th>
                     <th scope="col">File Permohonan</th>
                     <th scope="col">Aksi</th>
                 </tr>
             </thead>
             <tbody>

             </tbody>
         </table>

     </div>
 </section>

 <script>
     function table_data_permohonan() {
         let table = $('#data_permohonan').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [],
             "ajax": {
                 "url": "<?= base_url('userpage/data_permohonan_datatable'); ?>",
                 "type": "POST"
             },
             "columnDefs": [{
                 "target": 0,
                 "orderable": false
             }]

         })

     }

     $(document).ready(function() {
         table_data_permohonan();
         //      $('#table_level1 tbody').on('click', 'tr td:nth-child(4) .delete_btn', function(e) {
         //          e.preventDefault();
         //          let id = $(this).data('id');
         //          let nama = $(this).data('nama');
         //          Swal.fire({
         //              title: `Anda Yakin menghapus level : ${nama}?`,
         //              text: "Anda tidak dapat mengulanginya lagi",
         //              icon: 'warning',
         //              showCancelButton: true,
         //              confirmButtonColor: '#3085d6',
         //              cancelButtonColor: '#d33',
         //              confirmButtonText: 'Yes, hapus!',
         //              cancelButtonText: 'Batal'
         //          }).then((result) => {
         //              if (result.isConfirmed) {
         //                  $.ajax({
         //                      type: "post",
         //                      data: {
         //                          id
         //                      },
         //                      url: "<?= base_url('admineppid/delete_level1'); ?>",
         //                      dataType: "json",
         //                  }).done(function(res) {
         //                      $(location).attr('href', '<?= base_url('admineppid/v_level1'); ?>')
         //                      console.log(res)
         //                  });
         //              }
         //          })
         //          console.log(id)

         //      });

         //      $('#table_level1 tbody').on('click', 'tr td:nth-child(4) .edit_btn', function(e) {
         //          e.preventDefault();
         //          let id = $(this).data('id');
         //          $.ajax({
         //              type: "post",
         //              data: {
         //                  id
         //              },
         //              url: "<?= base_url('admineppid/modal_edit_level1'); ?>",
         //              error: function(xhr, ajaxOptions, thrownError) {
         //                  alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
         //              },
         //              dataType: "json",
         //          }).then(function(res) {
         //              $('#modal_edit').html(res);
         //              $('#modalEditLevel1').modal('show');
         //              console.log(res)
         //          });

         //          console.log(id)
         //      });


         //      $('.tambah_level1').click(function(e) {
         //          e.preventDefault();
         //          $.ajax({
         //              url: "<?= base_url('admineppid/modal_tambah_level1'); ?>",
         //              dataType: "json",
         //          }).done(function(res) {
         //              $('#modal_tambah').html(res);
         //              $('.modalTambahLevel1').modal('show');
         //              console.log(res);
         //          });
         //      })
     });
 </script>


 <?= $this->endSection(); ?>