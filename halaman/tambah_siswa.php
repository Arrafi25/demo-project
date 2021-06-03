            <?php 

                if(isset($_POST['simpan'])) {

                  // var_dump($_POST); die;

                  if(tambah_siswa($_POST) > 0) {

                    echo "<script>alert('Data siswa berhasil ditambah'); document.location.href = 'index.php?page=data_siswa' </script>";
                  }
                  else {

                    echo "<script>alert('Data siswa gagal ditambah'); document.location.href = 'index.php?page=tambah_siswa' </script>";
                  }
                }

             ?>
            <div class="container-fluid">
               <div class="row mb-5 mt-2">
                    <div class="col-12 judul">
                        <h2>Tambah Data Siswa</h2>
                    </div>
                </div> 
                <div class="border mb-2"></div>
                <h3 class="mt-2">Form tambah</h3>
                <div class="row">
                  <div class="col-8">
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" required>
                      </div>
                      <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                      </div>
                      <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" required>
                            <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="4" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                      </div>
                      <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                      </div>
                      <a href="index.php?page=data_siswa" class="btn btn-secondary mb-5">Kembali</a>
                      <button type="submit" name="simpan" class="btn btn-primary mb-5">Simpan</button>
                    </form>
                  </div>
                </div>
            </div>