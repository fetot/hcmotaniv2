<?php 
include "components/Header.php";
if(empty($_GET['id'])){
    echo "<script>alert('Silahkan pilih Data Karyawan terlebih dahulu!')</script>";
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

    <!-- div for print area -->
    <div id="section-to-print">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
      <h1 class="h5 mb-0 text-gray-800">Info Karyawan [<?php echo $tabel['id_karyawan']; echo " / "; echo $tabel['nama'];echo " / ";echo $tabel['bagian']; ?>]</h1>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link text-primary" href="" onclick="window.print();" role="button">
                <i class="fas fa-print fa-fw"></i>
              </a>
    </li>

    <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link text-primary dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog fa-fw"></i>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Opsi
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="ubahkaryawan?id=<?php echo $tabel['id_karyawan']; ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-edit text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Ubah Data</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="tambahhubkel?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari=">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-plus text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Hubungan Keluarga</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="tambahcuti?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari=">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-check text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Izin Cuti</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="tambahsp?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari=">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Beri Surat Peringatan</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="tambahresign?inputID=<?php echo $tabel['id_karyawan']; ?>&Cari=">
                  <div class="mr-3">
                    <div class="icon-circle bg-danger">
                      <i class="fas fa-user-slash text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Resign</span>
                  </div>
                </a>
                <form method="POST" name="formhapuskaryawan" id="formhapuskaryawan" action="detail?id=<?php echo $id ?>">
                <a class="dropdown-item d-flex align-items-center" href="" data-toggle="modal" data-target="#modalDelKonfirmasi">
                  <div class="mr-3">
                    <div class="icon-circle bg-danger">
                      <i class="fas fa-trash-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">Hapus Data Karyawan</span>
                  </div>
                </a>
              </div>
            </li>

            <!-- modal delete -->
        <div
            class="modal fade"
            id="modalDelKonfirmasi"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-exclamation-circle fa-fw mr-1 text-danger"></i>Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus Karyawan ini? Data yang telah dihapus tidak dapat
                        dikembalikan. SEMUA data yang menyangkut karyawan ini juga akan ikut terhapus!
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="HapusKaryawan" id="btnTambah" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
        </form>
        

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
    <div class="container-fluid" id="printView">

        <?php 
            $tampil2 = $koneksi -> query("SELECT * FROM tbl_hubkel WHERE tbl_hubkel.id_karyawan='$id' OR tbl_hubkel.id_karyawan_rel='$id'");
            $jlhhubkel = mysqli_num_rows($tampil2);
            $tabel2 = $tampil2 -> fetch_assoc();

            $tampil3 = $koneksi -> query("SELECT * FROM tbl_sp WHERE tbl_sp.id_karyawan='$id'");
            $jlhsp = mysqli_num_rows($tampil3);
            $tabel3 = $tampil3 -> fetch_assoc();

            $tampil4 = $koneksi -> query("SELECT * FROM tbl_cuti WHERE tbl_cuti.id_karyawan='$id'");
            $jlhcuti = mysqli_num_rows($tampil4);
            $tabel4 = $tampil4 -> fetch_assoc();

        ?>

        <div class="card shadow mb-4 mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link active"
                            id="info-tab"
                            data-toggle="tab"
                            href="#info"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true">
                            <i class="fas fa-user mr-1"></i>
                            Info Karyawan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="hubkel-tab"
                            data-toggle="tab"
                            href="#hubkel"
                            role="tab"
                            aria-controls="hubkel"
                            aria-selected="false">
                            <i class="fas fa-user-friends mr-1"></i>
                            Hubungan Keluarga<span class="badge badge-warning ml-1"><?php echo $jlhhubkel; ?></span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="sp-tab"
                            data-toggle="tab"
                            href="#sp"
                            role="tab"
                            aria-controls="sp"
                            aria-selected="false">
                            <i class="fas fa-user-clock mr-1"></i>
                            Riwayat SP<span class="badge badge-warning ml-1"><?php echo $jlhsp; ?></span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                            class="nav-link"
                            id="cuti-tab"
                            data-toggle="tab"
                            href="#cuti"
                            role="tab"
                            aria-controls="cuti"
                            aria-selected="false">
                            <i class="fas fa-user-clock mr-1"></i>
                            Riwayat Cuti<span class="badge badge-warning ml-1"><?php echo $jlhcuti; ?></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card-body tab-content" id="myTabContent">

                <!-- tab info karyawan -->
                <div
                    class="tab-pane fade show active"
                    id="info"
                    role="tabpanel"
                    aria-labelledby="info-tab">

                    <table class="table table-sm table-borderless p-2">
                        <tbody style="font-size: 0.9rem">
                            <form method="post" action="detail?id=<?php echo $id; ?>" name="form1">
                                <tr>
                                    <th scope="row">ID Karyawan</th>
                                    <td>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                id="idkaryawan"
                                                name="inputNama"
                                                class="form-control form-control-sm mb-1 border-0 bg-light"
                                                placeholder="Nama Lengkap"
                                                value="<?php echo $tabel['id_karyawan']; ?>"
                                                required="required"
                                                autofocus="autofocus"
                                                readonly="readonly">
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-sm btn-primary mb-1"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Salin ID"
                                                    type="button"
                                                    onclick="copy_text()">
                                                    <i class="fas fa-clipboard fa-fw mr-1"></i>Salin</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputNama"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Nama Lengkap"
                                            value="<?php echo $tabel['nama']; ?>"
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
                                            value="<?php echo $tabel['bagian']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Badge</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputBadge"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Badge"
                                            value="<?php echo $tabel['badge']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Masuk Bekerja</th>
                                    <td>
                                        <input
                                            type="date"
                                            name="inputTglMskKerja"
                                            disabled="disabled"
                                            value="<?php echo $tabel['tgl_masukkerja']; ?>"
                                            class="form-control form-control-sm mb-1"
                                            required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputStatus"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Status"
                                            value="<?php echo $tabel['status']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3"><hr></th>
                                </tr>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputNIK"
                                            class="form-control form-control-sm mb-1"
                                            placeholder=""
                                            value="<?php echo $tabel['nik']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>
                                        <div class="form-check form-check-inline mb-1">
                                            <input
                                                class="for1m-check-input mr-1"
                                                type="radio"
                                                name="jeniskelamin"
                                                id="inlineRadio1"
                                                value="Pria"
                                                required="required"
                                                <?php if($tabel['jenis_kelamin'] == "Pria"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio1">Pria</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="jeniskelamin"
                                                id="inlineRadio2"
                                                value="Wanita"
                                                required="required"
                                                <?php if($tabel['jenis_kelamin'] == "Wanita"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat, Tanggal Lahir</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputTtl"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Tempat, Tanggal Lahir"
                                            value="<?php echo $tabel['ttl']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Ponsel</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputHP"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Nomor Ponsel"
                                            value="<?php echo $tabel['no_hp']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>
                                        <textarea
                                            name="inputAlamat"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Alamat Lengkap"
                                            row="3"
                                            disabled="disabled"
                                            required="required"
                                            autofocus="autofocus"><?php echo $tabel['alamat']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Agama</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputAgama"
                                            class="form-control form-control-sm mb-1"
                                            placeholder="Agama"
                                            value="<?php echo $tabel['agama']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Pernikahan</th>
                                    <td>
                                        <div class="form-check form-check-inline mb-1">
                                            <input
                                                class="for1m-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio1"
                                                value="Lajang"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Lajang"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio1">Lajang</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio2"
                                                value="Menikah"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Menikah"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio2">Menikah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input mr-1"
                                                type="radio"
                                                name="statusnikah"
                                                id="inlineRadio3"
                                                value="Menikah"
                                                required="required"
                                                <?php if($tabel['status_nikah'] == "Janda"){echo "checked";}; ?>
                                                disabled="disabled">
                                            <label class="form-check-label" for="inlineRadio3">Janda</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Pendidikan Terakhir</th>
                                    <td>
                                        <input
                                            type="text"
                                            name="inputPendidikan"
                                            class="form-control form-control-sm"
                                            placeholder="Pendidikan Terakhir"
                                            value="<?php echo $tabel['pendidikan']; ?>"
                                            required="required"
                                            autofocus="autofocus"
                                            disabled="disabled">
                                    </td>
                                </tr>

                            </tbody>
                        </form>
                    </table>

                </div>
                <!-- end tab info karyawan -->
                <!-- tab hubungan keluarga -->
                <div
                    class="tab-pane fade table-reponsive"
                    id="hubkel"
                    role="tabpanel"
                    aria-labelledby="hubkel-tab">

                    <?php if(empty($tabel2)): echo '<div class="text-center m-4"><h6 class="text-secondary">Karyawan ini tidak memiliki Hubungan Keluarga.</h6></div>'?>
                <?php else: ?>
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Dengan ID</th>
                                <th>Dengan Nama</th>
                                <th>Dari Bagian</th>
                                <th>Hubungan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_hubkel WHERE tbl_hubkel.id_karyawan = $id OR tbl_hubkel.id_karyawan_rel = $id");
                                                while($tabel = $tampil -> fetch_assoc()){ 
                                                     if($tabel['id_karyawan'] == $id){
                                                        $idkar = $tabel['id_karyawan_rel'];
                                                        $tampil2 = $koneksi -> query("SELECT * FROM tbl_infokaryawan, tbl_masterkaryawan WHERE tbl_infokaryawan.id_karyawan = $idkar AND tbl_masterkaryawan.id_karyawan = $idkar");
                                                        $tabel2 = $tampil2 -> fetch_assoc();
                                                        $nama = $tabel2['nama'];
                                                        $bagian = $tabel2['bagian']; 
                                                     }
                                                     elseif($tabel['id_karyawan_rel'] == $id){
                                                        $idkar = $tabel['id_karyawan'];
                                                        $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan, tbl_infokaryawan WHERE tbl_masterkaryawan.id_karyawan = $idkar AND tbl_infokaryawan.id_karyawan = $idkar");
                                                        $tabel2 = $tampil2 -> fetch_assoc();
                                                        $nama = $tabel2['nama'];
                                                        $bagian = $tabel2['bagian'];
                                                     }
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $idkar; ?></td>
                                <td>
                                <?php
                                        $searchkar = $koneksi -> query("SELECT * FROM tbl_masterkaryawan WHERE id_karyawan = $idkar");
                                        $kar = $searchkar -> fetch_assoc();
                                        if(empty($kar)){
                                            $detail = "detailres?id=$idkar";
                                        }else{
                                            $detail = "detail?id=$idkar";
                                        }
                                    ?>
                                    <a class="text-dark" href="<?php echo $detail; ?>"><?php echo $nama; ?></a>
                                </td>
                                <td class="text-center"><?php echo $bagian; ?></td>
                                <td class="text-center"><?php echo $tabel['hubungan']; ?></td>
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
                                                href="ubahhubkel?id=<?php echo $tabel['id']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <!-- <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapushubkel" id="formhapushubkel" action="detail?id=<?php echo $tabel['id']; ?>">
                                            <button type="submit" name="HapusHubkel" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                            mr-1"></i>Hapus</button>
                                            </form> -->
                                        </div>
                                    </div>

                                    
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php endif ?>

                </div>
                <!-- end tab hubungan keluarga -->
                <!-- tab riwayat sp -->
                <div
                    class="tab-pane fade table-responsive"
                    id="sp"
                    role="tabpanel"
                    aria-labelledby="sp-tab">

                    <?php if(empty($tabel3)): echo '<div class="text-center m-4"><h6 class="text-secondary">Karyawan ini tidak memiliki Riwayat SP.</h6></div>'?>
                <?php else: ?>
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>SP</th>
                                <th>Tanggal Diberikan SP</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                                $nomor = 1;
                                                $tampil = $koneksi -> query("SELECT * FROM tbl_sp WHERE tbl_sp.id_karyawan = $id");
                                                while($tabel = $tampil -> fetch_assoc()){
                                                     $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                                                     $tabel2 = $tampil2 -> fetch_assoc();
                                                    
                                            ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><?php echo $tabel2['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
                                <td class="text-center"><?php echo $tabel['jenissp']; ?></td>
                                <td class="text-center"><?php echo date("d-M-Y", strtotime($tabel['tgl_sp'])); ?></td>
                                <td><?php echo $tabel['keterangan']; ?></td>
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
                                                href="ubahsp?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <!-- <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapussp" id="formhapussp" action="detail?id=<?php echo $tabel['no']; ?>">
                                            <button type="submit" name="HapusSP" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                            mr-1"></i>Hapus SP</button>
                                            </form> -->
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
                <!-- end tab riwayat sp -->
                <!-- tab riwayat cuti -->
                <div
                    class="tab-pane fade table-responsive"
                    id="cuti"
                    role="tabpanel"
                    aria-labelledby="cuti-tab">

                    <?php if(empty($tabel4)): echo '<div class="text-center m-4"><h6 class="text-secondary">Karyawan ini tidak memiliki Riwayat Cuti.</h6></div>'?>
                <?php else: ?>
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
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
                        <tbody>
                            <?php 
                                $nomor = 1;
                                $tampil = $koneksi -> query("SELECT * FROM tbl_cuti WHERE tbl_cuti.id_karyawan = $id");
                                while($tabel = $tampil -> fetch_assoc()){
                                    $tampil2 = $koneksi -> query("SELECT * FROM tbl_masterkaryawan JOIN tbl_infokaryawan ON tbl_masterkaryawan.id_karyawan=tbl_infokaryawan.id_karyawan WHERE tbl_masterkaryawan.id_karyawan='$id'");
                                    $tabel2 = $tampil2 -> fetch_assoc();
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $tabel['id_karyawan']; ?></td>
                                <td><?php echo $tabel2['nama']; ?></td>
                                <td class="text-center"><?php echo $tabel2['bagian']; ?></td>
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
                                                href="ubahcuti?id=<?php echo $tabel['no']; ?>">
                                                <i class="fas fa-edit fa-fw mr-1"></i>Ubah Data</a>
                                            <!-- <form method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini? Data yang telah dihapus tidak dapat dikembalikan.');" name="formhapuscuti" id="formhapuscuti" action="detail?id=<?php echo $tabel['no']; ?>">
                                                <button type="submit" name="HapusCuti" id="btnTambah" class="dropdown-item text-danger"><i class="fas fa-trash-alt fa-fw
                                                mr-1"></i>Hapus</button>
                                            </form> -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
                <!-- end tab riwayat cuti -->

            </div>
            <!-- end card body -->
        </div>
    </div>
</div>
                                </div>


                    <?php
                        if(isset($_POST['HapusKaryawan'])){
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

                        // if(isset($_POST['HapusHubkel'])){
                        //     include_once("koneksi.php");

                        //     $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_hubkel WHERE id=$id");
                        //         if($queryhapus){
                        //         echo "<script>alert('Data Hubungan Keluarga berhasil dihapus!')</script>";
                        //         echo "<script>location='datahubkel?'</script>";
                        //         } else {
                        //             var_dump($queryhapus);echo "query1";
                        //     }
                        //     }

                        //     if(isset($_POST['HapusSP'])){
                        //         include_once("koneksi.php");

                        //         $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_sp WHERE no=$id");
                        //             if($queryhapus){
                        //             echo "<script>alert('SP berhasil dihapus!')</script>";
                        //             echo "<script>location='datasp'</script>";
                        //             } else {
                        //                 var_dump($queryhapus);echo "query1";
                        //         }
                        //         }

                        //         if(isset($_POST['HapusCuti'])){
                        //             include_once("koneksi.php");

                        //             $queryhapus = mysqli_query($koneksi, "DELETE FROM tbl_cuti WHERE no=$id");
                        //                 if($queryhapus){
                        //                 echo "<script>alert('Data Cuti berhasil dihapus!')</script>";
                        //                 echo "<script>location='datacuti'</script>";
                        //                 } else {
                        //                     var_dump($queryhapus);echo "query1";
                        //             }
                        //             }
                      ?>

<?php include "components/Footer.php" ?>