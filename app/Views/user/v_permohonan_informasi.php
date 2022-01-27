 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 <section id="daftar_permohonan">
     <div class="container">

         <a href="<?= base_url('userpage/v_tambah_permohonan'); ?>" class="btn btn-info mb-2 text-white"><i class='bx bx-plus-circle'></i> Tambah</a>
         <hr>
         <div class="table ">

             <table class="table table-bordered border-secondary" id="data_permohonan">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Nomor Register</th>
                         <th scope="col">Jenis Informasi</th>
                         <th scope="col">Tanggal Permohonan</th>
                         <th scope="col">Isi Permohonan</th>
                         <th scope="col">File Permohonan</th>
                         <th scope="col">Status</th>
                         <th scope="col">Jawaban</th>
                         <th scope="col">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>

                 </tbody>
             </table>
         </div>

     </div>

     <div id="modal-edit"></div>
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
                     "orderable": false,
                 },
                 {
                     responsivePriority: 2,
                     targets: -1,

                 },
                 {
                     responsivePriority: 1,
                     targets: 7,

                 },
                 {
                     responsivePriority: 1,
                     targets: 6,

                 },
                 {
                     responsivePriority: 1,
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
         $('#data_permohonan tbody').on('click', 'tr td:nth-child(9) .delete_btn', function(e) {
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
                         url: "<?= base_url('userpage/delete_permohonan'); ?>",
                         dataType: "json",
                     }).done(function(res) {
                         $(location).attr('href', '<?= base_url('userpage/v_permohonan'); ?>')
                         console.log(res)
                     });
                 }
             })
             console.log(id)

         });

         $('#data_permohonan tbody').on('click', 'tr td:nth-child(9) .edit_btn', function(e) {
             e.preventDefault();
             let id = $(this).data('id');
             $.ajax({
                 type: "post",
                 data: {
                     id
                 },
                 url: "<?= base_url('userpage/modal_edit'); ?>",
                 error: function(xhr, ajaxOptions, thrownError) {
                     alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
                 },
                 dataType: "json",
             }).then(function(res) {
                 $('#modal-edit').html(res);
                 $('#modal_edit').modal('show');
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