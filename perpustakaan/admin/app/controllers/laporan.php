<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('penjualan');
model('pasok');
switch ($url) {
	case 'penjualan':
		$data = [
			'title'        => 'Laporan Penjualan',
			'penjualan'    => Penjualan::laporan(),
 		];
		view('laporan/penjualan.laporan', $data);
		break;

	case 'cetakpj':
		CSRF::get();
		$data = [
			'penjualan'    => Penjualan::laporan(),
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