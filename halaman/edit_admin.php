            <?php 

                $id_admin = $_GET['id_admin'];
                $admin = query("SELECT * FROM 08_tbl_admin WHERE id_admin = $id_admin");

                if(isset($_POST['simpan'])) {

                  if(edit_admin($_POST) > 0) {

                    echo "<script>alert('Data admin dengan username".$admin[0]['username']." berhasil Diedit'); document.location.href = 'index.php?page=data_admin' </script>";
                  }
                  else {

                    echo "<script>alert('Data admin dengan username ".$admin[0]['username']." gagal Diedit'); document.location.href = 'index.php?page=tambah_admin' </script>";
                  }
                }

             ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Edit Data Admin</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <h3 class="mt-2">Form Edit</h3>
                <div class="row">
                  <div class="col-8">
                    <form action="" method="post">
                      <div class="form-group">
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $admin[0]['id_admin']; ?>">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $admin[0]['username']; ?>" readonly required>
                      </div>
                      <div class="form-group">
                        <label for="nama_admin">Nama Admin</label>
                        <input type="text" class="form-control" name="nama_admin" id="nama_admin" value="<?php echo $admin[0]['nama_admin']; ?>" readonly required>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                      </div>
                      <a href="index.php?page=data_admin" class="btn btn-secondary mb-5">Kembali</a>
                      <button type="submit" name="simpan" class="btn btn-primary mb-5">Simpan</button>
                    </form>
                  </div>
                </div>
            </div>