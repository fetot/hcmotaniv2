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
      <h1 class="h4 mb-0 text-gray-800">Tampil Data Izin Cuti</h1>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link text-primary" href="cetakdatacuti" role="button">
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
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Izin Cuti</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_cuti");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
                                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open-text fa-fw fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Izin Cuti yang Aktif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                                                $datacuti = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE tbl_masterkaryawan.status = 'Cuti'");
                                                $jlhcuti = mysqli_num_rows($datacuti);
                                                echo $jlhcuti;
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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table fa-fw mr-2"></i>Data Izin Cuti</h6>
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
                                <th>Izin Cuti</th>
                                <th>Cuti Sampai</th>
                                <th>Alasan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Izin Cuti</th>
                                <th>Cuti Sampai</th>
                                <th>Alasan</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_cuti, tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = tbl_cuti.id_karyawan AND tbl_infokaryawan.id_karyawan = tbl_cuti.id_karyawan");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                    
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><a
                                                style="color:black"
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>"><?php echo $tabel['nama']; ?></a></td>
                                <td class="text-center"><?php echo $tabel['bagian']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_izincuti'])); ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_akhircuti'])); ?></td>
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
                                                href="detail?id=<?php echo $tabel['id_karyawan']; ?>">
                                                <i class="fas fa-eye fa-fw mr-1"></i>Info Karyawan</a>
                                            <a
                                                class="dropdown-item text-primary"
                                                href="ubahcuti?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapus" id="formhapus" action="datacuti?id=<?php echo $tabel['no']; ?>">
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
                                            
                                            $apdet = $koneksi -> query("SELECT * FROM tbl_cuti JOIN tbl_masterkaryawan ON tbl_masterkaryawan.id_karyawan = tbl_cuti.id_karyawan WHERE tbl_cuti.no = $id");
                                            $apdetst = $apdet -> fetch_assoc();
                                            $idkaryawan = $apdetst['id_karyawan'];

                                            $query2 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET status='Aktif',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$idkaryawan");
                                            
                                            if($query2){
                                                $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE no=$id");
                                                if($queryhapus){
                                                echo "<script>alert('Data Cuti berhasil dihapus!')</script>";
                                                echo "<script>location='datacuti'</script>";
                                                } else {
                                                    var_dump($queryhapus);echo "queryhapus";
                                                }
                                            }else{
                                                var_dump($query2);echo "query2";
                                            }
                                        }
                                    ?>

<?php include "components/Footer.php"; ?>