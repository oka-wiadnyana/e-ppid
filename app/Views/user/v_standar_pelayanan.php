 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <!-- if berkala -->
 <section class="profil">
     <div class="container">
         <div class="row">
             <h1 class="text-center fw-bolder"><?= $judul; ?></h1>
             <hr>
         </div>
         <div class="row">

             <div class="col d-flex justify-content-center">
                 <img class="img-fluid" src="<?= base_url('admin_file/standar_layanan/' . $data_layanan[$jenis]); ?>" alt="">
             </div>

         </div>
     </div>
 </section>




 <?= $this->endSection(); ?>