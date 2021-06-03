<?php 
  
  $siswa = query("SELECT * FROM 08_tbl_siswa");

 ?>
<div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Laporan Pemasukan</h2>
                    </div>
                </div> 
                <div class="border"></div>
                <h3 class="mt-2" >Laporan Pemasukan</h3>
                <div class="row mt-2">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                            <h4>Laporan Tahunan Siswa</h4>
                          </div>
                          <div class="card-body">
                            <form action="laporan_pemasukan_tahunan_siswa.php" method="post">
                              <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" id="tahun" name="tahun" required>
                                  <option value="">-- pilih tahun --</option>
                                  <?php for($i = 1990; $i < date('Y')+20; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="id_siswa">Siswa</label>
                                <select class="form-control" id="id_siswa" name="id_siswa" required>
                                  <option value="">-- pilih siswa --</option>
                                  <?php foreach($siswa as $siswa) { ?>
                                    <option value="<?php echo $siswa['id_siswa']; ?>"><?php echo $siswa['nama_siswa']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </form>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                            <h4>Laporan Tahunan</h4>
                          </div>
                          <div class="card-body">
                            <form action="laporan_pemasukan_tahunan.php" method="post">
                              <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" id="tahun" name="tahun" required>
                                  <option value="">-- pilih tahun --</option>
                                  <?php for($i = 1990; $i < date('Y')+20; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>