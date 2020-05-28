<?php

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('pasok');
model('buku');
model('distributor');
switch ($url) {
	case 'index':
		$pasok = empty(Input::get('search')) ? Pasok::getAll(10) : Pasok::search(Input::get('search'));
		$data = [
			'title'     => 'Pasok',
			'pasok'     => $pasok,
			'paginate'  => paginate('pasok', 10),
 		];
		view('pasok/index.pasok', $data);
		break;

	case 'add':
		cekAkses();
		$id = autoNum('pasok', 'id_pasok', 'PS');
		$data = [
			'title'     => 'Tambah Pasok',
			'id'        => $id,
			'buku'      => Buku::getAll(),
			'distri'    => Distributor::getAll()
 		];

		if(cekPost()){
			if(Pasok::add()){
				msg('Berhasil diedit');
				redirect('?p=pasok&act=add');
			}else{
				msg('Gagal diedit', 'error');
				redirect('?p=pasok');
			}
		}else{
			view('pasok/add.pasok', $data);
		}


		break;

	case 'edit':
		cekAkses();
		$id = Input::get('id');
		$data = [
			'title'     => 'Edit Pasok',
			'id'        => $id,
			'pasok'     => Pasok::getSingle($id),
 		];

		if(cekPost()){
			if(Pasok::edit($id)){
				msg('Berhasil diedit');
				redirect('?p=pasok');
			}else{
				msg('Gagal diedit', 'error');
				redirect('?p=pasok&act=edit&id='.$id);
			}
		}else{
			view('pasok/edit.pasok', $data);
		}

		break;

	case 'del':
		cekAkses();
		if(cekPost()){
			if(Pasok::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=pasok');
		}
		break;
	default:
		die('404 Not Found');
		break;
}
