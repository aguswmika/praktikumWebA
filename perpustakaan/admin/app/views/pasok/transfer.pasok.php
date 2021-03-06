<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=pasok">Pasok</a></li>
	<li>Transfer</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Transfer Pasok</div>
	<div class="panel-body">
		<form method="post">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Distributor</label>
				<input type="text" disabled value="<?php echo $pasok->nama_distributor ?> (<?php echo $pasok->id_distributor ?>)" class="form-control">
			</div>
			<div class="form-group">
				<label>Buku</label>
				<input type="text" disabled value="<?php echo $pasok->judul ?> (<?php echo $pasok->id_buku ?>)" class="form-control">
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" min="1" class="form-control" disabled value="<?php echo $pasok->jumlah ?>" required>
			</div>
			<div class="form-group">
				<label>Jumlah ditransfer</label>
				<input type="number" min="1" class="form-control" name="transfer" value="1" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<input type="hidden" name="buku" value="<?php echo $pasok->id_buku ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>