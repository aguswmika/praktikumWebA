<?php view('__header', $data) ?>
<div id="service">
	<div class="container">
		<div class="row">
			<div class="col md-4 service cleafix">
				<i class="fa fa-book fa-5x"></i> <span><h3>Penuh Buku</h3> Kami memberikan pilihan buku lebih banyak untuk Anda</span>
			</div>
			<div class="col md-4 service cleafix">
				<i class="fa fa-lock fa-5x"></i> <span><h3>Aman</h3> Kami memberikan pilihan buku lebih banyak untuk Anda</span>
			</div>
			<div class="col md-4 service cleafix">
				<i class="fa fa-certificate fa-5x"></i> <span><h3>Transparan</h3> Bandingkan review untuk berbagai online shop terpercaya se-Indonesia</span>
			</div>
		</div>
	</div>
</div>
<div id="latest">
	<div class="container">
		<div class="title">Buku Terbaru</div>
		<div class="row">
			<?php foreach ($buku as $item) { ?>
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

<div id="quotes">
	<center>
		<h1>“We read to know we're not alone.” </h1>
		<h5>- William Nicholson, Shadowlands</h5>
	</center>
</div>

<div id="featured">
	<div class="container">
		<div class="row">
			<div class="col md-4">
				<div class="featured-img">
					<h2>Buku Pilihan</h2>
				</div>
			</div>
			<div class="col md-8">
				<div class="owl-carousel">
					<?php foreach ($feature as $item) { ?>
						<div>
							<div class="card-container">
								<div class="card">
									<img src="<?php echo base_url('uploads/'.$item->gambar) ?>">
									<h2><?php echo (strlen($item->judul) > 15) ? substr($item->judul, 0, 15)."..." : $item->judul ?></h2>
									<p><?php echo (strlen($item->penulis) > 15) ? substr($item->penulis, 0, 15)."..." : $item->penulis ?></p>
									<span class="price">[ Rp <?php echo $item->harga_final ?> ]</span>
									<a href="<?php echo base_url('buku/'.$item->slug) ?>" class="btn btn-block"><i class="fa fa-send"></i> Lihat</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php view('__footer') ?>