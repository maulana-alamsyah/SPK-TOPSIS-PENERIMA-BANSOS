<?php
include("config/koneksi.php");
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("location: admin/");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Login Page</title>

    <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
    <script
      src="https://kit.fontawesome.com/5a6c86310d.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">
                Login
                <hr class="w-25 mx-auto mt-2 bg-dark" size="2" />
              </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Username" id="username" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Password" id="password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
              <button type="submit" id="login" class="btn btn-primary w-100 rounded-pill">Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).on("click", "#login", async function () {
        var data = new Object();
        var username = $("#username").val();
        var password = $("#password").val();

        data.username = username;
        data.password = password;

        console.log(JSON.stringify(data));

        $.ajax({
          url: "login_proses.php",
          type: "POST",
          data: JSON.stringify(data),
          cache: false,
          success: function (resp) {
            console.log(resp);
            if (resp != "gagal") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Berhasil Login",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "admin/";
                    }
                  }); 
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Error",
                    text: "Gagal Login",
                  }).then((result) => {
                    if (result.isConfirmed) {
                    }
                  }); 
            }
          },
          error: $("#isi").html(
            "<tr><td colspan='4' class='text-center'><div class='spinner-border text-secondary' role='status'>" +
              "<span class='visually-hidden'>Loading...</span>" +
              "</div>" +
              "</td></tr>"
          ),
        });
      });
    </script>
  </body>
</html>
