<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=buku">Buku</a></li>
	<li>Add</li>
</ul>
<?php echo msg() ?>

<div class="panel">
	<div class="panel-title">Tambah Buku</div>
	<div class="panel-body">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>ID</label>
				<input type="text" disabled value="<?php echo $id ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Judul</label>
				<input type="text" value="" class="form-control" name="judul" required>
			</div>
			<div class="form-group">
				<label>Noisbn</label>
				<input type="text" value="" class="form-control" name="noisbn" required>
			</div>
			<div class="form-group">
				<label>Penulis</label>
				<input type="text" value="" class="form-control" name="penulis" required>
			</div>
			<div class="form-group">
				<label>Penerbit</label>
				<input type="text" value="" class="form-control" name="penerbit" required>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" value="" class="form-control" name="tahun" maxlength="4" required>
			</div>
			<div class="form-group">
				<label>Gambar</label>
				<input type="file" name="gambar">
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="<?php echo CSRF::token() ?>">
				<button class="btn btn-block">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php view('__footer') ?>
<script type="text/javascript">
$(document).ready(function(){
	function getFinal(){
		var jual   = parseInt($('#jual').val()),
			ppn    = parseInt($('#ppn').val())/100*jual,
			diskon = parseInt($('#diskon').val())/100*jual;

		$('#final').val(jual-diskon+ppn);
	}

	$('input[type="number"]').change(function(){
		getFinal();
	})
})
</script>