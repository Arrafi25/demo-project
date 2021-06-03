<?php 
  
  $siswa = query("SELECT * FROM 08_tbl_siswa");


 ?>
<div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Laporan Pengeluaran</h2>
                    </div>
                </div> 
                <div class="border"></div>
                <h3 class="mt-2" >Laporan Pengeluaran</h3>
                <div class="row mt-2">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                            <h4>Laporan Pengeluaran Bulanan</h4>
                          </div>
                          <div class="card-body">
                            <form action="laporan_pengeluaran_bulanan.php" method="post">
                              <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select class="form-control" id="bulan" name="bulan" required>
                                    <option value="">-- pilih bulan --</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">agustus</option>
                                    <option value="09">september</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                              </div>
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
                    <div class="col-md-4 mb-2">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                            <h4>Laporan Pengeluaran Tahunan</h4>
                          </div>
                          <div class="card-body">
                            <form action="laporan_pengeluaran_tahunan.php" method="post">
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
                    <div class="col-md-4 mb-2">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                            <h4>Laporan Pengeluaran Pilihan</h4>
                          </div>
                          <div class="card-body">
                            <form action="laporan_pengeluaran_pilihan.php" method="post">
                              <div class="form-group">
                                <label for="tgl_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                              </div>
                              <div class="form-group">
                                <label for="tgl_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
                              </div>
                              <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>