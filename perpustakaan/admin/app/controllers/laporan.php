<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('pinjaman');
model('pasok');
switch ($url) {
	case 'pinjaman':
		$data = [
			'title'        => 'Laporan Pinjaman',
			'pinjaman'    => Pinjaman::laporan(),
 		];
		view('laporan/pinjaman.laporan', $data);
		break;

	case 'cetakpj':
		CSRF::get();
		$data = [
			'pinjaman'    => Pinjaman::laporan(),
 		];
		view('laporan/cetakpj.laporan', $data);
		break;

	case 'pasok':
		$data = [
			'title'        => 'Laporan Pasok',
			'pasok'    => Pasok::laporan(),
 		];

		view('laporan/pasok.laporan', $data);
		break;

	case 'cetakps':
		CSRF::get();
		$data = [
			'pasok'    => Pasok::laporan(),
 		];
		view('laporan/cetakps.laporan', $data);
		break;

	default:
		die('404 Not Found');
		break;
}