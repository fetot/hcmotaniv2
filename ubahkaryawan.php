<?php 
    include "components/Header.php";
    if(empty($_GET['id'])){
      $id = '1';
      echo "<script>alert('Silahkan pilih Data Karyawan yang ingin diubah!')</script>";
      echo "<script>location='datakaryawan'</script>";
    }else{
      $id = $_GET['id'];
    }
?>

<?php 
                            $tampil = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                            $tabel = $tampil -> fetch_assoc();
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
      <h1 class="h5 mb-0 text-gray-800">Ubah Data Karyawan [<?php echo $tabel['id_karyawan']; echo " / "; echo $tabel['nama'];echo " / ";echo $tabel['bagian']; ?>]</h1>
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
                          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-edit mr-2"></i>Karyawan Harlep</h6>
                        </div>
                            <div class="card-body">


<table class="table table-sm table-borderless p-2">
  <tbody style="font-size: 0.9rem">
    <form method="post" action="ubahkaryawan?id=<?php echo $id; ?>" name="form1">
    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" id="inputNama" name="inputNama" class="form-control form-control-sm mb-1" value="<?php echo $tabel['nama']; ?>" placeholder="Nama Lengkap" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" id="inputBagian" name="inputBagian" class="form-control form-control-sm mb-1" value="<?php echo $tabel['bagian']; ?>" placeholder="Bagian" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Badge</th>
      <td>
        <input type="text" id="inputBadge" name="inputBadge" class="form-control form-control-sm mb-1" value="<?php echo $tabel['badge']; ?>" placeholder="Badge" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Tanggal Masuk Bekerja</th>
      <td>
        <input type="date" id="inputTglMskKerja" name="inputTglMskKerja" class="form-control form-control-sm mb-1" value="<?php echo date("Y-m-d", strtotime($tabel['tgl_masukkerja'])); ?>" required>
      </td>
    </tr>
    <tr>
      <th scope="row">Status</th>
      <td>
        <select id="inputStatus" name="inputStatus" class="form-control form-control-sm mb-1" required autofocus>
            <option value="Aktif" <?php if ($tabel['status'] == 'Aktif'){echo "selected";}; ?>>Aktif</option>
            <option value="Cuti" <?php if ($tabel['status'] == 'Cuti'){echo "selected";}; ?>>Cuti</option>
            <option value="Sakit" <?php if ($tabel['status'] == 'Sakit'){echo "selected";}; ?>>Sakit</option>
            <option value="Permisi" <?php if ($tabel['status'] == 'Permisi'){echo "selected";}; ?>>Permisi</option>
            <option value="Alpa" <?php if ($tabel['status'] == 'Alfa'){echo "selected";}; ?>>Alpa</option>
        </select>  
    </td>
    </tr>
    
    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">NIK</th>
      <td>
        <input type="text" id="inputNIK" name="inputNIK" class="form-control form-control-sm mb-1" value="<?php echo $tabel['nik']; ?>" placeholder="NIK" autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Jenis Kelamin</th>
      <td>
        <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio1" value="Pria" <?php if($tabel['jenis_kelamin'] == "Pria"){echo "checked";}; ?> required>
            <label class="form-check-label" for="inlineRadio1">Pria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio2" value="Wanita" <?php if($tabel['jenis_kelamin'] == "Wanita"){echo "checked";}; ?> required>
            <label class="form-check-label" for="inlineRadio2">Wanita</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Tempat, Tanggal Lahir</th>
      <td>
        <input type="text" id="inputTtl" name="inputTtl" class="form-control form-control-sm mb-1" placeholder="Tempat, Tanggal Lahir" value="<?php echo $tabel['ttl']; ?>" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Nomor Ponsel</th>
      <td>
        <input type="tel" id="inputHP" name="inputHP" class="form-control form-control-sm mb-1" placeholder="Nomor Ponsel" value="<?php echo $tabel['no_hp']; ?>" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>
        <textarea id="inputAlamat" name="inputAlamat" class="form-control form-control-sm mb-1" placeholder="Alamat Lengkap" row="3" required autofocus><?php echo $tabel['alamat']; ?></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Agama</th>
      <td>
        <select id="inputAgama" name="inputAgama" class="form-control form-control-sm mb-1" required autofocus>
            <option value="Islam" <?php if ($tabel['agama'] == 'Islam'){echo "selected";}; ?>>Islam</option>
            <option value="Kristen" <?php if ($tabel['agama'] == 'Kristen'){echo "selected";}; ?>>Kristen</option>
            <option value="Katolik" <?php if ($tabel['agama'] == 'Katolik'){echo "selected";}; ?>>Katolik</option>
            <option value="Buddha" <?php if ($tabel['agama'] == 'Buddha'){echo "selected";}; ?>>Buddha</option>
            <option value="Hindu" <?php if ($tabel['agama'] == 'Hindu'){echo "selected";}; ?>>Hindu</option>
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row">Status Pernikahan</th>
      <td>
      <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah1" value="Lajang" required <?php if($tabel['status_nikah'] == "Lajang"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah1">Lajang</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah2" value="Menikah" required <?php if($tabel['status_nikah'] == "Menikah"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah2">Menikah</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah3" value="Menikah" required <?php if($tabel['status_nikah'] == "Janda"){echo "checked";}; ?>>
            <label class="form-check-label" for="sttsnikah3">Janda</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Pendidikan Terakhir</th>
      <td>
        <input type="text" value="<?php echo $tabel['pendidikan']; ?>" id="inputPendidikan" name="inputPendidikan" class="form-control form-control-sm" placeholder="Pendidikan Terakhir" required autofocus>
      </td>
    </tr>
    <tr>
        <th scope="row">
        </th>
        <td>
          <a class="btn btn-outline-secondary mt-3 mr-1" type="button" href="detail?id=<?php echo $id ?>">Batal</a>
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
        $nama = $_POST['inputNama'];
        $bagian = $_POST['inputBagian'];
        $badge = $_POST['inputBadge'];
        $tglmskkerja = $_POST['inputTglMskKerja'];
        $nik = $_POST['inputNIK'];
        $jeniskelamin = $_POST['jeniskelamin'];
        $ttl = $_POST['inputTtl'];
        $nohp = $_POST['inputHP'];
        $alamat = $_POST['inputAlamat'];
        $agama = $_POST['inputAgama'];
        $statusnikah = $_POST['statusnikah'];
        $pendidikan = $_POST['inputPendidikan'];
        $status = $_POST['inputStatus'];
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "UPDATE tbl_masterkaryawan SET tgl_masukkerja='$tglmskkerja',bagian='$bagian',badge='$badge',status='$status',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id_karyawan=$id");
        if ($query1) {
            $query2 = mysqli_query($koneksi, "UPDATE tbl_infokaryawan SET id_karyawan='$id',nama='$nama',jenis_kelamin='$jeniskelamin',ttl='$ttl',alamat='$alamat',agama='$agama',status_nikah='$statusnikah',no_hp='$nohp',pendidikan='$pendidikan',nik='$nik',terakhirdiubah=CURRENT_TIMESTAMP() WHERE id=$id");
        
            if ($query2) {
              echo "<script>alert('Data Karyawan berhasil diubah!')</script>";
              echo "<script>location='detail?id=$id'</script>";
                
            } else {
                var_dump($query2);
            }
        } else {
            var_dump($badge);
            var_dump($query1);echo "query1";
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