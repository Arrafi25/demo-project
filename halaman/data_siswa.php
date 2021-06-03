<?php 
  

    if(isset($_POST['cari'])) {

      $keyword = $_POST['keyword'];
      $siswa = query("SELECT * FROM 08_tbl_siswa WHERE nama_siswa LIKE '%$keyword%'");
    }
    else {
      $siswa = query("SELECT * FROM 08_tbl_siswa");
   }

  // echo date('Y-m-d');

   // echo tgl_indo(date('Y-m-d'));

 ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Data Siswa</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <a href="index.php?page=tambah_siswa" class="btn btn-success mb-2">+ Tambah</a>
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
                          <th scope="col">Nama Siswa</th>
                          <th scope="col">NISN</th>
                          <th scope="col">Jenis Kelamin</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">No Telp</th>
                          <th scope="col">Aksi</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach($siswa as $siswa) { ?>
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $siswa['nama_siswa']; ?></td>
                            <td><?php echo $siswa['nisn']; ?></td>
                            <td><?php echo $siswa['jenis_kelamin']; ?></td>
                            <td><?php echo $siswa['alamat']; ?></td>
                            <td><?php echo $siswa['no_telp']; ?></td>
                            <td>
                              <a href="index.php?page=edit_siswa&&id_siswa=<?php echo $siswa['id_siswa']; ?>" class="btn btn-success">Edit</a>
                              <a href="index.php?page=hapus_siswa&&id_siswa=<?php echo $siswa['id_siswa']; ?>" class="btn btn-danger ml-2" onclick="return confirm('hapus data?')">Hapus</a>
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>