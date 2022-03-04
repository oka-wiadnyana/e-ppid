 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <!-- if berkala -->
 <section class="profil">
     <div class="container">
         <div class="row">
             <h1 class="text-center fw-bolder">Laporan Layanan Informasi</h1>
             <hr>
         </div>
         <div class="row">
             <div class="col">
                 <div class="ratio ratio-21x9">
                     <iframe src="<?= base_url('admin_file/laporan/' . $data_laporan[0]['laporan']); ?>" title="YouTube video" allowfullscreen></iframe>
                 </div>

             </div>
         </div>

         <div class="row mt-3">
             <div class="table-responsive">
                 <table class="table table-bordered border-primary">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Tahun</th>
                             <th scope="col">Laporan</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1; ?>
                         <?php foreach (array_slice($data_laporan, 1) as $d) : ?>
                             <tr>
                                 <th scope="row"><?= $no++; ?></th>
                                 <td><?= $d['tahun']; ?></td>
                                 <td><a class='btn btn-primary' href="<?= base_url('userpage/file_check_laporan/' . $d['laporan']); ?>" target="_blank">Lihat</a></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>

         </div>

     </div>
 </section>




 <?= $this->endSection(); ?>