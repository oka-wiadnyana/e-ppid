 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
 <!-- if berkala -->
 <section class="profil">
     <div class="container">
         <div class="row">
             <div class="row d-flex justify-content-center">
                 <div class="col-md-4">
                     <select class="form-select mb-3" id="select_tahun" aria-label="Default select example">
                         <option selected disabled>Pilih tahun</option>
                         <?php $year = date('Y');  ?>
                         <?php for ($i = 0; $i < 10; $i++) : ?>
                             <option value="<?= $year - $i; ?>"><?= $year - $i; ?></option>
                         <?php endfor; ?>
                     </select>
                 </div>
             </div>
             <div class="col">
                 <canvas id="myChart" width="50" height="20"></canvas>
             </div>
             <div class="mt-3">
                 <h4 class="text-center">Data Permohonan tahun <span class="judul_tahun"></span></h4>
             </div>
         </div>
         <div class="row mt-5">
             <div class="col" class="shadow">
                 <canvas id="myChart-2" width="50" height="20"></canvas>
             </div>
             <div class="mt-3">
                 <h4 class="text-center">Data Tanggapan atas Permohonan tahun <span class="judul_tahun"></span></4>
             </div>
         </div>

     </div>
 </section>

 <script>
     let tahun = new Date().getFullYear();
     let myChart;
     let myChart2;

     $('.judul_tahun').html(tahun);
     const data_perbulan = (tahun) => {

         $.ajax({
             type: "post",
             url: "<?= base_url('userpage/api_permohonan'); ?>",
             data: {
                 tahun
             },
             dataType: "json",
             success: function(response) {


                 let ctx = document.getElementById('myChart');
                 myChart = new Chart(ctx, {
                     type: 'line',
                     data: {
                         labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'],
                         datasets: [{
                             label: 'Data proses permohonan',
                             data: response,
                             fill: false,
                             borderColor: 'rgb(75, 192, 192)',
                             tension: 0.1
                         }]
                     },
                     options: {
                         scales: {
                             y: {
                                 beginAtZero: true
                             }
                         }
                     }
                 });
             }
         });
     }

     data_perbulan(tahun);


     const data_per_jenis = (tahun) => {

         $.ajax({
             type: "post",
             url: "<?= base_url('userpage/api_per_jenis'); ?>",
             data: {
                 tahun
             },
             dataType: "json",
             success: function(response) {


                 let ctx2 = document.getElementById('myChart-2');
                 myChart2 = new Chart(ctx2, {
                     type: 'bar',
                     data: {
                         labels: ['Perkara dan Putusan', 'Kepegawaian', 'Pengawasan', 'Anggaran dan Aset', 'Lainnya'],
                         datasets: [{
                             label: "Sepenuhnya",
                             backgroundColor: "blue",
                             data: response[0]
                         }, {
                             label: "Sebagian",
                             backgroundColor: "green",
                             data: response[1]
                         }, {
                             label: "Ditolak",
                             backgroundColor: "red",
                             data: response[2]
                         }]
                     },
                     options: {
                         scales: {
                             y: {
                                 beginAtZero: true
                             }
                         }
                     }
                 });
             }
         });
     }

     data_per_jenis(tahun);

     $('#select_tahun').change(function() {
         let tahun = $(this).val();
         $('.judul_tahun').html(tahun);

         if (myChart != null) {
             myChart.destroy();
         }
         data_perbulan(tahun);

         if (myChart2 != null) {
             myChart2.destroy();
         }
         data_per_jenis(tahun);

         console.log(myChart);
     })
 </script>




 <?= $this->endSection(); ?>