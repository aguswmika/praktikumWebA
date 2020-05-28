<?php
error_reporting(1);
ini_set('display_errors', 'On');

session_start();
DEFINE('BASE_PATH', __DIR__ . '/');
date_default_timezone_set("Asia/Makassar");

require_once BASE_PATH.'app/init.php';


CSRF::start();
$url = !empty(Input::get('p')) ? strtolower(Input::get('p')) : 'home';
model('buku');

switch ($url) {
	case 'home':

		if(!empty(Input::get('search'))){
			$data = [
				'title'    => 'Pencarian Buku '.Input::get('search'),
				'buku'     => Buku::search(Input::get('search')),
				'paginate' => paginate('buku',8),
				'hero'     => false
			];
			view('buku/search.buku', $data);
		}else{
			$data = [
				'title'   => 'Toko Buku Online',
				'buku'    => Buku::getLatest(),
				'feature' => Buku::getFeatured(),
				'hero'    => true,
			];
			view('home/index.home', $data);
		}
		break;

	case 'buku':

		if(!empty(Input::get('slug'))){
			$buku = Buku::getSingle(Input::get('slug'));
			$data = [
				'title'    => 'Buku '.$buku->judul,
				'buku'     => $buku,
				'rand'     => Buku::getRand(),
				'hero'     => false
			];

			view('buku/single.buku', $data);
		}else{
			$data = [
				'title'    => 'List Buku',
				'buku'     => Buku::getAll(8),
				'paginate' => paginate('buku',8),
				'hero'     => false
			];
			view('buku/index.buku', $data);
		}

		break;

	case 'tentang':
		$data = [
			'title'    => 'Tentang Kami',
			'hero'     => false
		];

		view('tentang/index.tentang', $data);
		break;

	case 'kontak':
		model('pesan');
		$data = [
			'title'    => 'Kontak Kami',
			'hero'     => false
		];

		if(cekPost()){
			if(Pesan::add()){
				msg('Pesan Anda telah terkirim, dan akan kami proses dalam waktu 2x24 jam');
				redirect('?p=kontak');
			}else{
				msg('Pesan Anda gagal terkirim', 'error');
				redirect('?p=kontak');
			}
		}else{
			view('kontak/index.kontak', $data);
		}


		break;

	default:
		die('404 Not Found');
		break;
}
