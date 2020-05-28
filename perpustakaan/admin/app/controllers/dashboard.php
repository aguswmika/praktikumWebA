<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('buku');
model('pinjaman');

switch ($url) {
    case 'index':
		$data = [
			'title'     => 'Dashboard',
			'buku'      => Buku::getStats(),
			'pinjaman' => Pinjaman::getStats(),
			'bukus'     => Buku::getAll()
		];
		view('dashboard/index.dashboard', $data);
		break;
	
	default:
		die('404 Not Found');
		break;
}