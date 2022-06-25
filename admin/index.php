<?php
include("../config/koneksi.php");
if (isset($_SESSION) && $_SESSION['login'] != true) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SPK TOPSIS | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/5a6c86310d.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- IonIcons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <link
      href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
      rel="stylesheet"
    />
  </head>
  <!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.html" class="nav-link">Home</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <label for="checkbox">
              <input
                type="checkbox"
                id="darkmode"
                data-toggle="toggle"
                data-size="small"
              />
              <span class="slider round"></span>
            </label>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">SPK TOPSIS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <?= $_SERVER['PHP_SELF'] == '/topsis/admin/index.php' ? '<a href="index.php" class="nav-link active">' : '<a href="index.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
               </li>
              <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/topsis/admin/alternatif.php' ? '<a href="alternatif.php" class="nav-link active">' : '<a href="alternatif.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Alternatif
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/topsis/admin/kriteria.php' ? '<a href="kriteria.php" class="nav-link active">' : '<a href="kriteria.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>
                    Data Kriteria
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/topsis/admin/penilaian.php' ? '<a href="penilaian.php" class="nav-link active">' : '<a href="penilaian.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Data Penilaian
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/topsis/admin/perhitungan.php' ? '<a href="perhitungan.php" class="nav-link active">' : '<a href="perhitungan.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-calculator"></i>
                  <p>
                    Data Perhitungan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <?= $_SERVER['PHP_SELF'] == '/topsis/admin/about.php' ? '<a href="about.php" class="nav-link active">' : '<a href="about.php" class="nav-link">'; ?>
                  <i class="nav-icon fas fa-info"></i>
                  <p>
                    Tentang Aplikasi
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <div class="sidebar-custom d-flex justify-content-center">
          <a href="../backend/logout.php" class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">SPK Penerima BANSOS</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <a class="text-dark" href="alternatif.php">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"
                    ><i class="fas fa-users"></i
                  ></span>

                    <div class="info-box-content">
                      <span class="text-xl">Alternatif</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <a class="text-dark" href="kriteria.php">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"
                    ><i class="fas fa-layer-group"></i
                  ></span>

                    <div class="info-box-content">
                      <span class="text-xl">Kriteria</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <a class="text-dark" href="penilaian.php">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"
                    ><i class="fas fa-clipboard-list"></i
                  ></span>

                    <div class="info-box-content">
                      <span class="text-xl">Penilaian</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </a>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <a class="text-dark" href="perhitungan.php">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"
                    ><i class="fas fa-calculator"></i
                  ></span>

                    <div class="info-box-content">
                      <span class="text-xl">Perhitungan</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </a>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Hasil Akhir
                </h3>

                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <?php
                if (isset($_SESSION['peringkat'])) {
                  echo '<div id="bar-chart" style="height: 300px"></div>';
                }else{
                  echo '<div class="text-center">Belum dilakukan perhitungan</div>';
                }
                ?>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong
          >Copyright &copy; 2022
          <a href="https://google.com">Maulana Alamsyah</a>.</strong
        >
        All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>
    <!-- FLOT CHARTS -->
    <script src="plugins/flot/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="plugins/flot/plugins/jquery.flot.pie.js"></script>

    <?php
    if (isset($_SESSION['peringkat'])) {
      $peringkat = $_SESSION['peringkat'];
      $bar_data = array();
      $ticks = array();
      $no = 1;
      foreach ($peringkat as $nama => $hasil) {
        array_push($bar_data, [$no, $hasil]);
        $no++;
      }
      $no = 1;
      foreach ($peringkat as $nama => $hasil) {
        array_push($ticks, [$no, $nama]);
        $no++;
      }
    ?>
    <script>
      $(document).on("change", "#darkmode", function () {
        if ($(this).is(":checked")) {
          $("body").addClass("dark-mode");
        } else {
          $("body").removeClass("dark-mode");
        }
      });

      /*
       * BAR CHART
       * ---------
       */

      var bar_data = {
        data: <?= json_encode($bar_data) ?>,
        bars: { show: true },
      };
      $.plot("#bar-chart", [bar_data], {
        grid: {
          borderWidth: 1,
          borderColor: "#f3f3f3",
          tickColor: "#f3f3f3",
        },
        series: {
          bars: {
            show: true,
            barWidth: 0.5,
            align: "center",
          },
        },
        colors: ["#3c8dbc"],
        xaxis: {
          ticks: <?= json_encode($ticks) ?>,
        },
      });
      <?php
    }
    ?>
    </script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
  </body>
</html>
