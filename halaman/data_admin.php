<?php 
  

    if(isset($_POST['cari'])) {

      $keyword = $_POST['keyword'];
      $admin = query("SELECT * FROM 08_tbl_admin WHERE nama_siswa LIKE '%$keyword%'");
    }
    else {
      $admin = query("SELECT * FROM 08_tbl_admin");
    }

 ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Data Admin</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <a href="index.php?page=tambah_admin" class="btn btn-success mb-2">+ Tambah</a>
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
                          <th scope="col">Username</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach($admin as $admin) { ?>
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $admin['nama_admin']; ?></td>
                            <td><?php echo $admin['username']; ?></td>
                            <td>
                              <a href="index.php?page=edit_admin&&id_admin=<?php echo $admin['id_admin']; ?>" class="btn btn-success">Edit</a>
                              <a href="index.php?page=hapus_admin&&id_admin=<?php echo $admin['id_admin']; ?>" class="btn btn-danger ml-2" onclick="return confirm('hapus data?')">Hapus</a>
                            </td>
                          </tr>
                        <?php $i++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>