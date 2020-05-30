<!DOCTYPE html>
<html>
<head>
	<title>AcBook - Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="background-color: #4caf50;">
<form method="post">
	<div class="login-container">
		<div class="login"><center>
			<div class="panel" style="width: 350px;">
				<div class="panel-title">
					Register
				</div>
				<div class="panel-body" style="background-color: #FFFFFF;">
                    <?php echo msg() ?>
                    <div class="form-group">
						<label>Nama (*)</label>
						<input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" style="height: 100px"></textarea>
                    </div>
                    <div class="form-group">
						<label>Telepon (*)</label>
						<input type="text" name="telepon" class="form-control" required>
                    </div>
					<div class="form-group">
						<label>Username (*)</label>
						<input type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password (*)</label>
						<input type="password" name="pass" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
						<button class="btn btn-block">Register</button>
                    </div>
                    <div class="form-group">
                        <center><a href="?p=login">Already have an account?</a></center>
                    </div>
				</div>
			</div>
		</center></div>
	</div>
</form>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.message i').click(function(){
			$(this).parent().parent().remove();
		})
	})
</script>
</body>
</html>
