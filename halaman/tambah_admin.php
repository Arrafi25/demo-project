            <?php 

                $siswa = query("SELECT * FROM 08_tbl_siswa");

                if(isset($_POST['simpan'])) {

                  if(tambah_admin($_POST) > 0) {

                    echo "<script>alert('Data Admin berhasil ditambah'); document.location.href = 'index.php?page=data_admin' </script>";
                  }
                  else {

                    echo "<script>alert('Data Admin gagal ditambah'); document.location.href = 'index.php?page=tambah_admin' </script>";
                  }
                }

             ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Tambah Data Admin</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <h3 class="mt-2">Form tambah</h3>
                <div class="row">
                  <div class="col-8">
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="username">Admin</label>
                          <select class="form-control" id="username" name="username" required>
                            <option value="">-- Pilih siswa --</option>
                            <?php foreach($siswa as $siswa) { ?>
                              <option value="<?php echo $siswa['nisn']; ?>"><?php echo $siswa['nisn']." - ".$siswa['nama_siswa']; ?></option>
                            <?php } ?>
                          </select>
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