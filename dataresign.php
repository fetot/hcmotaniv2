<?php 
include "components/Header.php";
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
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
      <h1 class="h4 mb-0 text-gray-800">Tampil Data Resign</h1>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link text-primary" href="cetakdataresign" role="button">
            <i class="fas fa-print fa-fw"></i>
          </a>
</li>
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none"></li>
        

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

    <div class="row">

                            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Karyawan Resign</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_resign");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users-slash fa-fw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

        <div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table fa-fw mr-2"></i>Data Resign</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover"
                        id="dataTable"
                        width="100%"
                        cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Tanggal Resign</th>
                                <th>Alasan Resign</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Tanggal Resign</th>
                                <th>Alasan Resign</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_resign JOIN tbl_infokaryawan_res WHERE tbl_infokaryawan_res.id_karyawan = tbl_resign.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a href="detailres?id=<?php echo $tabel['id_karyawan']; ?>" style="color:black;"><?php echo $tabel['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_resign'])); ?></td>
                                <td><?php echo $tabel['alasan']; ?></td>
                                <td>
                                    <div class="dropdown show">
                                        <a
                                            class="btn btn-secondary dropdown-toggle"
                                            href="#"
                                            role="button"
                                            id="dropdownMenuLink"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Opsi
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a
                                                class="dropdown-item text-primary"
                                                href="detailres?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahresign?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan. SEMUA data yang menyangkut karyawan ini juga akan ikut terhapus!');" name="formhapus" id="formhapus" action="dataresign?id=<?php echo $tabel['no']; ?>">
                                                <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                                mr-1"></i>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                                                </div>

<?php
                                        if(isset($_POST['Hapus'])){
                                            include_once("koneksi.php");
                                            
                                            $resign = $koneksi -> query("SELECT * FROM tbl_resign WHERE no=$id");
                                            $tbl = $resign -> fetch_assoc();
                                            $idkar = $tbl['id_karyawan'];
                                            if(!empty($idkar)){
                                                $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_resign WHERE no=$id");
                                                $hapuskaryawan = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan_res WHERE id_karyawan=$idkar");
                                                $hapuscuti = mysqli_query($koneksi, "DELETE FROM tbl_cuti_res WHERE id_karyawan=$idkar");
                                                $hapussp = mysqli_query($koneksi, "DELETE FROM tbl_sp_res WHERE id_karyawan=$idkar");
                                                $hapushubkelres = mysqli_query($koneksi, "DELETE FROM tbl_hubkel_res WHERE id_karyawan=$idkar OR id_karyawan_rel=$idkar");
                                                if($queryhapus){
                                                echo "<script>alert('Data Resign berhasil dihapus!')</script>";
                                                echo "<script>location='dataresign'</script>";
                                                    } else {
                                                        var_dump($queryhapus);echo "query1";
                                            }
                                            }
                                    
                                        }
                                    ?>

<?php include "components/Footer.php"; ?>