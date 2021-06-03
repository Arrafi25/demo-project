            <?php 

                $siswa = query("SELECT * FROM 08_tbl_siswa");
                $id_admin = $_SESSION['id_admin'];

                if(isset($_POST['simpan'])) {

                  if(tambah_pengeluaran($_POST) > 0) {

                    echo "<script>alert('Data berhasil ditambah'); document.location.href = 'index.php?page=data_pengeluaran' </script>";
                  }
                  else {

                    echo "<script>alert('Data gagal ditambah'); document.location.href = 'index.php?page=tambah_pengeluaran' </script>";
                  }
                }

             ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Tambah Data Pemasukan</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <h3 class="mt-2">Form tambah</h3>
                <div class="row">
                  <div class="col-8">
                    <form action="" method="post">
                      <div class="form-group">
                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $id_admin; ?>">
                        <label for="id_siswa">Siswa</label>
                          <select class="form-control" id="id_siswa" name="id_siswa" required>
                            <option value="">-- pilih siswa --</option>
                            <?php foreach($siswa as $siswa) { ?>
                              <option value="<?php echo $siswa['id_siswa']; ?>"><?php echo $siswa['nisn']." - ".$siswa['nama_siswa']; ?></option>
                            <?php } ?>
                          </select>
                       </div>
                      <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" name="nominal" id="nominal" required>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                      </div>
                      <a href="index.php?page=data_pengeluaran" class="btn btn-secondary mb-5">Kembali</a>
                      <button type="submit" name="simpan" class="btn btn-primary mb-5">Simpan</button>
                    </form>
                  </div>
                </div>
            </div>