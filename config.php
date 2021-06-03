<?php 

	$conn = mysqli_connect("trunojoyopython.com", "trunojoy_kuliah", "unijoyo2021", "trunojoy_hotel");
	session_start();

	function query($query) {
		global $conn;

		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}

		return $rows;
	}

	function tambah_siswa($data) {
		global $conn;

		$nisn = $data['nisn'];
		$nama_siswa = $data['nama_siswa'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$tgl_lahir = $data['tgl_lahir'];
		$no_telp = $data['no_telp'];

		$sql = "SELECT * FROM 08_tbl_siswa WHERE nisn = '$nisn'";
		$cek_data = mysqli_query($conn, $sql);

		if(mysqli_num_rows($cek_data) > 0) {

			echo "<script>alert('Data siswa dengan NISN ".$nisn." sudah tersedia! Silahkan masukan ulang NISN'); document.location.href = 'index.php?page=tambah_siswa' </script>";
		}
		else {

			$query = "INSERT INTO 08_tbl_siswa VALUES('', '$nisn', '$nama_siswa', '$jenis_kelamin', '$alamat', '$tgl_lahir', '$no_telp')";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}

	}

	function hapus_siswa($id_siswa) {
		global $conn;

		$query = "DELETE FROM 08_tbl_siswa WHERE id_siswa = $id_siswa";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function edit_siswa($data) {
		global $conn;

		$id_siswa = $data['id_siswa'];
		$nisn = $data['nisn'];
		$nama_siswa = $data['nama_siswa'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$tgl_lahir = $data['tgl_lahir'];
		$no_telp = $data['no_telp'];

		$query = "UPDATE 08_tbl_siswa SET nisn = '$nisn', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', tgl_lahir = '$tgl_lahir', no_telp = '$no_telp' WHERE id_siswa = $id_siswa";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function tambah_admin($data) {
		global $conn;

		$username = $data['username'];
		$password = $data['password'];

		$sql = "SELECT * FROM 08_tbl_admin WHERE username = '$username'";
		$cek_data = mysqli_query($conn, $sql);
		if(mysqli_num_rows($cek_data) > 0) {

			echo "<script>alert('Data admin dengan Username ".$username." sudah tersedia! Silahkan pilih ulang'); document.location.href = 'index.php?page=tambah_admin' </script>";
		}
		else {

			$sql1 = mysqli_query($conn, "SELECT * FROM 08_tbl_siswa WHERE nisn = '$username'");
			$siswa = mysqli_fetch_assoc($sql1);
			$nama_admin = $siswa['nama_siswa'];
			$pass = password_hash($password, PASSWORD_DEFAULT);

			$query = "INSERT INTO 08_tbl_admin VALUES('', '$username', '$pass', '$nama_admin')";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}

	}

	function hapus_admin($id_admin) {
		global $conn;

		$query = "DELETE FROM 08_tbl_admin WHERE id_admin = $id_admin";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function edit_admin($data) {
		global $conn;

		$id_admin = $data['id_admin'];
		$username = $data['username'];
		$password = password_hash($data['password'], PASSWORD_DEFAULT);
		$nama_admin = $data['nama_admin'];

		$query = "UPDATE 08_tbl_admin SET username = '$username', password = '$password', nama_admin = '$nama_admin' WHERE id_admin = $id_admin";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function tambah_pemasukan($data) {
		global $conn;

		$id_admin = $data['id_admin'];
		$id_siswa = $data['id_siswa'];
		$bulan = $data['bulan'];
		$tahun = $data['tahun'];
		$nominal = $data['nominal'];
		$tanggal = $data['tanggal'];

		$sql = "SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '$bulan' AND tahun = '$tahun'";
		$cek_data = mysqli_query($conn, $sql);

		if(mysqli_num_rows($cek_data) > 0) {

			$q = mysqli_query($conn, "SELECT * FROM 08_tbl_siswa WHERE id_siswa = $id_siswa");
			$siswa = mysqli_fetch_assoc($q);
			echo "<script>alert('".$siswa['nama_siswa']." sudah melakukan pembayaran di bulan ".bln_indo($bulan)." ".$tahun." ! Silahkan masukan ulang data'); document.location.href = 'index.php?page=tambah_pemasukan' </script>";
		}
		else {

			$query = "INSERT INTO 08_tbl_pemasukan VALUES('', $id_admin, $id_siswa, '$tanggal', '$bulan', '$tahun', '$nominal')";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}

	}

	function edit_pemasukan($data) {
		global $conn;

		$id_pemasukan = $data['id_pemasukan'];
		$id_admin = $data['id_admin'];
		$id_siswa = $data['id_siswa'];
		$bulan = $data['bulan'];
		$tahun = $data['tahun'];
		$nominal = $data['nominal'];
		$tanggal = $data['tanggal'];

		$sql = "SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '$bulan' AND tahun = '$tahun'";
		$cek_data = mysqli_query($conn, $sql);

		if(mysqli_num_rows($cek_data) > 0) {

			$q = mysqli_query($conn, "SELECT * FROM 08_tbl_siswa WHERE id_siswa = $id_siswa");
			$siswa = mysqli_fetch_assoc($q);
			echo "<script>alert('".$siswa['nama_siswa']." sudah melakukan pembayaran di bulan ".bln_indo($bulan)." ".$tahun." ! Silahkan masukan ulang data'); document.location.href = 'index.php?page=edit_pemasukan&&id_pemasukan=".$id_pemasukan."' </script>";
		}
		else {

			$query = "UPDATE 08_tbl_pemasukan SET id_admin = $id_admin, id_siswa = $id_siswa, tanggal = '$tanggal', bulan = '$bulan', tahun = '$tahun', nominal = '$nominal' WHERE id_pemasukan = $id_pemasukan";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}

	}

	function hapus_pemasukan($id_pemasukan) {
		global $conn;

		$query = "DELETE FROM 08_tbl_pemasukan WHERE id_pemasukan = $id_pemasukan";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function tambah_pengeluaran($data) {
		global $conn;

		$id_admin = $data['id_admin'];
		$id_siswa = $data['id_siswa'];
		$nominal = $data['nominal'];
		$tanggal = $data['tanggal'];
		$keterangan = $data['keterangan'];
		$total_pemasukan = query("SELECT SUM(nominal) AS total FROM 08_tbl_pemasukan");

		if($nominal > $total_pemasukan[0]['total']) {

			echo "<script>alert('Nominal pengeluaran terlalu besar'); document.location.href = 'index.php?page=tambah_pengeluaran'</script>";
		}
		else {

			$query = "INSERT INTO 08_tbl_pengeluaran VALUES('', $id_admin, $id_siswa, '$tanggal', '$nominal', '$keterangan')";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}

	}

	function edit_pengeluaran($data) {
		global $conn;

		$id_pengeluaran = $data['id_pengeluaran'];
		$id_admin = $data['id_admin'];
		$id_siswa = $data['id_siswa'];
		$nominal = $data['nominal'];
		$tanggal = $data['tanggal'];
		$keterangan = $data['keterangan'];
		$total_pemasukan = query("SELECT SUM(nominal) AS total FROM 08_tbl_pemasukan");


		if($nominal > $total_pemasukan[0]['total']) {

			echo "<script>alert('Nominal pengeluaran terlalu besar'); document.location.href = 'index.php?page=edit_pengeluaran'</script>";
		}
		else {

			$query = "UPDATE 08_tbl_pengeluaran SET id_admin = $id_admin, id_siswa = $id_siswa, tanggal = '$tanggal', nominal = '$nominal', keterangan = '$keterangan' WHERE id_pengeluaran = $id_pengeluaran";
			$result = mysqli_query($conn, $query);

			return mysqli_affected_rows($conn);
		}
	}


	function hapus_pengeluaran($id_pengeluaran) {
		global $conn;

		$query = "DELETE FROM 08_tbl_pengeluaran WHERE id_pengeluaran = $id_pengeluaran";
		$result = mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function bln_indo($x) {

		$bulan = [
			"01" => "Januari",
			"02" => "Februari",
			"03" => "Maret",
			"04" => "April",
			"05" => "Mei",
			"06" => "Juni",
			"07" => "Juli",
			"08" => "Agustus",
			"09" => "September",
			"10" => "Oktober",
			"11" => "November",
			"12" => "Desember"
		];

		return $bulan[$x];
	}

	function tgl_indo($x) {

		echo $x;
		$a = explode('-', $x);
		var_dump($a);
		$bulan = [
			"01" => "Januari",
			"02" => "Februari",
			"03" => "Maret",
			"04" => "April",
			"05" => "Mei",
			"06" => "Juni",
			"07" => "Juli",
			"08" => "Agustus",
			"09" => "September",
			"10" => "Oktober",
			"11" => "November",
			"12" => "Desember"
		];

		return $a[2]." ".$bulan[$a[1]]." ".$a[0]; 
	}


 ?>