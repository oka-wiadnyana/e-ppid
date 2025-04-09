 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 <section id="daftar_permohonan">
     <div class="container">
         <div class="row">
             <h1 class="text-center fw-bolder">Daftar Keberatan</h1>
         </div>
         <hr>
         <div class="table ">

             <table class="table table-bordered border-secondary" id="data_keberatan">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Nomor Register Informasi</th>
                         <th scope="col">Tanggal Keberatan</th>
                         <th scope="col">Jenis Keberatan</th>
                         <th scope="col">isi Keberatan</th>
                         <th scope="col">Status</th>
                         <th scope="col">Tanggapan Keberatan</th>
                         <th scope="col">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>

                 </tbody>
             </table>
         </div>

     </div>

     <div id="modal-edit"></div>
     <div id="modal-keberatan"></div>
 </section>

 <script>
     function table_data_permohonan() {
         let table = $('#data_keberatan').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [],
             "ajax": {
                 "url": "<?= base_url('userpage/data_keberatan_datatable'); ?>",
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
                     targets: 7,

                 },
                 {
                     responsivePriority: 2,
                     targets: 6,

                 },
                 {
                     responsivePriority: 2,
                     targets: 4,

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
         $('#data_keberatan tbody').on('click', 'tr td:nth-child(8) .delete_btn', function(e) {
             e.preventDefault();
             let id = $(this).data('id');
             let nama = $(this).data('nama');
             Swal.fire({
                 title: `Anda Yakin menghapus keberatan No. Reg. Permohonan : ${nama}?`,
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
                         url: "<?= base_url('userpage/delete_keberatan'); ?>",
                         dataType: "json",
                     }).done(function(res) {
                         $(location).attr('href', '<?= base_url('userpage/v_keberatan'); ?>')
                         console.log(res)
                     });
                 }
             })
             console.log(id)

         });

         $('#data_keberatan tbody').on('click', 'tr td:nth-child(8) .edit_btn', function(e) {
             e.preventDefault();
             let id = $(this).data('id');
             $.ajax({
                 type: "post",
                 data: {
                     id
                 },
                 url: "<?= base_url('userpage/modal_edit_keberatan'); ?>",
                 error: function(xhr, ajaxOptions, thrownError) {
                     alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
                 },
                 dataType: "json",
             }).then(function(res) {
                 $('#modal-edit').html(res);
                 $('#modal_edit_keberatan').modal('show');
                 console.log(res)
             });

             console.log(id)
         });

         $('#data_keberatan tbody').on('click', 'tr td:nth-child(9) .keberatan_btn', function(e) {
             e.preventDefault();
             let id = $(this).data('id');
             $.ajax({
                 type: "post",
                 data: {
                     id
                 },
                 url: "<?= base_url('userpage/modal_keberatan'); ?>",
                 error: function(xhr, ajaxOptions, thrownError) {
                     alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
                 },
                 dataType: "json",
             }).then(function(res) {
                 $('#modal-keberatan').html(res);
                 $('#modal_keberatan').modal('show');
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