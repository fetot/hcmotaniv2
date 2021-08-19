<?php 
  include "components/Header.php";
  if(empty($_GET['inputID'])){
    $keyword = "";
  }else{
    $keyword = $_GET['inputID'];
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
      <h1 class="h4 mb-0 text-gray-800">Tambah Resign</h1>
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
                          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-slash mr-2"></i>Resign</h6>
                        </div>
            <div class="card-body">

                <?php 
                            // $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                            // $tabel = $tampil -> fetch_assoc();
                        ?>

                <table class="table table-sm table-borderless p-2">
                    <tbody style="font-size: 0.9rem">
                        <tr>
                            <th scope="row">ID Karyawan</th>
                            <td>
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            id="inputID"
                                            name="inputID"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="ID Karyawan"
                                            value="<?php if(empty($_GET['inputID'])){echo "";}else{$inputID = $_GET['inputID']; echo $inputID;} ?>"
                                            autocomplete="off"
                                            required="required"
                                            autofocus="autofocus">
                                        <div class="input-group-append">
                                            <button
                                                class="btn btn-sm btn-primary mb-1"
                                                name="Cari"
                                                id="btnCari"
                                                type="submit">
                                                <i class="fas fa-search fa-fw mr-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                        <?php
      if(isset($_GET['Cari'])) {
        $keyword = $_GET['inputID'];
        $sqlcari = $koneksi -> query("SELECT * FROM tbl_infokaryawan JOIN tbl_masterkaryawan WHERE tbl_infokaryawan.id_karyawan = $keyword AND tbl_masterkaryawan.id_karyawan = $keyword");
        $hasilcari = $sqlcari -> fetch_assoc();
      }
    ?>

                        <?php if(empty($hasilcari)): ?>
                    <?php else: ?>
                        <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>
                                <input
                                    type="text"
                                    name="inputNama"
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Nama Lengkap"
                                    value="<?php echo $hasilcari['nama']; ?>"
                                    required="required"
                                    autofocus="autofocus"
                                    disabled="disabled">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Bagian</th>
                            <td>
                                <input
                                    type="text"
                                    name="inputBagian"
                                    class="form-control form-control-sm mb-1"
                                    placeholder="Bagian"
                                    value="<?php echo $hasilcari['bagian']; ?>"
                                    required="required"
                                    autofocus="autofocus"
                                    disabled="disabled">
                            </td>
                        </tr>
                        <?php endif ?>

                        <tr>
                            <th scope="row" colspan="3"><hr></th>
                        </tr>

                        <form method="post" action="tambahresign" name="form1">
                            <input
                                type="hidden"
                                name="aidi"
                                value="<?php echo $keyword; ?>"
                                readonly="true"
                                autocomplete="off"
                                required="">
                            <tr>
                                <th scope="row">Tanggal Resign</th>
                                <td>
                                    <input
                                        type="date"
                                        id="inputTglResign"
                                        name="inputTglResign"
                                        class="form-control form-control-sm mb-1"
                                        value="<?php echo date("Y-m-d"); ?>">
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Alasan Resign</th>
                                <td>
                                    <textarea
                                        id="inputAlasan"
                                        name="inputAlasan"
                                        class="form-control form-control-sm mb-1"
                                        placeholder="Alasan Resign"
                                        row="3"
                                        required="required"
                                        autofocus="autofocus"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"></th>
                                <td>
                                <a href="" class="btn btn-danger mt-3 btn-icon-split" data-toggle="modal" data-target="#modalKonfirmasi">
                    <span class="icon text-white-50">
                      <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <span class="text">Resign</span>
                    </a>
                                </td>
                                <td></td>

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
                                                Apakah anda yakin data yang diinput sudah benar? <br>Data Karyawan ini akan dihapus dari daftar aktif dan tidak bisa dikembalikan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" name="Submit" id="btnTambah" class="btn btn-danger">Ya</button>
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
        $idkaryawan = $_POST['aidi'];
        $tglresign = $_POST['inputTglResign'];
        $alasan = $_POST['inputAlasan'];

        $hariini = date('Y-m-d');
        $hariini_time = strtotime($hariini);
        $tglresign_time = strtotime($tglresign);
        
        if(!empty($idkaryawan)){
            include_once("koneksi.php");
            $query1 = mysqli_query($koneksi, "INSERT INTO tbl_resign (id_karyawan,tgl_resign,alasan,waktudibuat,terakhirdiubah) VALUES ('$idkaryawan','$tglresign','$alasan',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");
            
            if($query1){

            //jika tanggal resign <= tanggal hari ini maka status karyawan menjadi resign dan semua datanya dipindah ke tbl...res
                if($tglresign_time <= $hariini_time){
            
                    //memindahkan datakaryawan ke dalam tbl_infokaryawan_res
                    $query2 = mysqli_query($koneksi, "INSERT INTO tbl_infokaryawan_res(id_karyawan,nama,bagian,badge,tgl_masukkerja,jenis_kelamin,ttl,alamat,agama,status_nikah,no_hp,pendidikan,nik,waktudibuat,terakhirdiubah) SELECT tbl_masterkaryawan.id_karyawan,tbl_infokaryawan.nama,tbl_masterkaryawan.bagian,tbl_masterkaryawan.badge,tbl_masterkaryawan.tgl_masukkerja,tbl_infokaryawan.jenis_kelamin,tbl_infokaryawan.ttl,tbl_infokaryawan.alamat,tbl_infokaryawan.agama,tbl_infokaryawan.status_nikah,tbl_infokaryawan.no_hp,tbl_infokaryawan.pendidikan,tbl_infokaryawan.nik,tbl_infokaryawan.waktudibuat,tbl_infokaryawan.terakhirdiubah FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = $idkaryawan AND tbl_infokaryawan.id_karyawan = $idkaryawan");
                    if($query2){
                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_masterkaryawan WHERE id_karyawan=$idkaryawan");
                        $queryhapus2 = mysqli_query($koneksi, "DELETE FROM tbl_infokaryawan WHERE id=$idkaryawan");
                    }

                    //butuh difix
                    $searchhub = $koneksi -> query("SELECT * FROM tbl_hubkel WHERE tbl_hubkel.id_karyawan='$idkaryawan'");
                    $tblhub = $searchhub -> fetch_assoc();
                    if(!empty($tblhub)){
                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id_karyawan=$idkaryawan");
                        // $idrel = $tblhub['id_karyawan_rel'];
                        // $queryhub = mysqli_query($koneksi, "INSERT INTO tbl_hubkel_res(id_karyawan,id_karyawan_rel,relnama,relbagian,hubungan,waktudibuat,terakhirdiubah) SELECT tbl_hubkel.id_karyawan,tbl_hubkel.id_karyawan_rel,tbl_infokaryawan.nama,tbl_masterkaryawan.bagian,tbl_hubkel.hubungan,tbl_hubkel.waktudibuat,tbl_hubkel.terakhirdiubah FROM tbl_hubkel, tbl_infokaryawan, tbl_masterkaryawan WHERE tbl_infokaryawan.id_karyawan = $idrel, tbl_masterkaryawan.id_karyawan = $idrel, tbl_hubkel.id_karyawan = $idkaryawan");
                        // if($queryhub){
                            
                        // }
                    }

                    $searchhubrel = $koneksi -> query("SELECT * FROM tbl_hubkel WHERE tbl_hubkel.id_karyawan_rel='$idkaryawan'");
                    $tblhubrel = $searchhub -> fetch_assoc();
                    if(!empty($tblhubrel)){
                        $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id_karyawan_rel=$idkaryawan");
                    }

                    $searchsp = $koneksi -> query("SELECT * FROM tbl_sp WHERE tbl_sp.id_karyawan='$idkaryawan'");
                    $tblsp = $searchsp -> fetch_assoc();
                    if(!empty($tblsp)){
                        $querysp = mysqli_query($koneksi, "INSERT INTO tbl_sp_res(id_karyawan,tgl_sp,jenissp,keterangan,waktudibuat,terakhirdiubah) SELECT id_karyawan,tgl_sp,jenissp,keterangan,waktudibuat,terakhirdiubah FROM tbl_sp WHERE id_karyawan = $idkaryawan");
                        if($querysp){
                            $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE id_karyawan=$idkaryawan");
                        }
                    }

                    $searchcuti = $koneksi -> query("SELECT * FROM tbl_cuti WHERE tbl_cuti.id_karyawan='$idkaryawan'");
                    $tblcuti = $searchcuti -> fetch_assoc();
                    if(!empty($tblcuti)){
                        $querycuti = mysqli_query($koneksi, "INSERT INTO tbl_cuti_res(id_karyawan,tgl_izincuti,tgl_akhircuti,alasan,waktudibuat,terakhirdiubah) SELECT id_karyawan,tgl_izincuti,tgl_akhircuti,alasan,waktudibuat,terakhirdiubah FROM tbl_cuti WHERE id_karyawan = $idkaryawan");
                        if($querycuti){
                            $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE id_karyawan=$idkaryawan");
                        }
                    }
                }

                echo "<script>alert('Karyawan berhasil resign!')</script>";
                echo "<script>location='dataresign'</script>";
            }
        }else{
            echo "<script>alert('ID Karyawan tidak boleh kosong!')</script>";
            echo "<script>location='tambahresign'</script>";
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