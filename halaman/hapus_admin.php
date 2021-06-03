<?php 

	$id_admin = $_GET['id_admin'];

	if(hapus_admin($id_admin) > 0) {

		echo "<script>alert('Data admin Berhasil dihapus'); document.location.href = 'index.php?page=data_admin' </script>";
	}
	else {

		echo "<script>alert('Data admin Gagal dihapus'); document.location.href = 'index.php?page=data_admin' </script>";
	}

 ?>