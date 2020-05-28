<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=user">User</a></li>
	<li>Edit</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Edit User</div>
	<div class="panel-body">
		<form method="post" id="frm">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="<?php echo $user->nama ?>" class="form-control" name="nama" required>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea name="alamat" class="form-control" style="height: 200px;"><?php echo $user->alamat ?></textarea>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" maxlength="15" value="<?php echo $user->telepon ?>" class="form-control" name="telepon" required>
			</div>
			<?php if(Session::sess('akses') == 1){ ?>
			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value="active">Active</option>
					<option value="inactive" <?php if($user->status == 'inactive'){echo 'selected';} ?>>Inactive</option>
				</select>
			</div>
			<?php } ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" value="<?php echo $user->username ?>" class="form-control" name="user" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="pass" id="pass">
			</div>
			<div class="form-group">
				<label>Retype Password</label>
				<input type="password" class="form-control" name="pass" id="repass">
			</div>
			<?php if(Session::sess('akses') == 1){ ?>
			<div class="form-group">
				<label>Akses</label>
				<select name="akses" class="form-control">
					<option value="2">Kasir</option>
					<option value="1" <?php if($user->akses == 1){echo 'selected';} ?>>Admin</option>
				</select>
			</div>
			<?php } ?>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<?php 
					if(!empty(Input::get('edit'))){
						$confirm = 'onclick="return confirm(\'Yakin ingin mengubah?\');"';
					}else{
						$confirm = '';
					}
				 ?>
				<button class="btn btn-block" <?php echo $confirm ?>>Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#frm').submit(function(){
			if($('#repass').val() != $('#pass').val()){
				alert('Password tidak sama! Silahkan di cek ulang');
				return false;
			}else{
				return true;
			}
		})
	})
</script>