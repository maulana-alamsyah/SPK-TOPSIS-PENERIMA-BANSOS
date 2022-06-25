<?php
include("../config/koneksi.php");
if (isset($_SESSION) && $_SESSION['login'] != true) {
  header('location: ../index.php');
}
$getPenilaian = $db->mysqli->query("SELECT * FROM tbl_penilaian");
$getAlternatif = $db->mysqli->query("SELECT * FROM tbl_alternatif");
$getKriteria = $db->mysqli->query("SELECT * FROM tbl_kriteria");

$jumlah_alternatif = $getAlternatif->num_rows;
$jumlah_kriteria = $getKriteria->num_rows;



$ternormalisasi = array();
$ternormalisasi_terbobot = array();
$aplus = array();
$amin = array();
$crange = array();
$dplus = array();
$dminus = array();

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
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <script
      src="https://kit.fontawesome.com/5a6c86310d.js"
      crossorigin="anonymous"
    ></script>
    <!-- IonIcons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
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
                <h1 class="m-0">Dashboard</h1>
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
            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Matrix Keputusan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <?php
                                    $a=1;
                                    $A=1;
                                    foreach ($getAlternatif as $row) {
                                      $al[$a] = $row['id'];
                                      $a++;
                                    }
                                    foreach ($getPenilaian as $row) {
                                      echo "<tr>
                                      <td>". $row['nama'] ."
                                      </td>";
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        $kolom = "c00" . $i;
                                        if(strpos($row[$kolom], ".") !== false){
                                          $c[$A][$i] = str_replace(".", "", $row[$kolom]);
                                        }else{
                                          $c[$A][$i] = $row[$kolom];
                                        }
                                        echo "<td>". $row[$kolom] ."
                                        </td>";
                                      }
                                      $A++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Bobot Kriteria
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    $result = $db->mysqli->query("SELECT * FROM tbl_kriteria");
                                    $no=1;
                                    foreach ($result as $row) {
                                            echo "<td>". $row['bobot'] ."
                                            </td>";
                                    }
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Pembagi
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    $result = $db->mysqli->query("SELECT * FROM tbl_penilaian");
                                    $no=1;
                                    for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                      $krit = 'c' . $i;
                                      $b13[$krit] = 0;
                                    }

                                    for ($a=1; $a <= $jumlah_alternatif; $a++) { 
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          $kriteria = "c".$i;
                                          $b13[$kriteria] += pow($c[$a][$i], 2);
                                      }
                                    }
                                    echo "<tr>";

                                    for ($i=1; $i <= $jumlah_kriteria; $i++) {
                                      $kolom = "c" .$i;
                                      echo "<td>".sqrt($b13[$kolom])."
                                      </td>";
                                    }
                                    echo "</tr>";
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Ternormalisasi
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                      $kriteria = "c".$i;
                                      for ($a=1; $a <= $jumlah_alternatif; $a++) { 
                                       $ternormalisasi[$a][$i] = $c[$a][$i]/sqrt($b13[$kriteria]) . "<br/>";
                                      }
                                    }
                                    
                                    for ($a=1; $a <= $jumlah_alternatif ; $a++) { 
                                      echo "<tr>";
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        echo "<td>" . $ternormalisasi[$a][$i] . "</td>";
                                      }
                                      echo "</tr>";
                                    };
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Ternormalisasi Terbobot
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    $inc = 1;
                                    foreach ($getKriteria as $row) {
                                        for ($a=1; $a <= $jumlah_alternatif; $a++) { 
                                         $ternormalisasi_terbobot[$a][$inc] = (float) $ternormalisasi[$a][$inc] * (int) $row['bobot'];
                                  
                                        }
                                        $inc++;
                                      }
                                    
                                    for ($a=1; $a <= $jumlah_alternatif ; $a++) { 
                                      echo "<tr>";
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        echo "<td>" . $ternormalisasi_terbobot[$a][$i] . "</td>";
                                      }
                                      echo "</tr>";
                                    };
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> A+
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    for ($a=1; $a <= $jumlah_alternatif ; $a++) { 
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        $crange[$i][$a] = $ternormalisasi_terbobot[$a][$i];
                                      }
                                    }

                                    $inc = 1;
                                    foreach ($getKriteria as $row) {
                                        if($row['jenis'] == "Benefit"){
                                          $aplus[$inc] = max($crange[$inc]);
                                          $aminus[$inc] = min($crange[$inc]);
                                        }else{
                                          $aplus[$inc] = min($crange[$inc]);
                                          $aminus[$inc] = max($crange[$inc]);
                                        }
                                        $inc++;
                                      }
                                    
                                    for ($a=1; $a <= $jumlah_kriteria ; $a++) { 
                                        echo "<td>" . $aplus[$a] . "</td>";
                                    };
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> A-
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php
                                        for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                          echo "<th>C00" . $i . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    for ($a=1; $a <= $jumlah_kriteria ; $a++) { 
                                        echo "<td>" . $aminus[$a] . "</td>";
                                    };
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> D+
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <?php
                                      for ($i=1; $i <= $jumlah_alternatif; $i++) { 
                                        echo "<th>A" . $i . "</th>";
                                      }
                                      ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    $temp = 0;
                                    for ($a=1; $a <= $jumlah_alternatif ; $a++) { 
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        $temp += pow(($aplus[$i] - $ternormalisasi_terbobot[$a][$i]), 2);
                                      }
                                      $dplus[$a] = $temp;
                                      $temp = 0;
                                    }
                                    echo "<tr>";
                                    for ($i=1; $i <= count($dplus); $i++) { 
                                      echo "<td>" . sqrt($dplus[$i]) . "</td>";
                                    }
                                    echo "</tr>";
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> D-
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <?php
                                      for ($i=1; $i <= $jumlah_alternatif; $i++) { 
                                        echo "<th>A" . $i . "</th>";
                                      }
                                      ?>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    $temp = 0;
                                    for ($a=1; $a <= $jumlah_alternatif ; $a++) { 
                                      for ($i=1; $i <= $jumlah_kriteria; $i++) { 
                                        $temp += pow(($ternormalisasi_terbobot[$a][$i] - $aminus[$i]), 2);
                                      }
                                      $dminus[$a] = $temp;
                                      $temp = 0;
                                    }
                                    echo "<tr>";
                                    for ($i=1; $i <= count($dminus); $i++) { 
                                      echo "<td>" . sqrt($dminus[$i]) . "</td>";
                                    }
                                    echo "</tr>";
                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Preferensi
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>Alternatif</th>
                                      <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    for ($a=1; $a <= count($dplus) ; $a++) { 
                                      $key = "A".$a;
                                      $v[$key] = sqrt($dminus[$a]) / (sqrt($dminus[$a]) + sqrt($dplus[$a]));
                                    }
                                    for ($i=1; $i <= $jumlah_alternatif; $i++) {
                                      $query_getNama = "SELECT nama FROM tbl_alternatif where id='" . $al[$i] . "'";
                                      $result = $db->mysqli->query($query_getNama);
                                      foreach ($result as $row) {
                                        $nama = $row['nama'];
                                      }
                                      $hasil = $v["A".$i];
                                      
                                      $peringkat[$nama] = $hasil;
                                    }
                                    echo "<tr>";
                                    $_SESSION["peringkat"] = $peringkat;
                                    foreach ($peringkat as $pnama => $phasil) {
                                      echo "<td>".$pnama."</td>
                                      <td>" . $phasil . "</td>
                                      </tr>";
                                    }

                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
            </div>

            <div class="row" id="isi">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title mt-2">
                                        <i class="fa-solid fa-table"></i> Peringkat
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="peringkat" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>Peringkat</th>
                                      <th>Alternatif</th>
                                      <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody id='dataAlternatif'>
                                    <tr>
                                    <?php
                                    arsort($peringkat);
                                    $no = 1;
                                    foreach ($peringkat as $pnama => $phasil) {
                                      echo "<td>" . $no . "</td>
                                      <td>".$pnama."</td>
                                      <td>" . $phasil . "</td>
                                      </tr>";
                                      $no++;
                                    }

                                    ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            
              <!-- /.col -->
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html-to-pdfmake/browser.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <script>
      $(document).on("change", "#darkmode", function () {
        if ($(this).is(":checked")) {
          $("body").addClass("dark-mode");
        } else {
          $("body").removeClass("dark-mode");
        }
      });
    </script>


    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
  </body>
</html>
