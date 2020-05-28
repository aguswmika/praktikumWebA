<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pasok</title>
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing:border-box;
	}

	body{
		font-family: "Arial";
	}
	.tbl{
		width: 100%;
		border-collapse: collapse;
	}

	.tbl th{
		text-align: left;
		padding: 5px;
	}

	.tbl td{
		padding: 5px;
	}
</style>
<body>
	<center style="margin-bottom: 20px;"> 
		<h3>ACBOOK - TOKO BUKU ONLINE</h3>
		<h1>LAPORAN PASOK</h1>
		<h3>Periode <?php echo empty(Input::get('awal')) ? date('Y-m-d') : Input::get('awal') ?> - <?php echo empty(Input::get('akhir')) ? date('Y-m-d') : Input::get('akhir') ?></h3>
		<?php if(Session::sess('akses') > 1) { ?><h5>Kasir: <?php echo Session::sess('nama') ?></h5><?php } ?>
		<h5>Tanggal: <?php echo date('Y-m-d H:i:s') ?></h5>
	</center>
	<table class="tbl">
		<thead>
			<tr bgcolor="#cccccc">
				<th>No</th>
				<th>ID</th>
				<th>Distributor</th>
				<th>Buku</th>
				<th>Tanggal</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>


		<?php 
			$no = 1;
			$jumlah = 0;
			foreach ($pasok as $item) {
				$jumlah += $item->jumlah;
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td width="130"><?php echo $item->id_pasok ?></td>
				<td><?php echo $item->nama_distributor ?> (<?php echo $item->id_distributor ?>)</td>
				<td><?php echo $item->judul ?> (<?php echo $item->id_buku ?>)</td>
				<td><?php echo $item->tanggal ?></td>
				<td><?php echo $item->jumlah ?></td>
			</tr>
		<?php } ?>
		<tr bgcolor="#cccccc">
			<td colspan="5"><b>Total</b></td>
			<td><b><?php echo $jumlah ?></b></td>
		</tr>

		</tbody>
	</table>

<script type="text/javascript">
	window.onload = function(){
		print();
		window.location = "<?php echo $_SERVER['HTTP_REFERER'] ?>"
	}
</script>

</body>
</html>