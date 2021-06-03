            <?php 

                $id_pengeluaran = $_GET['id_pengeluaran'];
                $pengeluaran = query("SELECT * FROM 08_tbl_pengeluaran, 08_tbl_admin, 08_tbl_siswa WHERE 08_tbl_pengeluaran.id_admin = 08_tbl_admin.id_admin AND 08_tbl_pengeluaran.id_siswa = 08_tbl_siswa.id_siswa AND 08_tbl_pengeluaran.id_pengeluaran = $id_pengeluaran");

             ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Detail Data Pengeluaran</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <div class="row">
                  <div class="col-8">
                    <form action="" method="post">
                      <div class="form-group">
                        <div class="form-group">
                          <label for="nama_admin">Admin</label>
                          <input type="text" class="form-control" name="nama_admin" id="nama_admin" value="<?php echo $pengeluaran[0]['nama_admin']; ?>" required readonly>
                        </div>
                        <div class="form-group">
                          <label for="nisn">NISN</label>
                          <input type="text" class="form-control" name="nisn" id="nisn" value="<?php echo $pengeluaran[0]['nisn']; ?>" required readonly>
                        </div>
                        <div class="form-group">
                          <label for="nama_siswa">Nama Siswa</label>
                          <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?php echo $pengeluaran[0]['nama_siswa']; ?>" required readonly>
                        </div>
                      <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" name="nominal" id="nominal" value="<?php echo $pengeluaran[0]['nominal']; ?>" required readonly>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required readonly=""><?php echo $pengeluaran[0]['keterangan']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $pengeluaran[0]['tanggal']; ?>" required readonly>
                      </div>
                      <a href="index.php?page=data_pengeluaran" class="btn btn-secondary mb-5">Kembali</a>
                    </form>
                  </div>
                </div>
            </div>