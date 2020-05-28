<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href=""><i class="fa fa-home"></i></a></li>
</ul>
<div class="row">
	<div class="col md-4">
		<div class="panel">
			<div class="panel-title">Pinjaman Bulan <?php echo date('F') ?></div>
			<div class="panel-body">
				<div class="count"><?php echo $pinjaman->jml ?></div>
			</div>
		</div>
	</div>
	<div class="col md-4">
		<div class="panel">
			<div class="panel-title">Buku</div>
			<div class="panel-body">
				<div class="count"><?php echo $buku->jml ?></div>
			</div>
		</div>
	</div>
	<div class="col md-4">
		<div class="panel">
			<div class="panel-title">Stok di Gudang</div>
			<div class="panel-body">
				<div class="count"><?php echo $buku->stk ?></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col <?php if(Session::sess('akses') == 1){ echo 'md-9';}else{echo 'md-12';}?>">
		<div class="panel">
			<div class="panel-title">Stok Yang Habis</div>
			<div class="panel-body" style="max-height: 300px; overflow-y: auto;">
				<?php foreach ($bukus as $item): ?>
					<?php 
						if($item->stok == 0){
							$stok = 'stok telah habis';
						}elseif($item->stok <= 10){
							$stok = 'stok tersisa '.$item->stok.' pcs';
						}
						if($item->stok < 10){
					?>
							<p style="padding: 10px 0;"><b><a href="?p=pasok"><?php echo $item->judul ?></a></b> <?php echo $stok ?>
							<hr></p>
					<?php 
						}
					 ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<?php if(Session::sess('akses') == 1){ ?>
	<div class="col md-3">
		<div class="panel">
			<div class="panel-title">Backup</div>
			<div class="panel-body" style="text-align: center">
				<a href="?p=backup" target="_blank" class="btn"><i class="fa fa-cloud"></i> Backup</a>
			</div>
		</div>
	</div>
	<?php } ?>
</div>


<?php view('__footer') ?>