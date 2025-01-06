<html>
<title>LAPORAN PEMESANAN</title>
<style type="text/css">
	body {
		-webkit-print-color-adjust: exact;
		print-color-adjust: exact;
		padding: 50px;
	}

	#table {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
	}

	#table td,
	#table th {
		padding: 8px;
		padding-top: 15px;
	}

	#table tr {
		padding-top: 15px;
		padding-bottom: 15px;
	}

	#table tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	#table th {
		padding-top: 15px;
		padding-bottom: 15px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}

	.biru {
		background-color: #06bbcc;
		color: white;
	}

	@page {
		size: auto;
		margin: 0;
	}
</style>
<?php
function tanggal($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
?>

<body>
	<center>
		<table width="500px">
			<tr>
				<td style="padding-right:5px"><img src="<?= BASEURL ?>/foto/logo.png" width="125"></td>
				<td>
					<font size="6"><b>Velosta</b></font><br>
					<font size="2">Menara 165, Jln Tb. Simatupang
					</font><br>
	</center>
	</td>
	</tr>
	</table>
	<br>
	<center>
		<h4>
			<b>LAPORAN DATA PENJUALAN</b>
			<br>
			<?= tanggal($tanggalawal) . ' - ' . tanggal($tanggalakhir) ?>
		</h4>
	</center>
	<br>
	<table class="tabel" id="table" width="100%">
		<thead class="bg-primary text-white">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th style="width: 150px;">No. HP</th>
				<th>Daftar</th>
				<th>Tanggal Pemesanan</th>
				<th>Total Penjualan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$nomor = 1;
			$total_pemesanan = 0;
			foreach ($laporan as $pecah) {
				$total_pemesanan += $pecah['totalbeli'];
			?>

				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama'] ?></td>
					<td><?php echo ($pecah['telepon']) ?></td>
					<td>
						<ul>
							<?php
							$db = $this->getDb();
							$produk = $db->query("SELECT * FROM penjualan 
                                                                   JOIN produk ON penjualan.idproduk = produk.idproduk 
                                                                   WHERE idpenjualan = '{$pecah['idpenjualan']}'")->fetch_all(MYSQLI_ASSOC);
							foreach ($produk as $item) { ?>
								<li>
									<?= $item['namaproduk'] ?> <span>(<?= $item['jumlah'] ?>)</span>
									<br>
								</li>
							<?php } ?>
						</ul>
					</td>
					<td><?= tanggal(date('Y-m-d', strtotime($pecah['tanggalbeli']))) ?></td>
					<td>Rp. <?php echo number_format($pecah['totalbeli']) ?></td>
				</tr>
			<?php $nomor++;
			}
			?>
			<tr>
				<td colspan="5" style="text-align: right;"><strong>Total </strong></td>
				<td><strong>Rp. <?= number_format($total_pemesanan) ?></strong></td>
			</tr>

		</tbody>
	</table>
</body>
<script>
	window.print();
</script>

</html>