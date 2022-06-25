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
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.col -->
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
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      $(document).on("click", "#update", function () {
        var data = new Object();
        data.id = $("#id").val();
        data.nama = $("#namaAlternatif").val();
        console.log(data);
        $.ajax({
          url: "../backend/updateAlternatif.php",
          type: "POST",
          data: JSON.stringify(data),
          cache: false,
          success: function (resp) {
            console.log(resp)
            result = JSON.parse(resp);
            if (result != false) {
              Toast.fire({
                icon: 'success',
                title: 'Berhasil mengubah alternatif.'
              })
            } else {
              alert("Gagal ubah");
            }
          },
          error: function () {
            console.log("error");
          },
        });
      });

      $(document).on("click", "#hapusAlternatif", function () {
        var data = new Object();
        data.id = $(this).attr("idAlternatif");
        console.log(data);
        $.ajax({
          url: "../backend/deleteAlternatif.php",
          type: "POST",
          data: JSON.stringify(data),
          cache: false,
          success: function (resp) {
            console.log(resp);
            if (result != false) {
              Toast.fire({
                icon: 'success',
                title: 'Berhasil menghapus alternatif.'
              })
              window.setInterval('location.reload()', 3000); 	
            } else {
              alert("Gagal hapus");
            }
          },
          error: function () {
            console.log("error");
          },
        });
      });
      $(document).on("click", "#editAlternatif", function () {
        var data = new Object();
        data.id = $(this).attr("idAlternatif");

        $.ajax({
          url: "../backend/getAlternatifById.php",
          type: "POST",
          data: JSON.stringify(data),
          cache: false,
          success: function (resp) {
            var result = JSON.parse(resp);
            console.log(result);
            resultTag =
              '<div class="card w-100" id="tambahForm">' +
              '<div class="card-header">' +
              '<div class="row">' +
              '<div class="col-md-6">' +
              '<h3 class="card-title mt-2">' +
              '<i class="fa-solid fa-pen-to-square"></i> Edit Data Alternatif' +
              "</h3>" +
              "</div>" +
              '<div class="col-md-6 d-flex justify-content-end">' +
              '<button class="btn bg-secondary float-end" id="kembali">' +
              '<i class="fa-solid fa-arrow-left"></i> Kembali' +
              "</button>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "<!-- /.card-header -->" +
              '<div class="card-body">' +
              '<div class="row">' +
              '<div class="col-md-12">' +
              '<input type="hidden" class="form-control" id="id" value="' +
              result[0].id +
              '" />' +
              '<div class="form-group">' +
              '<label for="namaAlternatif">Nama Alternatif</label>' +
              '<input type="text" class="form-control" id="namaAlternatif" placeholder="Nama Alternatif" value="' +
              result[0].nama +
              '" />' +
              "</div>" +
              "</div>" +
              "</div>" +
              "</div>" +
              "<!-- /.card-body -->" +
              '<div class="card-footer d-flex justify-content-end">' +
              '<button type="submit" class="btn btn-primary mr-2" id="update">' +
              '<i class="fa-solid fa-floppy-disk"></i> Simpan' +
              "</button>" +
              '<button type="reset" onclick="reset()" class="btn btn-primary">' +
              '<i class="fa-solid fa-arrows-rotate"></i> Reset' +
              "</button>" +
              "</div>" +
              "</div>";
            console.log(result[0].jenis);
            $("#isi").html(resultTag);
          },
          error: function () {
            console.log("error");
          },
        });
      });

      $(document).on("click", "#simpan", function () {
        var alternatif = new Object();
        alternatif.nama = $("#namaAlternatif").val();

        console.log(alternatif);
        $.ajax({
          url: "../backend/addAlternatif.php",
          type: "POST",
          data: JSON.stringify(alternatif),
          cache: false,
          success: function (resp) {
            console.log(resp);
            Toast.fire({
                icon: 'success',
                title: 'Berhasil menyimpan alternatif.'
            })
          },
          error: function () {
            console.log("error");
          },
        });
      });

      $(document).on("change", "#darkmode", function () {
        if ($(this).is(":checked")) {
          $("body").addClass("dark-mode");
        } else {
          $("body").removeClass("dark-mode");
        }
      });

      var formTambah =
        '<div class="card w-100" id="tambahForm">' +
        '<div class="card-header">' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<h3 class="card-title mt-2">' +
        '<i class="fa-solid fa-pen-to-square"></i> Edit Data Alternatif' +
        "</h3>" +
        "</div>" +
        '<div class="col-md-6 d-flex justify-content-end">' +
        '<button class="btn bg-secondary float-end" id="kembali">' +
        '<i class="fa-solid fa-arrow-left"></i> Kembali' +
        "</button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<!-- /.card-header -->" +
        '<div class="card-body">' +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="namaAlternatif">Nama Alternatif</label>' +
        '<input type="text" class="form-control" id="namaAlternatif" placeholder="Nama Alternatif" />' +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<!-- /.card-body -->" +
        '<div class="card-footer d-flex justify-content-end">' +
        '<button type="submit" class="btn btn-primary mr-2" id="simpan">' +
        '<i class="fa-solid fa-floppy-disk"></i> Simpan' +
        "</button>" +
        '<button type="reset" onclick="reset()" class="btn btn-primary">' +
        '<i class="fa-solid fa-arrows-rotate"></i> Reset' +
        "</button>" +
        "</div>" +
        "</div>";

      function reset() {
        document.getElementById("namaAlternatif").value = "";
      }

      $(document).on("click", "#kembali", function () {
        taghtml =
          '<div class="col-12">' +
          '<div class="card">' +
          '<div class="card-header">' +
          '<div class="row">' +
          '<div class="col-md-6">' +
          '<h3 class="card-title mt-2">' +
          '<i class="fa-solid fa-table"></i> Data Alternatif' +
          "</h3>" +
          "</div>" +
          '<div class="col-md-6 d-flex justify-content-end">' +
          '<button class="btn bg-primary float-end" id="tambahData">' +
          '<i class="fa-solid fa-plus"></i> Tambah Data' +
          "</button>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "<!-- /.card-header -->" +
          '<div class="card-body">' +
          '<table id="example1" class="table table-bordered table-striped">' +
          "<thead>" +
          "<tr>" +
          "<th>No</th>" +
          "<th>Nama Alternatif</th>" +
          "<th>Aksi</th>" +
          "</tr>" +
          "</thead>" +
          "<tbody id='dataAlternatif'>" +
          "</tbody>" +
          "</table>" +
          "</div>" +
          "<!-- /.card-body -->" +
          "</div>" +
          "<!-- /.card -->" +
          "</div>";
        $("#isi").html(taghtml);

        $.ajax({
          url: "../backend/getAlternatif.php",
          type: "GET",
          cache: false,
          success: function (resp) {
            result = JSON.parse(resp);
            resultTag = "";
            if (result != false) {
              for (i = 0; i < result.length; i++) {
                no = i + 1;
                resultTag +=
                  "<tr>" +
                  "<td>" +
                  no +
                  "</td>" +
                  "<td>" +
                  result[i].nama +
                  "</td>" +
                  "<td>" +
                  '<button class="btn-xs btn-primary" id="editAlternatif" idAlternatif="' +
                  result[i].id +
                  '">' +
                  '<i class="fa-solid fa-pen-to-square"></i>' +
                  "</button>" +
                  ' <button class="btn-xs btn-danger" id="hapusAlternatif" idAlternatif="' +
                  result[i].id +
                  '">' +
                  '<i class="fa-solid fa-trash-can"></i>' +
                  "</button>" +
                  "</td>" +
                  "</tr>";
              }
              $("#dataAlternatif").html(resultTag);
            } else {
              resultTag +=
                "<tr>" +
                "<td colspan='4' class='text-center'>Data Tidak Masih Kosong :)</td>" +
                "</tr>";
              $("#isi").html(resultTag);
            }
          },
          error: function () {
            console.log("error");
          },
        });
      });

      $(document).on("click", "#tambahData", function () {
        $("#isi").html(formTambah);
      });

      
      $(document).ready(function () {
        taghtml =
          '<div class="col-12">' +
          '<div class="card">' +
          '<div class="card-header">' +
          '<div class="row">' +
          '<div class="col-md-6">' +
          '<h3 class="card-title mt-2">' +
          '<i class="fa-solid fa-table"></i> Data Alternatif' +
          "</h3>" +
          "</div>" +
          '<div class="col-md-6 d-flex justify-content-end">' +
          '<button class="btn bg-primary float-end" id="tambahData">' +
          '<i class="fa-solid fa-plus"></i> Tambah Data' +
          "</button>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "<!-- /.card-header -->" +
          '<div class="card-body">' +
          '<table id="example1" class="table table-bordered table-striped">' +
          "<thead>" +
          "<tr>" +
          "<th>No</th>" +
          "<th>Nama Alternatif</th>" +
          "<th>Aksi</th>" +
          "</tr>" +
          "</thead>" +
          "<tbody id='dataAlternatif'>" +
          "</tbody>" +
          "</table>" +
          "</div>" +
          "<!-- /.card-body -->" +
          "</div>" +
          "<!-- /.card -->" +
          "</div>";
        $("#isi").html(taghtml);

        $.ajax({
          url: "../backend/getAlternatif.php",
          type: "GET",
          cache: false,
          success: function (resp) {
            console.log(resp);
            result = JSON.parse(resp);
            resultTag = "";
            if (result != false) {
              for (i = 0; i < result.length; i++) {
                no = i + 1;
                resultTag +=
                  "<tr>" +
                  "<td>" +
                  no +
                  "</td>" +
                  "<td>" +
                  result[i].nama +
                  "</td>" +
                  "<td>" +
                  '<button class="btn-xs btn-primary" id="editAlternatif" idAlternatif="' +
                  result[i].id +
                  '">' +
                  '<i class="fa-solid fa-pen-to-square"></i>' +
                  "</button>" +
                  ' <button class="btn-xs btn-danger" id="hapusAlternatif" idAlternatif="' +
                  result[i].id +
                  '">' +
                  '<i class="fa-solid fa-trash-can"></i>' +
                  "</button>" +
                  "</td>" +
                  "</tr>";
              }
              $("#dataAlternatif").html(resultTag);
            } else {
              resultTag +=
                "<tr>" +
                "<td colspan='4' class='text-center'>Data Tidak Masih Kosong :)</td>" +
                "</tr>";
              $("#dataAlternatif").html(resultTag);
            }
          },
          error: function () {
            console.log("error");
          },
        });
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
