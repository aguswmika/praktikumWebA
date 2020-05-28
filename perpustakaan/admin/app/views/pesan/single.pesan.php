<?php view('__header', $data) ?>
<ul class="nav-link">
	<li><a href="?p=dashboard"><i class="fa fa-home"></i></a></li>
	<li><a href="?p=pesan">Pesan</a></li>
	<li>Detail</li>
</ul>
<?php echo msg() ?>
<div class="panel">
	<div class="panel-title">Data Pesan</div>
	<div class="panel-body">
		<table class="pesan">
			<tr>
				<td>Perihal</td>
				<td>:</td>
				<td><b><?php echo htmlentities($pesan->perihal) ?></b></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><b><?php echo htmlentities($pesan->nama) ?></b></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><b><?php echo htmlentities($pesan->email) ?></b></td>
			</tr>
			<tr>
				<td>Pesan</td>
				<td>:</td>
				<td><pre><?php echo htmlentities($pesan->pesan) ?></pre></td>
			</tr>
		</table>
	</div>
</div>

<?php view('__footer') ?>