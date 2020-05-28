<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=pasok">Pasok</a></li>
	<li>Edit</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Edit Pasok</div>
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
				<input type="number" min="1" class="form-control" name="jumlah" value="<?php echo $pasok->jumlah ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal</label>
				<input type="date" name="tanggal" class="form-control" value="<?php echo $pasok->tanggal ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>