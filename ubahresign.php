<?php 
  include "components/Header.php";
  if(empty($_GET['id'])){
    $no = '1';
    echo "<script>alert('Silahkan pilih Data SP yang ingin diubah!')</script>";
    echo "<script>location='datasp'</script>";
  }else{
    $no = $_GET['id'];
  }

?>

                            
<?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_resign, tbl_infokaryawan_res WHERE tbl_infokaryawan_res.id_karyawan = tbl_resign.id_karyawan AND tbl_resign.no='$no'");
                            $tabel = $tampil -> fetch_assoc();
                            $idkaryawan = $tabel['id_karyawan'];
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
    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
      <h1 class="h5 mb-0 text-gray-800">Ubah Data Resign</h1>
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
                          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit mr-2"></i>Data Resign</h6>
                        </div>
                            <div class="card-body">


<table class="table table-sm table-borderless p-2">
<form method="post" action="ubahresign?id=<?php echo $no; ?>" name="form1">
  <tbody style="font-size: 0.9rem">
  
  <tr>
      <th scope="row">ID Karyawan</th>
      <td>
          <input type="text" id="inputID" name="inputID" class="form-control form-control-sm mb-1" placeholder="ID Karyawan" value="<?php echo $idkaryawan; ?>" autocomplete="off" required disabled>
      </td>
    </tr>

    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" name="inputNama" class="form-control form-control-sm mb-1" placeholder="Nama Lengkap" value="<?php echo $tabel['nama']; ?>" required autofocus disabled>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" value="<?php echo $tabel['bagian']; ?>" required autofocus disabled>
      </td>
    </tr>

    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">Tanggal Resign</th>
      <td>
        <input type="date" id="inputTglResign" name="inputTglResign" class="form-control form-control-sm mb-1" required value="<?php echo $tabel['tgl_resign']; ?>">
      </td>
    </tr>

    <tr>
      <th scope="row">Alasan Resign</th>
      <td>
        <textarea id="inputAlasan" name="inputAlasan" class="form-control form-control-sm mb-1" placeholder="Alasan Resign" row="3" required autofocus><?php echo $tabel['alasan']; ?></textarea>
      </td>
    </tr>

    <tr>
        <th scope="row">
        </th>
        <td>
          <a class="btn btn-outline-secondary mt-3 mr-1" type="button" href="dataresign">Batal</a>
          <a href="" class="btn btn-primary mt-3 btn-icon-split" data-toggle="modal" data-target="#modalKonfirmasi">
                    <span class="icon text-white-50">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Ubah</span>
                    </a>
        </td>
        <td></td>

    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle fa-fw mr-1 text-warning"></i>Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin data yang diinput sudah benar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" name="Submit" id="btnTambah" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>   
<!-- end modal -->
    </tr>

  </tbody>
  </form>
</table>

<?php
    if(isset($_POST['Submit'])){
        $tglresign = $_POST['inputTglResign'];
        $alasan = $_POST['inputAlasan'];
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "UPDATE tbl_resign SET tgl_resign='$tglresign',alasan='$alasan',terakhirdiubah=CURRENT_TIMESTAMP() WHERE no=$no");

        if($query1){
            echo "<script>alert('Data Resign berhasil diubah!')</script>";
            echo "<script>location='dataresign'</script>";
        }
    }
?>

                            </div> <!-- end card body -->
                        </div>
                    </div>
  </div>

<?php 
    include "components/Footer.php" 
?>