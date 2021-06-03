<?php 

	$id_siswa = $_GET['id_siswa'];

	if(hapus_siswa($id_siswa) > 0) {

		echo "<script>alert('Data siswa Berhasil dihapus'); document.location.href = 'index.php?page=data_siswa' </script>";
	}
	else {

		echo "<script>alert('Data siswa Gagal dihapus'); document.location.href = 'index.php?page=data_siswa' </script>";
	}

 ?>