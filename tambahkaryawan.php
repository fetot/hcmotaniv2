<?php include "components/Header.php" ?>

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
      <h1 class="h4 mb-0 text-gray-800">Tambah Karyawan Harlep</h1>
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
                          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus mr-2"></i>Karyawan Harlep</h6>
                        </div>
<div class="card-body">

<table class="table table-sm table-borderless p-2">
  <tbody style="font-size: 0.9rem">
    <form method="post" action="tambahkaryawan" name="form1">
    <tr>
      <th scope="row">Nama Lengkap</th>
      <td>
        <input type="text" id="inputNama" name="inputNama" class="form-control form-control-sm mb-1" placeholder="Nama Lengkap" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Bagian</th>
      <td>
        <input type="text" id="inputBagian" name="inputBagian" class="form-control form-control-sm mb-1" placeholder="Bagian" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Badge</th>
      <td>
        <input type="text" id="inputBadge" name="inputBadge" class="form-control form-control-sm mb-1" placeholder="Badge" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Tanggal Masuk Bekerja</th>
      <td>
        <input type="date" id="inputTglMskKerja" name="inputTglMskKerja" class="form-control form-control-sm mb-1" required value="<?php echo date("Y-m-d"); ?>">
      </td>
    </tr>
    
    <tr>
        <th scope="row" colspan="3"><hr></th>
    </tr>

    <tr>
      <th scope="row">NIK</th>
      <td>
        <input type="text" id="inputNIK" name="inputNIK" class="form-control form-control-sm mb-1" placeholder="NIK" autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Jenis Kelamin</th>
      <td>
        <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio1" value="Pria" required>
            <label class="form-check-label" for="inlineRadio1">Pria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="jeniskelamin" id="inlineRadio2" value="Wanita" required>
            <label class="form-check-label" for="inlineRadio2">Wanita</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Tempat, Tanggal Lahir</th>
      <td>
        <input type="text" id="inputTtl" name="inputTtl" class="form-control form-control-sm mb-1" placeholder="Tempat, Tanggal Lahir" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Nomor Ponsel</th>
      <td>
        <input type="tel" id="inputHP" name="inputHP" class="form-control form-control-sm mb-1" placeholder="Nomor Ponsel" required autofocus>
      </td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>
        <textarea id="inputAlamat" name="inputAlamat" class="form-control form-control-sm mb-1" placeholder="Alamat Lengkap" row="3" required autofocus></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Agama</th>
      <td>
        <select id="inputAgama" name="inputAgama" class="form-control form-control-sm mb-1" required autofocus>
        <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Buddha">Buddha</option>
            <option value="Hindu">Hindu</option>
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row">Status Pernikahan</th>
      <td>
      <div class="form-check form-check-inline mb-1">
            <input class="for1m-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah1" value="Lajang" required>
            <label class="form-check-label" for="sttsnikah1">Lajang</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah2" value="Menikah" required>
            <label class="form-check-label" for="sttsnikah2">Menikah</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input mr-1" type="radio" name="statusnikah" id="sttsnikah3" value="Menikah" required>
            <label class="form-check-label" for="sttsnikah3">Janda</label>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row">Pendidikan Terakhir</th>
      <td>
        <input type="text" id="inputPendidikan" name="inputPendidikan" class="form-control form-control-sm" placeholder="Pendidikan Terakhir" required autofocus>
      </td>
    </tr>
    <tr>
        <th scope="row">
        </th>
        <td>
          <a href="" class="btn btn-primary mt-3 btn-icon-split" data-toggle="modal" data-target="#modalKonfirmasi">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                    </a>
        </td>
        <td></td>

    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
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
    
        include_once("koneksi.php");
    
        $query1 = mysqli_query($koneksi, "INSERT INTO tbl_masterkaryawan (tgl_masukkerja,bagian,badge,status,waktudibuat,terakhirdiubah) VALUES ('$tglmskkerja','$bagian','$badge','Aktif',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");
        if ($query1) {
            $last_id = mysqli_query($koneksi, "SELECT id_karyawan FROM tbl_masterkaryawan ORDER BY id_karyawan DESC");
            $row_last = $last_id->fetch_assoc();
            $id = $row_last['id_karyawan'];
            $query2 = mysqli_query($koneksi, "INSERT INTO tbl_infokaryawan(id_karyawan,nama,jenis_kelamin,ttl,alamat,agama,status_nikah,no_hp,pendidikan,nik,waktudibuat,terakhirdiubah) VALUES('$id','$nama','$jeniskelamin','$ttl','$alamat','$agama','$statusnikah','$nohp','$pendidikan','$nik',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())");
        
            if ($query2) {
                echo "<script>alert('Karyawan berhasil ditambahkan!')</script>";
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

                    


                

<?php 
    include "components/Footer.php" 
?>