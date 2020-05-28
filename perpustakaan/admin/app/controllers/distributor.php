<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('distributor');
switch ($url) {
	case 'index':
		$distributor = empty(Input::get('search')) ? Distributor::getAll(10) : Distributor::search(Input::get('search'));
		$data = [
			'title'        => 'Distributor',
			'distributor'  => $distributor,
			'paginate'     => paginate('distributor', 10),
 		];
		view('distributor/index.distributor', $data);
		break;

	case 'add':
		$id = autoNum('distributor', 'id_distributor', 'DS');
		$data = [
			'title'     => 'Tambah Distributor',
			'id'        => $id,
 		];
		
		if(cekPost()){
			if(Distributor::add()){
				msg('Berhasil ditambahkan');
				redirect('?p=distributor&act=add');
			}else{
				msg('Gagal ditambahkan', 'error');
				redirect('?p=distributor&act=add');
			}
		}else{
			view('distributor/add.distributor', $data);
		}
		
		
		break;

	case 'edit':
		$id = Input::get('id');
		$data = [
			'title'     => 'Edit Distributor',
			'id'        => $id,
			'distri'    => Distributor::getSingle($id),
 		];
		
		if(cekPost()){
			if(Distributor::edit($id)){
				msg('Berhasil diedit');
				redirect('?p=distributor');
			}else{
				msg('Gagal diedit', 'error');
				redirect('?p=distributor&act=edit&id='.$id);
			}
		}else{
			view('distributor/edit.distributor', $data);
		}

		break;

	case 'del':
		if(cekPost()){
			if(Distributor::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=distributor');
		}
		break;
	default:
		die('404 Not Found');
		break;
}