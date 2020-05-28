<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li>Laporan Pasok</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Laporan Pasok</div>
	<div class="panel-body">
		<div class="clearfix" style="margin-bottom: 10px">
			<div class="fl">
				<form method="get">
					<input type="hidden" name="p" value="laporan">
					<input type="hidden" name="act" value="pasok">
					<div class="form-group">
						<label>Awal</label>
						<input type="date" name="awal" class="form-control" value="<?php echo empty(Input::get('awal')) ? date('Y-m-d') : Input::get('awal') ?>">
					</div>
					<div class="form-group">
						<label>Akhir</label>
						<input type="date" name="akhir" class="form-control" value="<?php echo empty(Input::get('akhir')) ? date('Y-m-d') : Input::get('akhir') ?>">
					</div>
					<div class="form-group">
						<button class="btn">Tampilkan</button>
					</div>
				</form>
			</div>
			<div class="fr">
				<a href="?p=laporan&act=cetakps&awal=<?php echo empty(Input::get('awal')) ? date('Y-m-d') : Input::get('awal') ?>&akhir=<?php echo empty(Input::get('akhir')) ? date('Y-m-d') : Input::get('akhir') ?>&_token=<?php echo CSRF::token() ?>" class="btn">Cetak</a>
			</div>
		</div>
		<div class="tbl-responsive">
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
						<td><?php echo $item->id_pasok ?></td>
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
		</div>
	</div>
</div>

<?php view('__footer') ?>