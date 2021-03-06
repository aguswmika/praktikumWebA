<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=user">User</a></li>
	<li>Add</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Tambah User</div>
	<div class="panel-body">
		<form method="post">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="" class="form-control" name="nama" required>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" style="height: 200px;"></textarea>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" maxlength="15" value="" class="form-control" name="telepon" required>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" value="" class="form-control" name="user" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" value="" class="form-control" name="pass" required>
			</div>
			<div class="form-group">
				<label>Akses</label>
				<select name="akses" class="form-control">
					<option value="3">Peminjam</option>
					<option value="2">Admin</option>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>