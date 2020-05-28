<!DOCTYPE html>
<html>
<head>
	<title>AcBook - Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="background-color: #4caf50;">
<form method="post">
	<div class="login-container">
		<div class="login"><center>
			<div class="panel" style="width: 350px;">
				<div class="panel-title">
					Login
				</div>
				<div class="panel-body" style="background-color: #FFFFFF;">
					<?php echo msg() ?>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="user" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
						<button class="btn btn-block">Login</button>
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
