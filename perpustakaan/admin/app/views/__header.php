<!DOCTYPE html>
<html>
<head>
	<title>AcBook - <?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>


<div class="header clearfix">
	<div class="logo">AcBook</div>
	<div class="other">
		<a href="../" style="color: #FFFFFF" target="_blank"><i class="fa fa-home"></i> Halaman Utama</a> | <a href="?p=logout" style="color: #FFFFFF;"><i class="fa fa-sign-out"></i> [Logout]</a>
	</div>
</div>

<div class="body">
	<div class="navigation">
		<div class="user">
			<div class="user-img"><?php echo (Session::sess('akses') == '1') ? 'A' : 'K' ?></div>
			<div class="user-name">
				<?php echo Session::sess('nama') ?>
				<small><a href="?p=user&act=edit&id=<?php echo Session::sess('id') ?>&edit=true">[Edit]</a></small>
			</div>
		</div>
		<ul class="menu">
			<li>Utama</li>
			<li><a href="?p=dashboard" <?php if(Input::get('p') === 'dashboard' || empty(Input::get('p'))){ echo 'class="active"';} ?>><i class="fa fa-home"></i> Dashboard</a></li>
			<li><a href="?p=pinjaman" <?php if(Input::get('p') === 'pinjaman'){ echo 'class="active"';} ?>><i class="fa fa-handshake-o"></i> Pinjaman</a></li>
			<li><a href="?p=pasok" <?php if(Input::get('p') === 'pasok'){ echo 'class="active"';} ?>><i class="fa fa-cubes"></i> Pasok</a></li>
			<li>Data</li>
			<li><a href="?p=buku" <?php if(Input::get('p') === 'buku'){ echo 'class="active"';} ?>><i class="fa fa-book"></i> Buku</a></li>
			<?php if(Session::sess('akses') == 1) { ?><li><a href="?p=distributor" <?php if(Input::get('p') === 'distributor'){ echo 'class="active"';} ?>><i class="fa fa-truck"></i> Distributor</a></li><?php } ?>
			<?php if(Session::sess('akses') == 1) { ?><li><a href="?p=user" <?php if(Input::get('p') === 'user'){ echo 'class="active"';} ?>><i class="fa fa-users"></i> User</a></li><?php } ?>
			<li>Laporan</li>
			<li><a href="?p=laporan&act=penjualan" <?php if(Input::get('p') === 'laporan' && Input::get('act') === 'penjualan'){ echo 'class="active"';} ?>><i class="fa fa-list"></i> Lap. Pinjaman</a></li>
			<li><a href="?p=laporan&act=pasok" <?php if(Input::get('p') === 'laporan' && Input::get('act') === 'pasok'){ echo 'class="active"';} ?>><i class="fa fa-list"></i> Lap. Pasok</a></li>
		</ul>
	</div>
	<div class="content">
		<div class="container-fluid">