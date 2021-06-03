<?php 

    if(isset($_POST['pilihan_tanggal'])) {

      $tgl_awal = $_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $pemasukan = query("SELECT * FROM 08_tbl_pemasukan, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pemasukan.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pemasukan.id_siswa = 08_tbl_siswa.id_siswa AND tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      $total_pemasukan = query("SELECT SUM(nominal) AS total FROM 08_tbl_pemasukan WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      $judul = "Data Pemasukan ".tgl_indo($tgl_awal)." Sampai ".tgl_indo($tgl_akhir);

    }

    else if(isset($_POST['cari'])) {

      $keyword = $_POST['keyword'];
      $pemasukan = query("SELECT * FROM 08_tbl_pemasukan, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pemasukan.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pemasukan.id_siswa = 08_tbl_siswa.id_siswa AND 08_tbl_siswa.nama_siswa LIKE '%$keyword%'");
      $total_pemasukan = query("SELECT *, SUM(nominal) AS total FROM 08_tbl_pemasukan, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pemasukan.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pemasukan.id_siswa = 08_tbl_siswa.id_siswa AND 08_tbl_siswa.nama_siswa LIKE '%$keyword%'");
      $judul = "Data Pemasukan";
    }
    else {
      $bulan = date('m');
      $tahun = date('Y');
      $pemasukan = query("SELECT * FROM 08_tbl_pemasukan, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pemasukan.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pemasukan.id_siswa = 08_tbl_siswa.id_siswa AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
      $total_pemasukan = query("SELECT SUM(nominal) AS total FROM 08_tbl_pemasukan WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
      $judul = "Data Pemasukan Bulan ".bln_indo($bulan)." ".$tahun;
    }

 ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2><?php echo $judul; ?></h2>
                    </div>
                </div> 
                <form class="form-inline" action="" method="post">
                  <div class="form-group mx-sm-3 mb-2">
                    <label for="tgl_awal">Tanggal Awal : </label>
                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" required>
                    <label for="tgl_akhir">Tanggal Akhir : </label>
                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required>
                  </div>
                  <button type="submit" name="pilihan_tanggal" class="btn btn-primary mb-2">Cari</button>
                </form>
                <div class="border mb-2"></div>
                <a href="index.php?page=tambah_pemasukan" class="btn btn-success mb-2">+ Tambah</a>
                <form class="form-inline float-right" action="" method="post">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="cari berdasarkan nama.....">
                  </div>
                  <button type="submit" name="cari" class="btn btn-primary mb-2">Cari</button>
                </form>
                <div class="row">
                  <div class="col-12">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Admin</th>
                          <th scope="col">Nama Siswa</th>
                          <th scope="col">Bulan</th>
                          <th scope="col">Tahun</th>
                          <th scope="col">Nominal</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Aksi</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach($pemasukan as $pemasukan) { ?>
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $pemasukan['nama_admin']; ?></td>
                            <td><?php echo $pemasukan['nama_siswa']; ?></td>
                            <td><?php echo bln_indo($pemasukan['bulan']); ?></td>
                            <td><?php echo $pemasukan['tahun']; ?></td>
                            <td><?php echo $pemasukan['nominal']; ?></td>
                            <td><?php echo tgl_indo($pemasukan['tanggal']); ?></td>
                            <td>
                              <a href="index.php?page=edit_pemasukan&&id_pemasukan=<?php echo $pemasukan['id_pemasukan']; ?>" class="btn btn-success">Edit</a>
                              <a href="index.php?page=hapus_pemasukan&&id_pemasukan=<?php echo $pemasukan['id_pemasukan']; ?>" class="btn btn-danger ml-2" onclick="return confirm('hapus data?')">Hapus</a>
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                        <tr>
                            <th colspan="5">Total</th>
                            <th><?php echo $total_pemasukan[0]['total']; ?></th>
                            <th></th>
                            <th>
                              
                            </th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>