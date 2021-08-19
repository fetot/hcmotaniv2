<?php
    include "koneksi.php";
    session_start();
    if(isset($_SESSION['username'])){
        echo "<script>location='index'</script>";
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/favicon.ico" type="image/png" sizes="16x16">
  <title>HCM Otani - Masuk</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background-color: #f7f7f7"><img src="img/hrillus.svg" class="img-fluid h-100 w-100" alt="Illustration"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-user-tie fa-fw mr-1"></i>HCM Otani v2</h1>
                  </div>
                  <form class="user" name="form1" method="post" action="cek_login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="inputEmailAddress" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="inputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-block btn-user btn-primary" value="Masuk">
                    </div>
                  </form>
                  <hr>
                  <div class="small text-center">
                                        <?php 
                                            if(isset($_GET['p'])){
                                                if($_GET['p'] == "gagal"){
                                                    echo "Username atau Password salah!";
                                                }else if($_GET['p'] == "logout"){
                                                    echo "Anda telah berhasil keluar.";
                                                }else if($_GET['p'] == "belum_login"){
                                                    echo "Anda harus masuk terlebih dahulu.";
                                                }
                                            }
                                        ?>
                                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
