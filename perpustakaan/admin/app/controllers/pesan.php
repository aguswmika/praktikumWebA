<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('pesan');
switch ($url) {
	case 'index':
		$pesan = empty(Input::get('search')) ? Pesan::getAll(10) : Pesan::search(Input::get('search'));
		$data = [
			'title'        => 'Pesan',
			'pesan'        => $pesan,
			'paginate'     => paginate('pesan', 10),
 		];
		view('pesan/index.pesan', $data);
		break;

	case 'detail':
		$data = [
			'title'        => 'Pesan',
			'pesan'        => Pesan::getSingle(Input::get('id')),
 		];
		view('pesan/single.pesan', $data);
		break;

	case 'del':
		if(cekPost()){
			if(Pesan::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=pesan');
		}
		break;
	default:
		die('404 Not Found');
		break;
}