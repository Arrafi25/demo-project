<?php 

	include 'config.php';

	$siswa = query("SELECT * FROM 08_tbl_siswa ORDER BY nama_siswa ASC");
	$tahun = $_POST['tahun'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pemasukan Tahunan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<h3>LAPORAN PEMASUKAN TAHUNAN</h3>
		<table>
			<tr>
				<td width="50">Tahun</td>
				<td>: <?php echo $tahun; ?></td>
			</tr>
			<tr>
				<td width="50">Tanggal</td>
				<td>: <?php echo tgl_indo(date('Y-m-d')); ?></td>
			</tr>
		</table>
		<table border="1" cellspacing="0" cellpadding="10" class="mt-3" width="100%">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Januari</th>
				<th>Februari</th>
				<th>Maret</th>
				<th>April</th>
				<th>Mei</th>
				<th>Juni</th>
				<th>Juli</th>
				<th>Agustus</th>
				<th>September</th>
				<th>Oktober</th>
				<th>November</th>
				<th>Desember</th>
			</tr>
			<?php $i= 1; foreach($siswa as $siswa) { ?>
				<?php $id_siswa = $siswa['id_siswa']; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $siswa['nama_siswa'] ?></td>
					<td>
						<?php $januari = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '01' AND tahun = '$tahun'");
						if(count($januari) > 0){echo $januari[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $februari = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '02' AND tahun = '$tahun'");
						if(count($februari) > 0){echo $februari[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $maret = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '03' AND tahun = '$tahun'");
						if(count($maret) > 0){echo $maret[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $april = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '04' AND tahun = '$tahun'");
						if(count($april) > 0){echo $april[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $mei = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '05' AND tahun = '$tahun'");
						if(count($mei) > 0){echo $mei[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $juni = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '06' AND tahun = '$tahun'");
						if(count($juni) > 0){echo $juni[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $juli = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '07' AND tahun = '$tahun'");
						if(count($juli) > 0){echo $juli[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $agustus = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '08' AND tahun = '$tahun'");
						if(count($agustus) > 0){echo $agustus[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $september = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '09' AND tahun = '$tahun'");
						if(count($september) > 0){echo $september[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $oktober = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '10' AND tahun = '$tahun'");
						if(count($oktober) > 0){echo $oktober[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $november = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '11' AND tahun = '$tahun'");
						if(count($november) > 0){echo $november[0]['tanggal'];} 
						?>
					</td>
					<td>
						<?php $desember = query("SELECT * FROM 08_tbl_pemasukan WHERE id_siswa = $id_siswa AND bulan = '12' AND tahun = '$tahun'");
						if(count($desember) > 0){echo $desember[0]['tanggal'];} 
						?>
					</td>
				</tr>
			<?php $i++; } ?>
		</table>
		<center class="mt-4"><a href="index.php?page=laporan_pemasukan"><- Kembali</a></center>
	</div>
</body>
</html>