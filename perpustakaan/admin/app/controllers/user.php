<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('user');
switch ($url) {
	case 'index':
		cekAkses([1]);
		$user = empty(Input::get('search')) ? User::getAll(10) : User::search(Input::get('search'));
		$data = [
			'title'        => 'User',
			'user'         => $user,
			'paginate'     => paginate('user', 10),
 		];
		view('user/index.user', $data);
		break;

	case 'add':
		cekAkses([1]);
		$id = autoNum('user', 'id_user', 'KS');
		$data = [
			'title'     => 'Tambah User',
			'id'        => $id,
 		];
		
		if(cekPost()){
			if(User::add()){
				msg('Berhasil ditambahkan');
				redirect('?p=user&act=add');
			}else{
				msg('Gagal ditambahkan', 'error');
				redirect('?p=user&act=add');
			}
		}else{
			view('user/add.user', $data);
		}
		
		
		break;

    case 'edit':
        cekAkses([1]);
		$id = Input::get('id');
		$data = [
			'title'     => 'Edit User',
			'id'        => $id,
			'user'     => User::getSingle($id),
 		];
		
		if(cekPost()){
			if(User::edit($id)){
				msg('Berhasil diedit');

				if(Input::get('edit') == 'true'){
					session_destroy();
					session_start();
					msg('Silahkan login kembali');
					redirect('?p=login');
				}else{
					redirect('?p=user');
				}
			}else{
				msg('Gagal diedit', 'error');
				redirect('?p=user&act=edit&id='.$id);
			}
		}else{
			view('user/edit.user', $data);
		}

		break;

	case 'del':
		cekAkses([1]);
		if(cekPost()){
			if(User::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=user');
		}
		break;
	default:
		die('404 Not Found');
		break;
}