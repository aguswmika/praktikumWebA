<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=distributor">Distributor</a></li>
	<li>Edit</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Edit Distributor</div>
	<div class="panel-body">
		<form method="post">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $distri->nama_distributor ?>" required>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" style="height: 200px;"><?php echo $distri->alamat ?></textarea>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" maxlength="15" class="form-control" name="telepon" value="<?php echo $distri->telepon ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>