<?php view('__header', $data) ?>
	<div id="list-book">Detail Buku</div>
	<div class="container" style="padding: 30px 0px 50px 0">
		<div class="row">
			<div class="col md-4">
				<img src="<?php echo base_url('uploads/'.$buku->gambar) ?>" class="img-full">
			</div>
			<div class="col md-8">
				<h1><?php echo $buku->judul ?> <small class="price" style="display: inline">[ Rp <?php echo $buku->harga_final ?>]</small></h1>
				<a href="<?php echo base_url('kontak') ?>" class="btn" style="margin-top: 20px"><i class="fa fa-shopping-cart"></i> Pesan Sekarang</a>
				<table class="tbl">
					<tr>
						<td colspan="3"><h4>Deskripsi Buku</h4></td>
					</tr>
					<tr>
						<td><b>Judul</b></td>
						<td>:</td>
						<td><?php echo $buku->judul ?></td>
					</tr>
					<tr>
						<td><b>No. ISBN</b></td>
						<td>:</td>
						<td><?php echo $buku->noisbn ?></td>
					</tr>
					<tr>
						<td><b>Penulis</b></td>
						<td>:</td>
						<td><?php echo $buku->penulis ?></td>
					</tr>
					<tr>
						<td><b>Penerbit</b></td>
						<td>:</td>
						<td><?php echo $buku->penerbit ?></td>
					</tr>
					<tr>
						<td><b>Tahun</b></td>
						<td>:</td>
						<td><?php echo $buku->tahun ?></td>
					</tr>
					<tr>
						<td><b>Stok</b></td>
						<td>:</td>
						<td><?php echo ($buku->stok > 0) ? '<b style="color: #66bb6a">Stok tersedia di toko</b>' : '<b style="color: #ef5350">Stok di gudang supplier</b>' ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div id="latest">
	<div class="container">
		<div class="title">Buku Lainnya</div>
		<div class="row">
			<?php foreach ($rand as $item) { ?>
				<div class="col md-3">
					<div class="card">
						<img src="<?php echo base_url('uploads/'.$item->gambar) ?>">
						<h2><?php echo (strlen($item->judul) > 15) ? substr($item->judul, 0, 15)."..." : $item->judul ?></h2>
						<p><?php echo (strlen($item->penulis) > 15) ? substr($item->penulis, 0, 15)."..." : $item->penulis ?></p>
						<span class="price">[ Rp <?php echo $item->harga_final ?> ]</span>
						<a href="<?php echo base_url('buku/'.$item->slug) ?>" class="btn btn-block"><i class="fa fa-send"></i> Lihat</a>
					</div>
				</div>
			<?php } ?>
		</div>
		<center style="margin-top: 40px;"><a href="<?php echo base_url('buku') ?>" class="btn"><i class="fa fa-arrow-circle-left"></i> Lebih Banyak Buku</a></center>
	</div>
</div>
	<div class="cleafix" style="margin-bottom: 40px;"></div>
<?php view('__footer') ?>