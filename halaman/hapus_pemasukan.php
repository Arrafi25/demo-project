<?php 

	$id_pemasukan = $_GET['id_pemasukan'];

	if(hapus_pemasukan($id_pemasukan) > 0) {

		echo "<script>alert('Data Berhasil dihapus'); document.location.href = 'index.php?page=data_pemasukan' </script>";
	}
	else {

		echo "<script>alert('Data Gagal dihapus'); document.location.href = 'index.php?page=data_pemasukan' </script>";
	}

 ?>