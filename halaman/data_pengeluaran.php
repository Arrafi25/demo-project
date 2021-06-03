<?php 
    
    if(isset($_POST['pilihan_tanggal'])) {

      $tgl_awal = $_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $pengeluaran = query("SELECT * FROM 08_tbl_pengeluaran, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pengeluaran.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pengeluaran.id_siswa = 08_tbl_siswa.id_siswa AND tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      $total_pengeluaran = query("SELECT SUM(nominal) AS total FROM 08_tbl_pengeluaran WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
      $judul = "Data Pengeluaran ".tgl_indo($tgl_awal)." Sampai ".tgl_indo($tgl_akhir);

    }

    else if(isset($_POST['cari'])) {

      $keyword = $_POST['keyword'];
      $pengeluaran = query("SELECT * FROM 08_tbl_pengeluaran, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pengeluaran.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pengeluaran.id_siswa = 08_tbl_siswa.id_siswa AND 08_tbl_siswa.nama_siswa LIKE '%$keyword%'");
      $total_pengeluaran = query("SELECT *, SUM(nominal) AS total FROM 08_tbl_pengeluaran, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pengeluaran.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pengeluaran.id_siswa = 08_tbl_siswa.id_siswa AND 08_tbl_siswa.nama_siswa LIKE '%$keyword%'");
      $judul = "Data Pengeluaran";
    }
    else {
      $bulan = date('m');
      $tahun = date('Y');
      $pengeluaran = query("SELECT * FROM 08_tbl_pengeluaran, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pengeluaran.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pengeluaran.id_siswa = 08_tbl_siswa.id_siswa AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
      $total_pengeluaran = query("SELECT SUM(nominal) AS total FROM 08_tbl_pengeluaran WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
      $judul = "Data Pengeluaran Bulan ".bln_indo($bulan)." ".$tahun;
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
                <a href="index.php?page=tambah_pengeluaran" class="btn btn-success mb-2">+ Tambah</a>
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
                          <th scope="col">Nominal</th>
                          <th scope="col">Tanggal Pengeluaran</th>
                          <th scope="col">Aksi</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach($pengeluaran as $pengeluaran) { ?>
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $pengeluaran['nama_admin']; ?></td>
                            <td><?php echo $pengeluaran['nama_siswa']; ?></td>
                            <td><?php echo $pengeluaran['nominal']; ?></td>
                            <td><?php echo tgl_indo($pengeluaran['tanggal']); ?></td>
                            <td>
                              <a href="index.php?page=detail_pengeluaran&&id_pengeluaran=<?php echo $pengeluaran['id_pengeluaran']; ?>" class="btn btn-warning">Detail</a>
                              <a href="index.php?page=edit_pengeluaran&&id_pengeluaran=<?php echo $pengeluaran['id_pengeluaran']; ?>" class="btn btn-success">Edit</a>
                              <a href="index.php?page=hapus_pengeluaran&&id_pengeluaran=<?php echo $pengeluaran['id_pengeluaran']; ?>" class="btn btn-danger ml-2" onclick="return confirm('hapus data?')">Hapus</a>
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                        <tr>
                            <th colspan="3">Total</th>
                            <th><?php echo $total_pengeluaran[0]['total']; ?></th>
                            <th></th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>