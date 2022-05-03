  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <!-- Main Content -->

  <!-- <div class="col-md-4">
    <div class="ct-chart ct-perfect-fourth"></div>
    <div class='col'>
      <p class='text-center'>Grafik Permohonan Informasi</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="ct-chart-2 ct-perfect-fourth"></div>
    <div class='col'>
      <p class='text-center'>Grafik Permohonan Informasi</p>
    </div>
  </div> -->
  <div class="row">
    <div class="col-md-4 p-2">
      <div class="col" class="shadow">
        <canvas id="myChart-1" width="100%" height="100%"></canvas>
      </div>
      <div>
        <p class="text-center">Proses Permohonan</p>
      </div>

    </div>
    <div class="col-md-4 p-2">
      <div class="col" class="shadow">
        <canvas id="myChart-2" width="100%" height="100%"></canvas>
      </div>
    </div>

    <div class="col-md-4 p-2">
      <div class="col" class="shadow">
        <canvas id="myChart-3" width="100%" height="100%"></canvas>
      </div>
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <div class="col-md-4">
      <select id="select_tahun" class="custom-select custom-select-lg mb-3">
        <option selected disabled>Pilih tahun</option>
        <?php $year = date('Y');  ?>
        <?php for ($i = 0; $i < 10; $i++) : ?>
          <option value="<?= $year - $i; ?>"><?= $year - $i; ?></option>
        <?php endfor; ?>
      </select>
    </div>
  </div>

  <div class="row d-flex flex-column">
    <div class="mt-3 mb-3 col">
      <h4 class="text-center">Data Permohonan Informasi masuk tahun <span class="judul_tahun"></span></4>
    </div>
    <div class="col">
      <canvas id="myChart-4" width="50" height="10"></canvas>
    </div>

  </div>


  <div class="row d-flex justify-content-center">
    <div class="col-md-4">
      <select id="select_tahun_pengaduan" class="custom-select custom-select-lg mb-3">
        <option selected disabled>Pilih tahun</option>
        <?php $year = date('Y');  ?>
        <?php for ($i = 0; $i < 10; $i++) : ?>
          <option value="<?= $year - $i; ?>"><?= $year - $i; ?></option>
        <?php endfor; ?>
      </select>
    </div>
  </div>

  <div class="row d-flex flex-column">
    <div class="mt-3 mb-3 col">
      <h4 class="text-center">Data Pengaduan masuk tahun <span class="judul_tahun_pengaduan"></span></4>
    </div>
    <div class="col">
      <canvas id="myChart-5" width="50" height="10"></canvas>
    </div>

  </div>


  <!-- End Main Content -->

  <!-- modal -->
  <div id="modal_edit"></div>


  <script>
    let total = '<?= $total; ?>';
    let proses = '<?= $diproses; ?>'
    let belum_proses = '<?= $belum_proses; ?>';
    let diterima = '<?= $diterima; ?>';
    let ditolak = '<?= $ditolak; ?>';
    let keberatan = '<?= $keberatan; ?>';
    let keberatan_proses = '<?= $keberatan_proses; ?>';
    let keberatan_belum_proses = '<?= $keberatan_belum_proses; ?>';


    const ctx = document.getElementById('myChart-1');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Total Permohonan', 'Proses', 'Belum Proses'],
        datasets: [{
          label: 'Data proses permohonan',
          data: [total, proses, belum_proses],
          backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',

          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',

          ],
          borderWidth: 1
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

    const ctx2 = document.getElementById('myChart-2');
    const myChart2 = new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Diterima', 'Ditolak'],
        datasets: [{
          label: 'Pemrosesan permohonan',
          data: [diterima, ditolak],
          backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',

          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',

          ],
          borderWidth: 1
        }]
      },
      // options: {
      //   scales: {
      //     y: {
      //       beginAtZero: true
      //     }
      //   }
      // }
    });

    const ctx3 = document.getElementById('myChart-3');
    const myChart3 = new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: ['Keberatan', 'Proses', 'Belum Proses'],
        datasets: [{
          label: 'Data proses permohonan',
          data: [keberatan, keberatan_proses, keberatan_belum_proses],
          backgroundColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',

          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',

          ],
          borderWidth: 1
        }]
      },
      // options: {
      //   scales: {
      //     y: {
      //       beginAtZero: true
      //     }
      //   }
      // }
    });

    //   var data = {
    //     // A labels array that can contain any sort of values
    //     labels: ['Sebagian', 'Sepenuhnya', 'Ditolak'],
    //     // Our series array that contains series objects or in this case series data arrays
    //     series: [
    //       [total, diterima, ditolak]
    //     ],

    //   };

    //   // Create a new line chart object where as first parameter we pass in a selector
    //   // that is resolving to our chart container element. The Second parameter
    //   // is the actual data object.
    //   new Chartist.Bar('.ct-chart', data);


    //   new Chartist.Pie('.ct-chart-2', {
    //     series: [total, diterima, ditolak]
    //   }, {
    //     donut: true,
    //     donutWidth: 60,
    //     donutSolid: true,
    //     startAngle: 270,
    //     showLabel: true
    //   });
    // 

    let myChart4;
    let tahun = new Date().getFullYear();
    $('.judul_tahun').html(tahun);
    const data_perbulan = (tahun) => {
      $.ajax({
        type: "post",
        url: "<?= base_url('admineppid/api_permohonan'); ?>",
        data: {
          tahun
        },
        dataType: "json",
        success: function(response) {
          const ctx4 = document.getElementById('myChart-4');
          myChart4 = new Chart(ctx4, {
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

    $('#select_tahun').change(function() {
      if (myChart4) {
        myChart4.destroy();
      }
      let tahun_select = $(this).val();
      $('.judul_tahun').html(tahun_select);
      let tahun = $(this).val();
      data_perbulan(tahun);
    })

    let myChart5;
    let tahun_pengaduan = new Date().getFullYear();
    $('.judul_tahun_pengaduan').html(tahun_pengaduan);
    const data_perbulan_pengaduan = (tahun) => {
      $.ajax({
        type: "post",
        url: "<?= base_url('adminpengaduan/api_permohonan'); ?>",
        data: {
          tahun
        },
        dataType: "json",
        success: function(response) {
          const ctx5 = document.getElementById('myChart-5');
          myChart5 = new Chart(ctx5, {
            type: 'line',
            data: {
              labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'],
              datasets: [{
                label: 'Data pengaduan',
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
    data_perbulan_pengaduan(tahun_pengaduan);

    $('#select_tahun_pengaduan').change(function() {
      if (myChart5) {
        myChart5.destroy();
      }
      let tahun_select = $(this).val();
      $('.judul_tahun_pengaduan').html(tahun_select);
      let tahun = $(this).val();
      data_perbulan_pengaduan(tahun);
    })
  </script>


  <?= $this->endSection(); ?>