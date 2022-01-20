  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>

  <!-- jsCalendar v1.4.4 Javascript and CSS from local -->
  <script src="<?= base_url('vio-admin'); ?>/src/vendor/jsCalender/source/jsCalendar.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('vio-admin'); ?>/src/vendor/jsCalender/source/jsCalendar.min.css" />

  <!-- Chart JS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>


  <!-- Main Content -->
  <div class="col-9 p-3 main-content">
    <div class="row">
      <div class="col">
        <h3><i class="fas fa-tachometer-alt mr-2"></i>DASHBOARD</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4">
        <div class="card text-white bg-info">
          <div class="card-body p-0">
            <div class="p-3">
              <i class="fas fa-users card-icon display-4"></i>
              <h5 class="card-title">Jumlah Pegawai</h5>
              <p class="card-text display-4">120</p>
            </div>
            <div class="card-footer card-footer-info text-center">
              <a href="#" class="card-link text-reset">Detail</a>
              <i class="fas fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-success">
          <div class="card-body p-0">
            <div class="p-3">
              <i class="fas fa-users card-icon display-4"></i>
              <h5 class="card-title">Jumlah Honorer</h5>
              <p class="card-text display-4">10</p>
            </div>
            <div class="card-footer card-footer-success text-center">
              <a href="#" class="card-link text-reset">Detail</a>
              <i class="fas fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning">
          <div class="card-body p-0">
            <div class="p-3">
              <i class="fas fa-users card-icon display-4"></i>
              <h5 class="card-title">Jumlah StakeHolder</h5>
              <p class="card-text display-4">120</p>
            </div>
            <div class="card-footer card-footer-warning text-center">
              <a href="#" class="card-link text-reset">Detail</a>
              <i class="fas fa-arrow-circle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6 d-flex justify-content-center">
        <div class="auto-jsCalendar material-theme" data-month-format="month YYYY"></div>
      </div>
      <div class="col-md-6 d-flex justify-content-center">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>

  <!-- End Main Content -->

  <!-- Chart initiation -->

  <script>
    const ctx = document.getElementById("myChart");
    const myChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        }, ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  </script>
  <?= $this->endSection(); ?>