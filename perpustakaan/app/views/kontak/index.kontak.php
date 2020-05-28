<?php view('__header', $data) ?>
	<div id="list-book">Kontak Kami</div>
	<div class="container" style="padding: 30px 0px 50px 0;">
		<div class="row">
			<div class="col md-7">
				<?php echo msg() ?>
				<form method="post">
					<div class="form-group">
						<label>Perihal (*)</label>
						<input type="text" name="perihal" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama (*)</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email (*)</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Pesan (*)</label>
						<textarea name="pesan" class="form-control" style="height: 200px"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
						<button class="btn" onclick="return confirm('Yakin ingin mengirim?');"><i class="fa fa-send"></i> Submit</button>
					</div>
				</form>
			</div>
			<div class="col md-3">
				<h3 style="margin-bottom: 30px;">Terhubung Dengan Kami</h3>
				<span class="contact"><i class="fa fa-envelope"></i> info@acbook.com</span>
				<span class="contact"></span><i class="fa fa-phone"></i> 085333574027</span>
				<span class="contact"></span><i class="fa fa-map-marker"></i> Perum. Dalung Permai Blok NN 10</span>
			</div>
		</div>
		
	</div>
	<div class="cleafix" style="margin-bottom: 40px;"></div>
<?php view('__footer') ?>