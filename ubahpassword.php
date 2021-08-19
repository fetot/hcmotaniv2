<?php 
    include "components/Header.php";
    $id = $_GET['id'];
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        <span class="d-none d-lg-inline text-gray-600 small">
                  <i class="fas fa-fw fa-user mr-1"></i>
                  <?php echo strtoupper($_SESSION['username']['username']); ?>
                </span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="ubahpassword?id=<?php echo $_SESSION['username']['id']; ?>">
            <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Ubah Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Keluar
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-lock mr-2"></i>Ubah Password</h6>
                        </div>
            <div class="card-body">

                <form method="post" action="ubahpassword?id=<?php echo "$id"; ?>" name="form1">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Username</label>
                        <input
                            class="form-control py-4"
                            id="inputUsername"
                            name="inputUsername"
                            type="text"
                            aria-describedby="usernameHelp"
                            value="<?php print($_SESSION['username']['username']);?>"
                            disabled
                            />
                    </div>
                    <div class="form-row">
                    <div class="col">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password Lama</label>
                                <input
                                    class="form-control py-4"
                                    id="inputPasswordOld"
                                    name="inputPassOld"
                                    type="password"
                                    maxLength="16"
                                    required
                                    placeholder="Masukkan password lama"/>
                            </div>
                        </div>
                  </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password Baru</label>
                                <input
                                    class="form-control py-4"
                                    id="inputPassword"
                                    name="inputPassNew"
                                    type="password"
                                    maxLength="16"
                                    required
                                    placeholder="Masukkan password baru"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                    <div class="small text-danger ml-2">
                                        <?php 
                                            if(isset($_GET['p'])){
                                                if($_GET['p'] == "failed"){
                                                    echo "Password lama salah!";
                                                }
                                            }
                                        ?>
                                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalKonfirmasi">
                    <span class="icon text-white-50">
                      <i class="fas fa-unlock-alt"></i>
                    </span>
                    <span class="text">Ubah Password</span>
                    </a>
                    </div>
                    

                    <div
                    class="modal fade"
                    id="modalKonfirmasi"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <i class="fas fa-exclamation-circle fa-fw mr-1 text-warning"></i>Konfirmasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin mengubah password?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="submit" name="Submit" id="btnTambah" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->

                </form>

                

            <?php
    if(isset($_POST['Submit'])){
        $inputpassold = $_POST['inputPassOld'];
        $passold = $_SESSION['username']['password'];
        $passnew = $_POST['inputPassNew'];

        if($inputpassold == $passold){

          include_once("koneksi.php");
      
          $query1 = mysqli_query($koneksi, "UPDATE tbl_user SET password='$passnew',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id=$id");
          if ($query1) {
              echo "<script>alert('Password berhasil diubah! Silahkan login kembali.')</script>";
              echo "<script>location='logout'</script>";
          } else {
              var_dump($query1);echo "query1";
          }
        }else{
          echo "<script>alert('Password salah.')</script>";
          echo "<script>location='ubahpassword?id=$id&p=failed'</script>";
        }
        
    }
?>

            </div>
            <!-- end card body -->
        </div>
    </div>
</div>

<?php 
    include "components/Footer.php" 
?>