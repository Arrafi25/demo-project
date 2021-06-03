            <?php 

                $siswa = query("SELECT * FROM 08_tbl_siswa");
                $id_admin = $_SESSION['id_admin'];

                if(isset($_POST['simpan'])) {

                  if(tambah_pemasukan($_POST) > 0) {

                    echo "<script>alert('Data berhasil ditambah'); document.location.href = 'index.php?page=data_pemasukan' </script>";
                  }
                  else {

                    echo "<script>alert('Data gagal ditambah'); document.location.href = 'index.php?page=tambah_pemasukan' </script>";
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
                          <label for="bulan">Bulan</label>
                          <select class="form-control" id="bulan" name="bulan" required>
                              <option value="">-- pilih bulan --</option>
                              <option value="01" <?php if(date('m') == "01"){echo "selected";} ?>>Januari</option>
                              <option value="02" <?php if(date('m') == "02"){echo "selected";} ?>>Februari</option>
                              <option value="03" <?php if(date('m') == "03"){echo "selected";} ?>>Maret</option>
                              <option value="04" <?php if(date('m') == "04"){echo "selected";} ?>>April</option>
                              <option value="05" <?php if(date('m') == "05"){echo "selected";} ?>>Mei</option>
                              <option value="06" <?php if(date('m') == "06"){echo "selected";} ?>>Juni</option>
                              <option value="07" <?php if(date('m') == "07"){echo "selected";} ?>>Juli</option>
                              <option value="08" <?php if(date('m') == "08"){echo "selected";} ?>>agustus</option>
                              <option value="09" <?php if(date('m') == "09"){echo "selected";} ?>>september</option>
                              <option value="10" <?php if(date('m') == "10"){echo "selected";} ?>>Oktober</option>
                              <option value="11" <?php if(date('m') == "11"){echo "selected";} ?>>November</option>
                              <option value="12" <?php if(date('m') == "12"){echo "selected";} ?>>Desember</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="tahun">Tahun</label>
                          <select class="form-control" id="tahun" name="tahun" required>
                            <option value="">-- pilih tahun --</option>
                            <?php for($i = 1990; $i < date('Y')+20; $i++) { ?>
                              <option value="<?php echo $i; ?>" <?php if(date('Y') == $i){echo "selected";} ?>><?php echo $i; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" name="nominal" id="nominal" required>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal Bayar</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                      </div>
                      <a href="index.php?page=data_pemasukan" class="btn btn-secondary mb-5">Kembali</a>
                      <button type="submit" name="simpan" class="btn btn-primary mb-5">Simpan</button>
                    </form>
                  </div>
                </div>
            </div>