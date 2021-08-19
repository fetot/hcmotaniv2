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
      <h1 class="h4 mb-0 text-gray-800">Tampil Data Karyawan Harlep</h1>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
<li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link text-primary" href="cetakdatakaryawan" role="button">
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
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Karyawan Harlep</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                                                $dataharlep = $koneksi -> query("SELECT * FROM tbl_masterkaryawan");
                                                $jlhharlep = mysqli_num_rows($dataharlep);
                                                echo $jlhharlep;
                                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-fw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Yang Aktif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                                                $dataharlep = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE tbl_masterkaryawan.status = 'Aktif'");
                                                $jlhharlep = mysqli_num_rows($dataharlep);
                                                echo $jlhharlep;
                                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-fw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                        
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-fw mr-2"></i>Karyawan Harlep</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover"
                        id="dataTable"
                        width="100%"
                        cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Badge</th>
                                <th>Tanggal Masuk Kerja</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Badge</th>
                                <th>Tanggal Masuk Kerja</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_infokaryawan.id_karyawan = tbl_masterkaryawan.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a
                                                style="color: black;"
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['badge']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_masukkerja'])); ?></td>
                                <td class="text-center"><?php echo $tabel['jenis_kelamin']; ?></td>
                                <td class="text-center"><?php echo $tabel['agama']; ?></td>
                                <td class="text-center"><?php echo $tabel['status']; ?></td>
                                <td class="text-center">
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
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Detil</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahkaryawan?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <a
                                                href="tambahcuti?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-primary">
                                                <i class="fas fa-check fa-fw mr-1"></i>Izin Cuti</a>
                                            <a
                                                href="tambahhubkel?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-primary">
                                                <i class="fas fa-plus fa-fw mr-1"></i>Hubungan Keluarga</a>
                                            <a
                                                href="tambahsp?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-warning">
                                                <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Beri SP</a>
                                            <a
                                                href="tambahresign?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari="
                                                class="dropdown-item text-danger">
                                                <i class="fas fa-exclamation-triangle fa-fw mr-1"></i>Resign</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan. SEMUA data yang menyangkut karyawan ini juga akan ikut terhapus!');" name="formhapus" id="formhapus" action="datakaryawan?id=<?php echo $tabel['id_karyawan']; ?>">
                                            <button type="submit" name="Hapus" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw mr-1"></i>Hapus Karyawan</a></button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
                                        if(isset($_POST['Hapus'])){
                                        include_once("koneksi.php");

                                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_masterkaryawan WHERE id_karyawan=$id");
                                        if($queryhapus){
                                            $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan WHERE id=$id");

                                            if ($queryhapus2) {
                                                $hapuscuti = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE id_karyawan=$id");
                                                $hapussp = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE id_karyawan=$id");
                                                $hapushubkel = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id_karyawan=$idk OR id_karyawan_rel=$id");

                                            echo "<script>alert('Data Karyawan berhasil dihapus!')</script>";
                                            echo "<script>location='datakaryawan'</script>";
                                            
                                            } else {
                                                var_dump($queryhapus2);
                                            }
                                        } else {
                                            var_dump($queryhapus);echo "query1";
                                        }
                                        }
                                    ?>

<?php 
    include "components/footer.php";
?>