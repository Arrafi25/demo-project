<?php 

  if(isset($_POST['kirim'])) {

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
  }
  else {

    $bulan = date('m');
    $tahun = date('Y');
  }

 ?>

<div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>KAS Kelas</h2>
                    </div>
                </div> 
                <div class="border"></div>
                <h3 class="mt-2" >Dashboard</h3>
                <form class="form-inline" action="" method="post">
                  <div class="form-group mx-sm-3 mb-2">
                                <label for="bulan">Bulan :</label>
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
                      <div class="form-group mx-sm-3 mb-2">
                                <label for="tahun">Tahun :</label>
                                <select class="form-control" id="tahun" name="tahun" required>
                                  <option value="">-- pilih tahun --</option>
                                  <?php for($i = 1990; $i < date('Y')+20; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                  <button type="submit" name="kirim" class="btn btn-primary mb-2">Cari</button>
                </form>
                <div class="row mt-2">
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header bg-secondary text-white">
                            <h4>Data Siswa</h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php $siswa = query("SELECT * FROM 08_tbl_siswa"); 
                                echo count($siswa);
                              ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Siswa
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header text-white" style="background-color: lightblue;">
                            <h4>Sisa Saldo</h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php 
                                $total_pemasukan =  query("SELECT SUM(nominal) as total FROM 08_tbl_pemasukan"); 
                                $total_pengeluaran =  query("SELECT SUM(nominal) as total FROM 08_tbl_pengeluaran");
                                $sisa_saldo = $total_pemasukan[0]['total'] - $total_pengeluaran[0]['total'];
                                echo "Rp ".$sisa_saldo.",-";
                              ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Rupiah
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header text-white" style="background-color: lightgreen;">
                            <h4>Total Pemasukan</h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php 
                                $total_pemasukan =  query("SELECT SUM(nominal) as total FROM 08_tbl_pemasukan"); 
                                if($total_pemasukan[0]['total'] != "") {
                                  echo "Rp ".$total_pemasukan[0]['total'].",-";
                                }
                                else {
                                  echo "Rp 0,-";
                                }
                              ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Rupiah
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header text-white" style="background-color: red;">
                            <h4>Total Pengeluaran</h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php 
                                $total_pengeluaran =  query("SELECT SUM(nominal) as total FROM 08_tbl_pengeluaran");
                                if($total_pengeluaran[0]['total'] != "") {
                                  echo "Rp ".$total_pengeluaran[0]['total'].",-";
                                }
                                else {
                                  echo "Rp 0,-";
                                }
                               ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Rupiah
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header text-white" style="background-color: yellowgreen;">
                            <h4>Pemasukan Bulan <?php echo bln_indo($bulan)." ".$tahun; ?></h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php 
                                $pemasukan_bulanan =  query("SELECT SUM(nominal) as total FROM 08_tbl_pemasukan WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
                                if($pemasukan_bulanan[0]['total'] != "") {
                                  echo "Rp ".$pemasukan_bulanan[0]['total'].",-";
                                }
                                else {
                                  echo "Rp 0,-";
                                }
                               ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Rupiah
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card text-center">
                          <div class="card-header text-white" style="background-color: lightskyblue;">
                            <h4>Pengeluaran Bulan <?php echo bln_indo($bulan)." ".$tahun ?></h4>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                              <?php 
                                $pengeluaran_bulanan =  query("SELECT SUM(nominal) as total FROM 08_tbl_pengeluaran WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
                                if($pengeluaran_bulanan[0]['total'] != "") {
                                  echo "Rp ".$pengeluaran_bulanan[0]['total'].",-";
                                }
                                else {
                                  echo "Rp 0,-";
                                }
                               ?>
                            </h5>
                          </div>
                          <div class="card-footer text-muted">
                            Rupiah
                          </div>
                        </div>
                    </div>
                </div>
            </div>