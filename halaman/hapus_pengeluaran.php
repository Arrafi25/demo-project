<?php 

	$id_pengeluaran = $_GET['id_pengeluaran'];

	if(hapus_pengeluaran($id_pengeluaran) > 0) {

		echo "<script>alert('Data Berhasil dihapus'); document.location.href = 'index.php?page=data_pengeluaran' </script>";
	}
	else {

		echo "<script>alert('Data Gagal dihapus'); document.location.href = 'index.php?page=data_pengeluaran' </script>";
	}

 ?>