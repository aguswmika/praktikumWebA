<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('buku');
switch ($url) {
	case 'index':
		$buku = empty(Input::get('search')) ? Buku::getAll(10) : Buku::search(Input::get('search'));
		$data = [
			'title'     => 'Buku',
			'buku'      => $buku,
			'paginate'  => paginate('buku', 10),
 		];
		view('buku/index.buku', $data);
		break;

	case 'add':
		cekAkses([1,2]);
		$id = autoNum('buku', 'id_buku', 'BK');
		$data = [
			'title'     => 'Tambah Buku',
			'id'        => $id,
 		];
		
		if(cekPost()){
			if(Buku::add()){
				msg('Berhasil ditambahkan');
				redirect('?p=buku&act=add');
			}else{
				msg('Gagal ditambahkan', 'error');
				redirect('?p=buku&act=add');
			}
		}else{
			view('buku/add.buku', $data);
		}
		
		
		break;

	case 'edit':
		cekAkses([1, 2]);
		$id = Input::get('id');
		$data = [
			'title'     => 'Edit Buku',
			'id'        => $id,
			'buku'      => Buku::getSingle($id),
 		];
		
		if(cekPost()){
			if(Buku::edit($id)){
				msg('Berhasil diedit');
				redirect('?p=buku');
			}else{
				msg('Gagal diedit', 'error');
				redirect('?p=buku&act=edit&id='.$id);
			}
		}else{
			view('buku/edit.buku', $data);
		}

		break;

	case 'del':
		cekAkses([1, 2]);
		if(cekPost()){
			if(Buku::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=buku');
		}
		break;
	default:
		die('404 Not Found');
		break;
}