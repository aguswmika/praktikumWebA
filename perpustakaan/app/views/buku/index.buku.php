<?php view('__header', $data) ?>
	<div id="list-book">List Buku</div>
	<center style="margin-bottom: 20px;">
		<div class="search">
			<form method="get" action="<?php echo base_url() ?>" class="clearfix">
				<input type="search" name="search" style="border: 1px solid #cccccc" class="form-control" placeholder="Type search and hit enter"><button class="btn"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</center>
	<div class="container">
		<div class="row">
			<?php foreach ($buku as $item) { ?>
				<div class="col md-3">
					<div class="card">
						<img src="<?php echo base_url('uploads/'.$item->gambar) ?>">
						<h2><?php echo (strlen($item->judul) > 15) ? substr($item->judul, 0, 15)."..." : $item->judul ?></h2>
						<p><?php echo (strlen($item->penulis) > 15) ? substr($item->penulis, 0, 15)."..." : $item->penulis ?></p>
						<a href="<?php echo base_url('buku/'.$item->slug) ?>" class="btn btn-block"><i class="fa fa-send"></i> Lihat</a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php echo $paginate ?>
	</div>
	<div class="cleafix" style="margin-bottom: 40px;"></div>
<?php view('__footer') ?>