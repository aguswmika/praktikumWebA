<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=pasok">Pasok</a></li>
	<li>Add</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Tambah Pasok</div>
	<div class="panel-body">
		<form method="post">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Distributor</label>
				<select name="distri" required class="form-control">
					<option value="">-- Pilih --</option>
					<?php foreach ($distri as $item) {?>
						<option value="<?php echo $item->id_distributor ?>"><?php echo $item->nama_distributor ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Buku</label>
				<select class="form-control" name="buku" required>
					<option value="">-- Pilih --</option>
					<?php foreach ($buku as $item) {?>
						<option value="<?php echo $item->id_buku ?>"><?php echo $item->judul ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jumlah</label>
				<input type="number" min="1" value="1" class="form-control" name="jumlah" required>
			</div>
			<div class="form-group">
				<label>Tanggal</label>
				<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>
