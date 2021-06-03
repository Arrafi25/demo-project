<?php 

	include 'config.php';

	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];
	$nama_admin = $_SESSION['nama_admin'];
	$pengeluaran = query("SELECT * FROM 08_tbl_pengeluaran WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pengeluaran Pilihan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<h3>LAPORAN PENGELUARAN PILIHAN TANGGAL</h3>
		<table>
			<tr>
				<td width="50">Tanggal</td>
				<td>: <?php echo tgl_indo($tgl_awal)." Sampai ".tgl_indo($tgl_akhir); ?></td>
			</tr>
			<tr>
				<td width="50">Tanggal</td>
				<td>: <?php echo tgl_indo(date('Y-m-d')); ?></td>
			</tr>
		</table>
		<table border="1" cellspacing="0" cellpadding="10" class="mt-3" width="100%">
			<tr>
				<th>No</th>
				<th>Admin</th>
				<th>Nama Siswa</th>
				<th>Tanggal</th>
				<th>Nominal</th>
				<th>Keterangan</th>
			</tr>
			<?php $i= 1; foreach($pengeluaran as $pengeluaran) { ?>
				<?php 
					$id_siswa = $pengeluaran['id_siswa'];
					$id_admin = $pengeluaran['id_admin'];
					$siswa = query("SELECT * FROM 08_tbl_siswa WHERE id_siswa = $id_siswa"); 
					$admin = query("SELECT * FROM 08_tbl_admin WHERE id_admin = $id_admin")
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td>
						<?php if(count($admin) > 0){echo $admin[0]['nama_admin'];} ?>
					</td>
					<td><?php if(count($siswa) > 0){echo $siswa[0]['nama_siswa'];} ?></td>
					<td><?php echo tgl_indo($pengeluaran['tanggal']); ?></td>
					<td><?php echo $pengeluaran['nominal']; ?></td>
					<td><?php echo $pengeluaran['keterangan']; ?></td>
				</tr>
			<?php $i++; } ?>
			<tr>
					<th colspan="4" align="center">Total</th>
					<th>
						<?php $total = query("SELECT SUM(nominal) as total FROM 08_tbl_pengeluaran WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						echo $total[0]['total']; ?>
					</th>
					<td></td>
				</tr>
		</table>
		<center class="mt-4"><a href="index.php?page=laporan_pengeluaran"><- Kembali</a></center>
	</div>
</body>
</html>