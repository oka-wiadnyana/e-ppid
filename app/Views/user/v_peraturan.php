 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <!-- if berkala -->
 <section class="profil">
     <div class="container">
         <div class="row">
             <h1 class="text-center fw-bolder">Peraturan Mengenai Keterbukaan Informasi Publik</h1>
             <hr>
         </div>
         <div class="row">

             <div class="col d-flex justify-content-center table-responsive">

                 <table class="table table-bordered border-secondary">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nomor</th>
                             <th scope="col">Tentang</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1; ?>
                         <?php foreach ($data_peraturan as $d) : ?>
                             <tr>
                                 <th scope="row"><?= $no++; ?></th>
                                 <td><?= $d['nomor_peraturan']; ?></td>
                                 <td><?= $d['tentang']; ?></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>


             </div>

         </div>
     </div>
 </section>




 <?= $this->endSection(); ?>